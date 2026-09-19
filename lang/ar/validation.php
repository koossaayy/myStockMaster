<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما تكون قيمة :other هي :value.',
    'active_url' => ':attribute ليس رابط URL صالحًا.',
    'after' => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد :date أو مساويًا له.',
    'alpha' => 'يجب ألا يحتوي :attribute إلا على أحرف.',
    'alpha_dash' => 'يجب ألا يحتوي :attribute إلا على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'يجب ألا يحتوي :attribute إلا على أحرف وأرقام.',
    'array' => 'يجب أن يكون :attribute مصفوفة.',
    'before' => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل :date أو مساويًا له.',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و:max.',
        'file' => 'يجب أن يكون :attribute بين :min و:max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و:max.',
        'string' => 'يجب أن يكون :attribute بين :min و:max حرفًا.',
    ],
    'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false .',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون :attribute تاريخًا مساويًا لـ :date.',
    'date_format' => 'تنسيق :attribute لا يطابق التنسيق :format.',
    'declined' => 'يجب رفض :attribute.',
    'declined_if' => 'يجب رفض :attribute عندما تكون قيمة :other هي :value.',
    'different' => 'يجب أن يكون :attribute و:other مختلفين.',
    'digits' => 'يجب أن يتكون :attribute من :digits أرقام.',
    'digits_between' => 'يجب أن يتكون :attribute من بين :min و:max أرقام.',
    'dimensions' => 'أبعاد الصورة في :attribute غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'doesnt_end_with' => 'لا يجوز أن ينتهي :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'لا يجوز أن يبدأ :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
    'enum' => 'قيمة حقل :attribute غير موجودة في قائمة القيم المسموح بها.',
    'exists' => 'قيمة الحقل :attribute غير موجودة.',
    'file' => 'يجب أن يكون :attribute ملفًا.',
    'filled' => 'حقل :attribute إجباري.',
    'gt' => [
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر.',
        'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'string' => 'يجب أن يكون :attribute أكبر من :value حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر.',
        'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت أو مساويًا له.',
        'numeric' => 'يجب أن يكون :attribute أكبر من :value أو مساويًا له.',
        'string' => 'يجب أن يكون :attribute أكبر من :value حرفًا أو مساويًا له.',
    ],
    'image' => 'يجب أن يكون :attribute صورة.',
    'in' => 'قيمة حقل :attribute غير موجودة في قائمة القيم المسموح بها.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',
    'lt' => [
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر.',
        'file' => 'يجب أن يكون :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أقل من :value.',
        'string' => 'يجب ألا يقل :attribute عن :value حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :value عنصرًا.',
        'file' => 'يجب ألا يقل :attribute عن :value كيلوبايت.',
        'numeric' => 'يجب ألا يقل :attribute عن :value.',
        'string' => 'يجب ألا يقل :attribute عن :value حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون :attribute عنوان MAC صالحًا.',
    'max' => [
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصرًا.',
        'file' => 'يجب ألا يزيد :attribute على :max كيلوبايت.',
        'numeric' => 'يجب ألا يزيد :attribute على :max.',
        'string' => 'يجب ألا يزيد :attribute على :max حرفًا.',
    ],
    'max_digits' => 'يجب ألا يحتوي :attribute على أكثر من :max رقمًا.',
    'mimes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي :attribute على :min عناصر على الأقل.',
        'file' => 'يجب ألا يقل :attribute عن :min كيلوبايت.',
        'numeric' => 'يجب ألا يقل :attribute عن :min.',
        'string' => 'يجب ألا يقل :attribute عن :min حرفًا.',
    ],
    'min_digits' => 'يجب أن يحتوي :attribute على :min أرقام على الأقل.',
    'multiple_of' => 'يجب أن يكون :attribute من مضاعفات :value.',
    'not_in' => 'يجب ألا يكون حقل :attribute موجودًا في القائمة.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي :attribute على حرف كبير واحد وحرف صغير واحد على الأقل.',
        'numbers' => 'يجب أن يحتوي :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'حقل :attribute ظهر في بيانات مُسربة. الرجاء اختيار :attribute مختلف.',
    ],
    'present' => 'يجب تقديم حقل :attribute.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور إذا كان :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other ضمن :values.',
    'prohibits' => 'الحقل :attribute يحظر تواجد الحقل :other.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'الحقل :attribute يجب أن يحتوي على مدخلات لـ: :values.',
    'required_if' => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_if_accepted' => 'الحقل :attribute مطلوب عند قبول الحقل :other.',
    'required_unless' => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_without' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي :attribute على :size عنصرًا.',
        'file' => 'يجب أن يكون :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute :size.',
        'string' => 'يجب أن يكون :attribute :size حرفًا.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صالحًا.',
    'unique' => 'قيمة حقل :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ :attribute.',
    'url' => 'يجب أن يكون :attribute عنوان URL صالحًا.',
    'uuid' => 'يجب أن يكون :attribute UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address' => 'عنوان',
        'amount' => 'المبلغ',
        'availability' => 'التوفر',
        'avatar' => 'الصورة الرمزية',
        'barcode_symbology' => 'ترميز الرمز الشريطي',
        'brand_id' => 'معرّف العلامة التجارية',
        'cash_register_id' => 'معرّف سجل النقد',
        'category_id' => 'معرّف الفئة',
        'city' => 'مدينة',
        'code' => 'الرقم التسلسلي',
        'country' => 'دولة',
        'customer_group_id' => 'معرّف مجموعة العملاء',
        'date' => 'تاريخ',
        'default_client_id' => 'معرّف العميل الافتراضي',
        'default_warehouse_id' => 'معرّف المستودع الافتراضي',
        'description' => 'وصف',
        'document' => 'مستند',
        'email' => 'البريد الإلكتروني',
        'end_date' => 'تاريخ الانتهاء',
        'featured' => 'Featured',
        'frequency' => 'التكرار',
        'guard_name' => 'اسم الحارس',
        'image' => 'صورة',
        'is_all_warehouses' => 'يشمل كل المستودعات',
        'mail_encryption' => 'تشفير البريد',
        'mail_from_address' => 'البريد من العنوان',
        'mail_from_name' => 'البريد من الاسم',
        'mail_host' => 'المضيف',
        'mail_mailer' => 'البريد الإلكتروني',
        'mail_password' => 'كلمة مرور البريد',
        'mail_port' => 'منفذ البريد',
        'mail_username' => 'اسم البريد',
        'name' => 'اسم',
        'note' => 'ملحوظة',
        'password' => 'Password',
        'phone' => 'هاتف',
        'reference' => 'المرجعي',
        'role_id' => 'معرّف الدور',
        'seasonality' => 'الموسمية',
        'start_date' => 'تاريخ البدء',
        'status' => 'حالة',
        'tax_amount' => 'Tax amount',
        'tax_number' => 'الرقم الضريبي',
        'tax_type' => 'ضريبة قياسية',
        'title' => 'عنوان',
        'unit' => 'الوحدة',
        'user_id' => 'معرّف المستخدم',
        'warehouse_id' => 'معرّف المستودع',
    ],
];
