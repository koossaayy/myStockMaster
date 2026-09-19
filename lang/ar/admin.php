<?php

return [
    'database_sync' => [
        'status' => [
            'title' => 'الحالة',
        ],
        'sync_to_offline' => [
            'title' => 'مزامنة للاستخدام دون اتصال',
            'description' => 'مزامنة البيانات للاستخدام دون اتصال',
            'button' => 'مزامنة للاستخدام دون اتصال',
        ],
        'syncing' => 'جارٍ المزامنة...',
        'sync_to_online' => [
            'title' => 'مزامنة إلى متصل',
            'description' => 'زامِن قاعدة البيانات غير المتصلة لديك مع البرنامج المتصل.',
            'button' => 'مزامنة إلى متصل',
        ],
        'log' => [
            'title' => 'سجل المزامنة',
        ],
        'messages' => [
            'sync_to_offline_success' => 'اكتملت المزامنة غير المتصلة بنجاح.',
            'sync_to_offline_failed' => 'فشلت المزامنة غير المتصلة.',
            'sync_error' => 'خطأ المزامنة: :error',
            'sync_to_online_success' => 'اكتملت المزامنة المتصلة بنجاح.',
            'sync_to_online_failed' => 'فشلت المزامنة المتصلة.',
            'bidirectional_sync_success' => 'اكتملت المزامنة الثنائية الاتجاه بنجاح.',
            'log_cleared' => 'تم مسح السجل بنجاح.',
            'refreshed' => 'تم التحديث بنجاح.',
        ],
    ],
];
