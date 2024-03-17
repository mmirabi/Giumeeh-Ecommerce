<?php

return [
    'settings' => [
        'title' => 'تنظیمات ورود اجتماعی',
        'description' => 'گزینه‌های ورود اجتماعی را پیکربندی کنید',
        'facebook' => [
            'enable' => 'فعال کردن ورود از طریق فیس‌بوک',
            'app_id' => 'شناسه اپلیکیشن',
            'app_secret' => 'رمز اپلیکیشن',
            'helper' => 'لطفاً به https://developers.facebook.com بروید تا اپلیکیشن جدیدی ایجاد کرده و شناسه اپلیکیشن و رمز اپلیکیشن را به‌روز کنید. آدرس بازگشتی (Callback URL) :callback است',
        ],
        'google' => [
            'enable' => 'فعال کردن ورود از طریق گوگل',
            'app_id' => 'شناسه اپلیکیشن',
            'app_secret' => 'رمز اپلیکیشن',
            'helper' => 'لطفاً به https://console.developers.google.com/apis/dashboard بروید تا اپلیکیشن جدیدی ایجاد کرده و شناسه اپلیکیشن و رمز اپلیکیشن را به‌روز کنید. آدرس بازگشتی (Callback URL) :callback است',
        ],
        'github' => [
            'enable' => 'فعال کردن ورود از طریق گیت‌هاب',
            'app_id' => 'شناسه اپلیکیشن',
            'app_secret' => 'رمز اپلیکیشن',
            'helper' => 'لطفاً به https://github.com/settings/developers بروید تا اپلیکیشن جدیدی ایجاد کرده و شناسه اپلیکیشن و رمز اپلیکیشن را به‌روز کنید. آدرس بازگشتی (Callback URL) :callback است',
        ],
        'linkedin' => [
            'enable' => 'فعال کردن ورود از طریق لینکداین',
            'app_id' => 'شناسه اپلیکیشن',
            'app_secret' => 'رمز اپلیکیشن',
            'helper' => 'لطفاً به https://www.linkedin.com/developers/apps/new بروید تا اپلیکیشن جدیدی ایجاد کرده و شناسه اپلیکیشن و رمز اپلیکیشن را به‌روز کنید. آدرس بازگشتی (Callback URL) :callback است',
        ],
        'linkedin-openid' => [
            'enable' => 'فعال کردن ورود از طریق لینکداین با استفاده از اتصال باز (OpenID Connect)',
            'app_id' => 'شناسه اپلیکیشن',
            'app_secret' => 'رمز اپلیکیشن',
            'helper' => 'لطفاً به https://www.linkedin.com/developers/apps/new بروید تا اپلیکیشن جدیدی ایجاد کرده و شناسه اپلیکیشن و رمز اپلیکیشن را به‌روز کنید. آدرس بازگشتی (Callback URL) :callback است',
        ],
        'enable' => 'ورود اجتماعی را فعال کنید؟',
    ],
    'menu' => 'ورود اجتماعی',
    'description' => 'تنظیمات ورود اجتماعی خود را مشاهده و به‌روز کنید',
];
