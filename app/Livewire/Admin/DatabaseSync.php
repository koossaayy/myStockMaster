<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Services\DatabaseSyncService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DatabaseSync extends Component
{
    public bool $isOnline = false;

    public ?Carbon $lastSync = null;

    public array $syncLog = [];

    protected ?DatabaseSyncService $syncService = null;

    public function boot(DatabaseSyncService $databaseSyncService): void
    {
        $this->syncService = $databaseSyncService;
    }

    public function mount(): void
    {
        $this->checkOnlineStatus();
        $this->loadSyncHistory();
    }

    public function render(): mixed
    {
        return view('livewire.admin.database-sync');
    }

    /** Check if the online database is available. */
    public function checkOnlineStatus(): void
    {
        try {
            $this->isOnline = $this->syncService->isOnlineAvailable();
        } catch (Exception $exception) {
            $this->isOnline = false;
            Log::error('Failed to check online status: ' . $exception->getMessage());
        }
    }

    /** Load sync history from cache. */
    private function loadSyncHistory(): void
    {
        $rawLastSync = Cache::get('database_sync.last_sync');

        if ($rawLastSync instanceof Carbon) {
            $this->lastSync = $rawLastSync;
        } elseif (is_string($rawLastSync) && $rawLastSync !== '') {
            $this->lastSync = \Illuminate\Support\Facades\Date::parse($rawLastSync);
        } else {
            $this->lastSync = null;
        }

        $this->syncLog = Cache::get('database_sync.log', []);

        // Keep only the last 20 log entries
        $this->syncLog = array_slice($this->syncLog, -20);
    }

    /** Sync data from online to offline database. */
    public function syncToOffline(): void
    {
        if (! $this->isOnline) {
            $this->addToLog('error', __('Cannot sync to offline: Online database is not available'));

            return;
        }

        try {
            $this->addToLog('info', __('Starting sync from online to offline database...'));

            $result = $this->syncService->syncToOffline();

            if ($result) {
                $this->addToLog('success', __('Successfully synced data to offline database'));
                $this->updateLastSync();

                // Show success notification
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => __('admin.database_sync.messages.sync_to_offline_success'),
                ]);
            } else {
                $this->addToLog('error', __('Failed to sync data to offline database'));

                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => __('admin.database_sync.messages.sync_to_offline_failed'),
                ]);
            }
        } catch (Exception $exception) {
            $this->addToLog('error', __('Sync to offline failed: :message', ['message' => $exception->getMessage()]));
            Log::error('Sync to offline failed', ['error' => $exception->getMessage()]);

            $this->dispatch('notify', [
                'type' => 'error',
                'message' => __('admin.database_sync.messages.sync_error', ['error' => $exception->getMessage()]),
            ]);
        }
    }

    /** Sync data from offline to online database. */
    public function syncToOnline(): void
    {
        if (! $this->isOnline) {
            $this->addToLog('error', __('Cannot sync to online: Online database is not available'));

            return;
        }

        try {
            $this->addToLog('info', __('Starting sync from offline to online database...'));

            $result = $this->syncService->syncToOnline();

            if ($result) {
                $this->addToLog('success', __('Successfully synced data to online database'));
                $this->updateLastSync();

                // Show success notification
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => __('admin.database_sync.messages.sync_to_online_success'),
                ]);
            } else {
                $this->addToLog('error', __('Failed to sync data to online database'));

                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => __('admin.database_sync.messages.sync_to_online_failed'),
                ]);
            }
        } catch (Exception $exception) {
            $this->addToLog('error', __('Sync to online failed: :message', ['message' => $exception->getMessage()]));
            Log::error('Sync to online failed', ['error' => $exception->getMessage()]);

            $this->dispatch('notify', [
                'type' => 'error',
                'message' => __('admin.database_sync.messages.sync_error', ['error' => $exception->getMessage()]),
            ]);
        }
    }

    /** Perform bidirectional sync. */
    public function syncBidirectional(): void
    {
        if (! $this->isOnline) {
            $this->addToLog('error', __('Cannot perform bidirectional sync: Online database is not available'));

            return;
        }

        try {
            $this->addToLog('info', __('Starting bidirectional sync...'));

            // First sync from online to offline
            $toOfflineResult = $this->syncService->syncToOffline();

            if ($toOfflineResult) {
                $this->addToLog('success', __('Phase 1: Successfully synced from online to offline'));

                // Then sync from offline to online
                $toOnlineResult = $this->syncService->syncToOnline();

                if ($toOnlineResult) {
                    $this->addToLog('success', __('Phase 2: Successfully synced from offline to online'));
                    $this->addToLog('success', __('Bidirectional sync completed successfully'));
                    $this->updateLastSync();

                    $this->dispatch('notify', [
                        'type' => 'success',
                        'message' => __('admin.database_sync.messages.bidirectional_sync_success'),
                    ]);
                } else {
                    $this->addToLog('error', __('Phase 2: Failed to sync from offline to online'));
                }
            } else {
                $this->addToLog('error', __('Phase 1: Failed to sync from online to offline'));
            }
        } catch (Exception $exception) {
            $this->addToLog('error', __('Bidirectional sync failed: :message', ['message' => $exception->getMessage()]));
            Log::error('Bidirectional sync failed', ['error' => $exception->getMessage()]);

            $this->dispatch('notify', [
                'type' => 'error',
                'message' => __('admin.database_sync.messages.sync_error', ['error' => $exception->getMessage()]),
            ]);
        }
    }

    /** Clear sync log. */
    public function clearLog(): void
    {
        $this->syncLog = [];
        Cache::forget('database_sync.log');

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => __('admin.database_sync.messages.log_cleared'),
        ]);
    }

    /** Add entry to sync log. */
    private function addToLog(string $type, string $message): void
    {
        $entry = [
            'type' => $type,
            'message' => $message,
            'timestamp' => \Illuminate\Support\Facades\Date::now()->format('Y-m-d H:i:s'),
        ];

        $this->syncLog[] = $entry;

        // Keep only the last 20 entries
        $this->syncLog = array_slice($this->syncLog, -20);

        // Cache the log
        Cache::put('database_sync.log', $this->syncLog, now()->addDays(7));
    }

    /** Update last sync timestamp. */
    private function updateLastSync(): void
    {
        $this->lastSync = \Illuminate\Support\Facades\Date::now();
        Cache::put('database_sync.last_sync', $this->lastSync->toDateTimeString(), now()->addDays(30));
    }

    /** Refresh the component data. */
    public function refresh(): void
    {
        $this->checkOnlineStatus();
        $this->loadSyncHistory();

        $this->dispatch('notify', [
            'type' => 'info',
            'message' => __('admin.database_sync.messages.refreshed'),
        ]);
    }
}
