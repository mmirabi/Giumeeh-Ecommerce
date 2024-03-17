<?php

namespace Botble\Ecommerce\Http\Controllers\Customers;

use App\Jobs\SendVeriySms;
use Botble\ACL\Traits\AuthenticatesUsers;
use Botble\ACL\Traits\LogoutGuardTrait;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Rules\PhoneNumberRule;
use Botble\Ecommerce\Forms\Fronts\Auth\OptForm;
use Botble\Ecommerce\Forms\Fronts\Auth\VerifyOptForm;
use Botble\Ecommerce\Http\Requests\LoginRequest;
use Botble\Ecommerce\Models\Customer;
use Botble\JsValidation\Facades\JsValidator;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class OtpController extends BaseController
{
    use AuthenticatesUsers, LogoutGuardTrait {
        AuthenticatesUsers::attemptLogin as baseAttemptLogin;
    }

    public string $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('customer.guest', ['except' => 'logout']);
    }

    public function sendForm()
    {
        SeoHelper::setTitle(__('Otp'));

        Theme::breadcrumb()->add(__('otp'), route('customer.access.otp.form'));

        if (!session()->has('url.intended') &&
            !in_array(url()->previous(), [
                    route('customer.access.otp.form'),
                    route('customer.access.otp.send_post'),
                    route('customer.access.otp.verify'),
                ]
            )
        ) {
            session(['url.intended' => url()->previous()]);
        }

        Theme::asset()
            ->container('footer')
            ->usePath(false)
            ->add('js-validation', 'vendor/core/core/js-validation/js/js-validation.js', ['jquery']);

        add_filter(THEME_FRONT_FOOTER, function ($html) {
            return $html . JsValidator::formRequest(LoginRequest::class)->render();
        });

        return Theme::scope(
            'ecommerce.customers.sendOtp',
            ['form' => OptForm::create()],
            'plugins/ecommerce::themes.customers.login'
        )->render();
    }

    public function send(Request $request)
    {
        $request->validate([
            'phone' => [
                'required',
                'numeric',
                'regex:/(09)[0-9]{9}/',
                'digits:11'
            ]
        ]);

        $otpExpireTime = $this->verifyExpireTimeTTl();
        $code = (string)rand(100000, 999999);
        $key = $this->getOtpKey($request->phone);
        Cache::set($key, $code, $otpExpireTime);
        SendVeriySms::dispatchSync($request->phone, $code);

        SeoHelper::setTitle(__('Otp'));
        Theme::breadcrumb()->add(__('otp'), route('customer.access.otp.form'));

        if (!session()->has('url.intended') &&
            !in_array(url()->previous(), [
                    route('customer.access.otp.form'),
                    route('customer.access.otp.send_post'),
                    route('customer.access.otp.verify'),
                ]
            )
        ) {
            session(['url.intended' => url()->previous()]);
        }

        Theme::asset()
            ->container('footer')
            ->usePath(false)
            ->add('js-validation', 'vendor/core/core/js-validation/js/js-validation.js', ['jquery']);

        add_filter(THEME_FRONT_FOOTER, function ($html) {
            return $html . JsValidator::formRequest(LoginRequest::class)->render();
        });

        return Theme::scope(
            'ecommerce.customers.verifyOtp',
            [
                'form' => VerifyOptForm::create()->setRequest($request),
                'phone' => $request->phone,
                'otpExpireTime' => $otpExpireTime,
            ],
            'plugins/ecommerce::themes.customers.verifyOtp'
        )->render();
    }

    public function verify(Request $request): Response|RedirectResponse
    {
        $request->validate([
            'otp_code' => [
                'required',
                'numeric',
            ],
            'phone' => [
                'required',
                'numeric',
                'regex:/(09)[0-9]{9}/',
                'digits:11'
            ],
        ]);

        $key = $this->getOtpKey($request->phone);
        $otpCode = Cache::get($key);

        if (empty($otpCode) || $otpCode !== $request->otp_code) {
            throw ValidationException::withMessages([
                __('Otp Code is wrong') => [__('Your code is wrong')],
            ]);
        }

        /* @var Customer $customer */
        $customer = Customer::query()->firstOrCreate([
            'phone' => $request->phone
        ], [
            'phone' => $request->phone,
        ]);

        auth('customer')->login($customer);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($this->redirectPath());
    }

    private function getOtpKey(string $phone): string
    {
        return "otp_code:{$phone}";
    }

    private function verifyExpireTimeTTl()
    {
        return getenv('SMS_VERIFY_EXPIRE_TIME') * 60;
    }
}
