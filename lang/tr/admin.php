<?php

return [
    'database_sync' => [
        'status' => [
            'title' => 'Durum',
        ],
        'sync_to_offline' => [
            'title' => 'Çevrimdışına senkronize et',
            'description' => 'Verileri çevrimdışı kullanım için senkronize et',
            'button' => 'Çevrimdışına senkronize et',
        ],
        'syncing' => 'Senkronize ediliyor...',
        'sync_to_online' => [
            'title' => 'Çevrimiçine senkronize et',
            'description' => 'Çevrimdışı veritabanınızı çevrimiçi sistemle senkronize edin.',
            'button' => 'Çevrimiçine senkronize et',
        ],
        'log' => [
            'title' => 'Senkronizasyon günlüğü',
        ],
        'messages' => [
            'sync_to_offline_success' => 'Çevrimdışı senkronizasyon başarıyla tamamlandı.',
            'sync_to_offline_failed' => 'Çevrimdışı senkronizasyon başarısız oldu.',
            'sync_error' => 'Senkronizasyon hatası: :error',
            'sync_to_online_success' => 'Çevrimiçi senkronizasyon başarıyla tamamlandı.',
            'sync_to_online_failed' => 'Çevrimiçi senkronizasyon başarısız oldu.',
            'bidirectional_sync_success' => 'Çift yönlü senkronizasyon başarıyla tamamlandı.',
            'log_cleared' => 'Günlük başarıyla temizlendi.',
            'refreshed' => 'Başarıyla yenilendi.',
        ],
    ],
];
