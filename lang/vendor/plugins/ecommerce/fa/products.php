<?php

return [
    'name' => 'محصولات',
    'description' => 'تنظیمات محصولات خود را مشاهده و به روز کنید',
    'create' => 'محصول جدید',
    'create_product_type' => [
        'physical' => 'محصول فیزیکی جدید',
        'digital' => 'محصول دیجیتال جدید',
    ],
    'edit' => ':name ویرایش محصول -',
    'form' => [
        'name' => 'Name',
        'name_placeholder' => 'نام (حداکثر 120 کاراکتر) Product\'s',
        'description' => 'توضیحات',
        'description_placeholder' => 'توضیحات کوتاه برای محصول (حداکثر 400 کاراکتر)',
        'categories' => 'دسته بندی ها',
        'content' => 'محتوا',
        'price' => 'قیمت',
        'quantity' => 'تعداد',
        'brand' => 'برند',
        'width' => 'عرض',
        'height' => 'ارتفاع',
        'weight' => 'وزن',
        'date' => [
            'start' => 'از تاریخ',
            'end' => 'تا تاریخ',
        ],
        'image' => 'تصاویر',
        'collections' => 'مجموعه محصولات',
        'labels' => 'برچسب ها',
        'price_sale' => 'قیمت فروش',
        'product_type' => [
            'title' => 'نوع محصول',
        ],
        'product' => 'محصول',
        'total' => 'جمع',
        'sub_total' => 'جمع',
        'shipping_fee' => 'هزینه ارسال',
        'discount' => 'تخفیف',
        'options' => 'آپشن ها',
        'shipping' => [
            'height' => 'ارتفاع',
            'length' => 'طول',
            'title' => 'حمل نقل',
            'weight' => 'وزن',
            'wide' => 'عرض',
        ],
        'barcode' => 'بارکد ',
        'barcode_placeholder' => 'بارکد را وارد کنید',
        'cost_per_item' => 'هزینه برای هر مورد',
        'cost_per_item_placeholder' => 'هزینه هر مورد را وارد کنید',
        'cost_per_item_helper' => "مشتریان این قیمت را نخواهند دید.",
        'stock' => [
            'allow_order_when_out' => 'هنگامی که موجودی این محصول تمام شد، به مشتری اجازه پرداخت را بدهید',
            'in_stock' => 'موچود',
            'out_stock' => 'تمام شده',
            'title' => 'موجودی',
        ],
        'storehouse' => [
            'no_storehouse' => 'بدون مدیریت انبار',
            'storehouse' => 'با مدیریت انبار',
            'title' => 'انبار',
            'quantity' => 'تعداد',
        ],
        'tax' => 'مالیات',
        'taxes' => 'مالیات ها',
        'is_default' => 'پیش فرض است',
        'action' => 'اقدام',
        'restock_quantity' => 'موجودی را فعال کن',
        'remain' => 'باقی می ماند',
        'choose_discount_period' => 'دوره تخفیف را انتخاب کنید',
        'cancel' => 'لغو کنید',
        'no_results' => 'هیچ نتیجه ای وجود ندارد!',
        'value' => 'مقدار',
        'attribute_name' => 'نام ویژگی',
        'add_more_attribute' => 'ویژگی بیشتر اضافه کنید',
        'continue' => 'ادامه هید',
        'add_new_attributes' => 'ویژگی های جدید اضافه کنید',
        'add_new_attributes_description' => 'افزودن ویژگی های جدید به محصول کمک می کند تا گزینه های زیادی مانند اندازه یا رنگ داشته باشد.',
        'create_product_variations' => 'برای ایجاد تنوع محصول! :link',
        'tags' => 'Tags',
        'write_some_tags' => 'چند تگ بنویس',
        'variation_existed' => 'این تنوع وجود دارد.',
        'no_attributes_selected' => 'هیچ ویژگی انتخاب نشده است!',
        'added_variation_success' => 'تنوع با موفقیت اضافه شد!',
        'updated_variation_success' => 'تنوع با موفقیت به روز شد!',
        'created_all_variation_success' => 'همه تغییرات با موفقیت ایجاد شد!',
        'updated_product_attributes_success' => 'ویژگی های محصول با موفقیت به روز شد!',
        'stock_status' => 'وضعیت موجودی',
        'auto_generate_sku' => 'تولید خودکار شناسه محصول؟',
        'featured_image' => 'تصویر ویژه (اختیاری)',
        'product_id' => 'شناسه محصول',
        'price_sale_percent_helper' => 'تخفیف :percent  نسبت به قیمت اصلی',
    ],
    'price' => 'قیمت',
    'quantity' => 'تعداد',
    'type' => 'نوع',
    'image' => 'کوچک',
    'sku' => 'شتاسه',
    'variation_sku' => 'شتاسه تنوع',
    'brand' => 'Brand',
    'cannot_delete' => 'محصول حذف نشد',
    'product_deleted' => 'محصول حذف شد',
    'product_collections' => 'مجموعه های محصولات',
    'products' => 'محصولات',
    'menu' => 'محصولات',
    'control' => [
        'button_add_image' => 'اضافه کردن تصاویر',
    ],
    'price_sale' => 'قیمت فروش',
    'price_group_title' => 'قیمت محصول مدیر',
    'store_house_group_title' => 'مدیر فروشگاه',
    'shipping_group_title' => 'مدیریت حمل و نقل',
    'overview' => 'بررسی اجمالی',
    'attributes' => 'ویژگی ها',
    'product_has_variations' => 'محصول دارای تنوع است',
    'manage_products' => 'محصولات را مدیریت کنید',
    'add_new_product' => 'یک محصول جدید اضافه کنید',
    'start_by_adding_new_product' => 'با اضافه کردن محصولات جدید شروع کنید',
    'edit_this_product' => 'این محصول را ویرایش کنید',
    'delete' => 'حذف',
    'related_products' => 'محصولات مرتبط',
    'cross_selling_products' => 'محصولات متقاطع فروش',
    'up_selling_products' => 'محصولات پرفروش',
    'grouped_products' => 'محصولات گروه بندی شده',
    'search_products' => 'جستجوی محصولات',
    'selected_products' => 'محصولات منتخب',
    'edit_variation_item' => 'ویرایش کنید',
    'variations_box_description' => 'برای افزودن/حذف ویژگی بر روی "ویرایش ویژگی" کلیک کنید یا برای افزودن تنوع روی "افزودن تنوع جدید" کلیک کنید.',
    'save_changes' => 'ذخیره تغییرات',
    'continue' => 'ادامه هید',
    'edit_attribute' => 'ویرایش ویژگی',
    'select_attribute' => 'ویژگی را انتخاب کنید',
    'add_new_variation' => 'تنوع جدید اضافه کنید',
    'edit_variation' => 'Edit variation',
    'generate_all_variations' => 'همه تغییرات را ایجاد کنید',
    'generate_all_variations_confirmation' => 'آیا مطمئن هستید که می خواهید همه تغییرات را برای این محصول ایجاد کنید؟',
    'delete_variation' => 'تغییر حذف شود؟',
    'delete_variation_confirmation' => 'آیا مطمئنید که می خواهید این تغییر را حذف کنید؟ این عمل قابل بازگشت نیست.',
    'delete_variations_confirmation' => 'آیا مطمئنید که می خواهید این تغییر را حذف کنید؟ این عمل قابل بازگشت نیست.',
    'product_create_validate_name_required' => 'لطفا نام محصول را وارد کنید',
    'product_create_validate_sale_price_max' => 'تخفیف باید کمتر از قیمت اصلی باشد',
    'product_create_validate_cost_per_item_max' => 'هزینه هر محصول باید کمتر از قیمت اصلی باشد',
    'product_create_validate_sale_price_required_if' => 'وقتی می‌خواهید تبلیغی را برنامه‌ریزی کنید، باید تخفیف وارد کنید',
    'product_create_validate_end_date_after' => 'تاریخ پایان باید بعد از تاریخ شروع باشد',
    'product_create_validate_start_date_required_if' => 'هنگام انتخاب زمان‌بندی، تاریخ شروع تخفیف را نمی‌توان خالی گذاشت',
    'product_create_validate_sale_price' => 'هنگام انتخاب زمان‌بندی، نمی‌توان تخفیف‌ها را خالی گذاشت',
    'stock_statuses' => [
        'in_stock' => 'موجود',
        'out_of_stock' => 'تمام شده',
        'on_backorder' => 'در صورت سفارش مجدد',
    ],
    'stock_status' => 'وضعیت موجودی',
    'processing' => 'در حال پردازش...',
    'delete_selected_variations' => 'حذف تغییرات انتخاب شده',
    'delete_variations' => 'حذف تغییرات',
    'category' => 'دسته بندی',
    'product_price_flash_sale_warning' => 'این محصول در فروش فلش <strong>:name</strong> است بنابراین قیمت آن <strong>:price</strong> است.',
    'product_price_discount_warning' => 'این محصول دارای تخفیف <strong>:name</strong> است بنابراین قیمت آن <strong>:price</strong> است.',
    'product_image' => 'تصویر محصول',
    'product_name' => 'نام محصول',
    'types' => [
        'physical' => 'فیزیکی',
        'digital' => 'دیجیتال',
    ],
    'digital_attachments' => [
        'title' => 'پیوست های دیجیتال',
        'add' => 'پیوست را اضافه کنید',
        'file_name' => 'نام فایل',
        'file_size' => 'سایز فایل',
        'unsaved' => 'ذخیره نشده است',
        'add_external_link' => 'لینک خارجی اضافه کنید',
        'enter_file_name' => 'نام فایل را وارد کنید',
        'enter_external_link_download' => 'لینک دانلود خارجی را وارد کنید',
        'enter_file_size' => 'اندازه فایل را وارد کنید',
        'external_link_download' => 'دانلود لینک خارجی',
        'generate_license_code_after_purchasing_product' => 'پس از خرید این محصول کد لایسنس ایجاد می کنید؟',
    ],
    'this_action_will_reload_page' => 'این عمل صفحه را دوباره بارگیری می کند تا داده ها به روز شوند!',
    'select' => 'انتخاب کنید',
    'set_this_variant_as_default' => 'این نوع را به عنوان پیش فرض تنظیم کنید',
    'download' => 'دانلود',
    'cross_sell_price_type' => [
        'title' => 'نوع قیمت',
        'fixed' => 'درست شد',
        'percent' => 'درصد',
    ],
    'cross_sell_help' => [
        'price' => '* فیلد قیمت',
        'price_description' => 'مبلغی را که می خواهید از قیمت اصلی کاهش دهید وارد کنید. مثال: اگر قیمت اصلی 100تومان است، عدد 20 را وارد کنید تا قیمت به 80 تومان کاهش یابد.',
        'type' => '* فیلد از نوع تایپ',
        'type_description' => 'نوع تخفیف را انتخاب کنید: ثابت (کاهش مقدار مشخص) یا درصد (کاهش درصد).',
    ],
];