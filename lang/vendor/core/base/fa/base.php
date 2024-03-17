<?php

return [
    'yes' => 'بله',
    'no' => 'خیر',
    'is_default' => 'پیش‌فرض است؟',
    'proc_close_disabled_error' => 'تابع proc_close() غیرفعال است. لطفاً با ارائه‌دهنده میزبانی خود تماس بگیرید تا آن را فعال کنید. یا می‌توانید به .env اضافه کنید: CAN_EXECUTE_COMMAND=false تا این ویژگی را غیرفعال کنید.',
    'email_template' => [
        'header' => 'سربرگ قالب ایمیل',
        'footer' => 'پاورقی قالب ایمیل',
        'site_title' => 'عنوان سایت',
        'site_url' => 'آدرس سایت',
        'site_logo' => 'لوگوی سایت',
        'date_time' => 'تاریخ و زمان فعلی',
        'date_year' => 'سال فعلی',
        'site_admin_email' => 'ایمیل مدیر سایت',
        'twig' => [
            'tag' => [
                'apply' => 'تگ apply به شما امکان اعمال فیلترهای Twig را می‌دهد',
                'for' => 'بررسی هر مورد در یک دنباله',
                'if' => 'اگر عبارت در Twig قابل مقایسه با اظهارنظرهای PHP است',
            ],
        ],
    ],
    'change_image' => 'تغییر تصویر',
    'delete_image' => 'حذف تصویر',
    'preview_image' => 'پیش‌نمایش تصویر',
    'image' => 'تصویر',
    'using_button' => 'استفاده از دکمه',
    'select_image' => 'انتخاب تصویر',
    'click_here' => 'اینجا کلیک کنید',
    'to_add_more_image' => 'برای افزودن تصاویر بیشتر',
    'add_image' => 'افزودن تصویر',
    'tools' => 'ابزارها',
    'close' => 'بستن',
    'panel' => [
        'others' => 'سایر',
        'system' => 'سیستم',
        'manage_description' => 'مدیریت :name',
    ],
    'global_search' => [
        'title' => 'جستجو',
        'search' => 'جستجو',
        'clear' => 'پاک کردن',
        'no_result' => 'نتیجه‌ای یافت نشد',
        'to_select' => 'برای انتخاب',
        'to_navigate' => 'برای مسیریابی',
        'to_close' => 'برای بستن',
    ],
    'validation' => [
        'email_in_blacklist' => ':attribute در لیست سیاه قرار دارد. لطفاً از یک آدرس ایمیل دیگر استفاده کنید.',
        'domain' => ':attribute باید یک دامنه معتبر باشد.',
    ],
];
