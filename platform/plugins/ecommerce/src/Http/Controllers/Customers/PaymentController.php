<?php

namespace Botble\Ecommerce\Http\Controllers\Customers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Ecommerce\Facades\OrderHelper;
use Botble\Ecommerce\Models\Order;
use Botble\Payment\Enums\PaymentStatusEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Mollie\Api\Types\OrderStatus;

class PaymentController extends BaseController
{
    public function payment(string $orderId, Request $request): RedirectResponse
    {
        $order = Order::query()
            ->with('payment', function ($query) {
                $query->where('status', PaymentStatusEnum::PENDING);
            })
            ->where('status', OrderStatus::STATUS_PENDING)
            ->where('user_id', auth('customer')->user()->id)
            ->where('id', $orderId)
            ->where('user_id', auth('customer')->user()->id)
            ->firstOrFail();

        $amount = $this->convertAmount($order->amount, get_application_currency()->title);
        $result = $this->httpRequestPost(getenv('ZIBAL_BASE_URL') . '/request', [
            'merchant' => getenv('ZIBAL_MERCHANT_CODE'),
            'amount' => $amount,
            'orderId' => $order->id,
            'description' => '',
            'callbackUrl' => route('customer.payment.callback'),
        ]);

        try {
            Validator::validate($result, [
                'message' => [
                    'required',
                    'in:success',
                ],
                'result' => [
                    'required',
                    'in:100',
                ],
                'trackId' => [
                    'required',
                ],
            ]);
        } catch (\Throwable $throwable) {
            throw ValidationException::withMessages([
                __('Payment gateway') => [__('Payment gateway is not accessed')],
            ]);
        }

        $order->update([
            'description' => $result['trackId'],
        ]);
        $url = $this->generateGatewayLink($result['trackId']);

        return redirect()->away($url);
    }

    public function callback(Request $request)
    {
        try {
            $request->validate([
                'success' => [
                    'required',
                    'in:1',
                ],
                'status' => [
                    'required',
                    'in:2',
                ],
                'trackId' => [
                    'required',
                ],
                'orderId' => [
                    'required',
                ],
            ]);
        } catch (\Throwable) {
            throw ValidationException::withMessages([
                __('Payment gateway') => [__('Payment is failed')],
            ]);
        }

        $order = Order::query()
            ->with(['payment'])
            ->where('status', OrderStatus::STATUS_PENDING)
            ->where('description', $request->trackId)
            ->where('id', $request->orderId)
            ->firstOrFail();
        $payment = $order->payment;

        $result = $this->httpRequestPost(getenv('ZIBAL_BASE_URL') . '/v1/verify', [
            'merchant' => getenv('ZIBAL_MERCHANT_CODE'),
            'trackId' => $request->input('trackId')
        ]);

        try {
            Validator::validate($result, [
                'message' => [
                    'required',
                    'in:success,previously verifed',
                ],
                'result' => [
                    'required',
                    'in:100,201',
                ],
            ]);
        } catch (\Throwable) {
            throw ValidationException::withMessages([
                __('Payment gateway') => [__('Payment is failed')],
            ]);
        }

        DB::transaction(function () use ($payment, $order) {
            $order->update([
                'completed_at' => now(),
                'is_finished' => true,
                'is_confirmed' => true,
            ]);

            $payment->update([
                'status' => PaymentStatusEnum::COMPLETED,
            ]);
        });

        return view('plugins/ecommerce::orders.thank-you')->with([
            'order' => $order,
        ]);
    }

    private function generateGatewayLink($trackId): string
    {
        return getenv('ZIBAL_BASE_URL') . "/start/{$trackId}";
    }

    private function httpRequestPost(string $url, array $data = [])
    {
        try {
            return Http::post($url, $data)->json();
        } catch (\Throwable) {
            throw ValidationException::withMessages([
                __('Payment gateway') => [__('Payment gateway is not accessed')],
            ]);
        }
    }

    private function convertAmount($amount, $currency): int
    {
        switch (strtolower($currency)) {
            case strtolower('IRR'):
            case strtolower('RIAL'):
                return (int)$amount;

            case strtolower('تومان ایران'):
            case strtolower('تومان'):
            case strtolower('IRT'):
            case strtolower('Iranian_TOMAN'):
            case strtolower('Iran_TOMAN'):
            case strtolower('Iranian-TOMAN'):
            case strtolower('Iran-TOMAN'):
            case strtolower('TOMAN'):
            case strtolower('Iran TOMAN'):
            case strtolower('Iranian TOMAN'):
                return (int)($amount * 10);

            case strtolower('IRHT'):
                return (int)($amount * 10000);

            case strtolower('IRHR'):
                return (int)($amount * 1000);

            default:
                throw ValidationException::withMessages([
                    __('Currency') => [__('Please switch currency to any supported currency')],
                ]);
        }
    }

}
