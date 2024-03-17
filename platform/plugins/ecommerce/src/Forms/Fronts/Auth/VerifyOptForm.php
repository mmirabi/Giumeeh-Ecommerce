<?php

namespace Botble\Ecommerce\Forms\Fronts\Auth;

use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\PhoneNumberField;
use Botble\Ecommerce\Forms\Fronts\Auth\FieldOptions\TextFieldOption;
use Botble\Ecommerce\Models\Customer;
use Botble\Theme\Facades\Theme;

class VerifyOptForm extends AuthForm
{
    public function setup(): void
    {
        parent::setup();

        $route = route('customer.access.otp.verify');
        $this
            ->setUrl($route)
            ->icon('ti ti-lock')
            ->heading(__('Login/Register to your phone number'))
            ->description(__('Your personal data will be used to support your experience throughout this website, to manage access to your account.'))
            ->when(
                theme_option('login_background'),
                fn(AuthForm $form, string $background) => $form->banner($background)
            )
            ->add('phone', HtmlField::class, [
                'html' => "<input name='phone' type='hidden' value={$this->request->phone}>",
            ])
            ->add(
                'otp_code',
                PhoneNumberField::class,
                TextFieldOption::make()
                    ->label(__('Enter verify code'))
                    ->icon('ti ti-code')
                    ->toArray()
            )
            ->add('openRow', HtmlField::class, [
                'html' => '<div class="row g-0 mb-3">',
            ])
            ->add('otp_box', HtmlField::class, [
                'html' => " <div id='otp_box' style='text-align: center'></div>",
            ])
            ->submitButton(__('Confirm'), 'ti ti-arrow-narrow-right')
            ->add('filters', HtmlField::class, [
                'html' => apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, Customer::class),
            ]);
    }
}
