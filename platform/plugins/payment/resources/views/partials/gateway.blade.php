<li class="list-group-item">
    <input
        class="magic-radio js_payment_method"
        id="payment_gateway"
        name="payment_method"
        type="radio"
        value="gateway"
        @if (PaymentMethods::getSelectingMethod() == Botble\Payment\Enums\PaymentMethodEnum::GATEWAY) checked @endif
    >
    <label class="text-start" for="payment_gateway">
        {{ trans('plugins/payment::payment.payment_via_bank_gateway') }}
    </label>
</li>
