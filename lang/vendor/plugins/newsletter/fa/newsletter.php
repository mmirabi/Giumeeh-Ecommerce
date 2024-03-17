<?php

return [
    'name' => 'خبرنامه‌ها',
    'description' => 'مشاهده و حذف اعضای خبرنامه',
    'settings' => [
        'email' => [
            'templates' => [
                'title' => 'خبرنامه',
                'description' => 'تنظیم قالب‌های ایمیل خبرنامه',
                'to_admin' => [
                    'title' => 'ایمیل ارسالی به مدیر',
                    'description' => 'الگوی ایمیل برای ارسال به مدیر',
                ],
                'to_user' => [
                    'title' => 'ایمیل ارسالی به کاربر',
                    'description' => 'الگوی ایمیل برای ارسال به مشترک',
                ],
            ],
        ],
        'title' => 'خبرنامه',
        'panel_description' => 'مشاهده و به‌روزرسانی تنظیمات خبرنامه',
        'description' => 'تنظیمات خبرنامه (ارسال خودکار ایمیل خبرنامه به سرویس‌هایی مانند SendGrid، Mailchimp و غیره هنگامی که کسی در وب‌سایت عضو خبرنامه می‌شود).',
        'mailchimp_api_key' => 'کلید API Mailchimp',
        'mailchimp_list_id' => 'شناسه لیست Mailchimp',
        'mailchimp_list' => 'لیست Mailchimp',
        'sendgrid_api_key' => 'کلید API Sendgrid',
        'sendgrid_list_id' => 'شناسه لیست Sendgrid',
        'sendgrid_list' => 'لیست Sendgrid',
        'enable_newsletter_contacts_list_api' => 'فعال‌سازی API لیست مخاطبان خبرنامه؟',
    ],
    'statuses' => [
        'subscribed' => 'مشترک شده',
        'unsubscribed' => 'لغو اشتراک شده',
    ],
];
