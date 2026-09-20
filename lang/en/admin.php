<?php

return [
    'database_sync' => [
        'status' => [
            'title' => 'Status',
        ],
        'sync_to_offline' => [
            'title' => 'Sync to offline',
            'description' => 'Synchronize data for offline use',
            'button' => 'Sync to offline',
        ],
        'syncing' => 'Syncing...',
        'sync_to_online' => [
            'title' => 'Sync to Online',
            'description' => 'Synchronize your offline database with the online system.',
            'button' => 'Sync to Online',
        ],
        'log' => [
            'title' => 'Sync Log',
        ],
        'messages' => [
            'sync_to_offline_success' => 'Offline sync completed successfully.',
            'sync_to_offline_failed' => 'Offline sync failed.',
            'sync_error' => 'Sync error: :error',
            'sync_to_online_success' => 'Online sync completed successfully.',
            'sync_to_online_failed' => 'Online sync failed.',
            'bidirectional_sync_success' => 'Bidirectional sync completed successfully.',
            'log_cleared' => 'Log cleared successfully.',
            'refreshed' => 'Refreshed successfully.',
        ],
    ],
];
