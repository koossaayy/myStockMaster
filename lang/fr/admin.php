<?php

return [
    'database_sync' => [
        'status' => [
            'title' => 'Statut',
        ],
        'sync_to_offline' => [
            'title' => 'Synchroniser pour une utilisation hors ligne',
            'description' => 'Synchroniser les données pour une utilisation hors ligne',
            'button' => 'Synchroniser pour une utilisation hors ligne',
        ],
        'syncing' => 'Synchronisation...',
        'sync_to_online' => [
            'title' => 'Synchroniser en ligne',
            'description' => 'Synchronisez votre base de données hors ligne avec le système en ligne.',
            'button' => 'Synchroniser en ligne',
        ],
        'log' => [
            'title' => 'Journal de synchronisation',
        ],
        'messages' => [
            'sync_to_offline_success' => 'La synchronisation hors ligne a été effectuée avec succès.',
            'sync_to_offline_failed' => 'La synchronisation hors ligne a échoué.',
            'sync_error' => 'Erreur de synchronisation : :error',
            'sync_to_online_success' => 'La synchronisation en ligne a été effectuée avec succès.',
            'sync_to_online_failed' => 'La synchronisation en ligne a échoué.',
            'bidirectional_sync_success' => 'La synchronisation bidirectionnelle a été effectuée avec succès.',
            'log_cleared' => 'Le journal a été effacé avec succès.',
            'refreshed' => 'Actualisé avec succès.',
        ],
    ],
];
