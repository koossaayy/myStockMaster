<?php

declare(strict_types=1);

namespace App\Native\Services;

use App\Services\DatabaseSyncService;
use App\Services\EnvironmentService;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DesktopShortcutService
{
    /** Available keyboard shortcuts for desktop mode */
    public const SHORTCUTS = [
        // Navigation shortcuts
        'ctrl+d' => 'toggleDevTools',
        'ctrl+shift+d' => 'toggleDevTools',
        'ctrl+r' => 'refreshPage',
        'f5' => 'refreshPage',
        'ctrl+shift+r' => 'hardRefresh',
        'f11' => 'toggleFullscreen',
        'alt+f4' => 'closeWindow',
        'ctrl+m' => 'minimizeWindow',
        'ctrl+shift+m' => 'maximizeWindow',

        // Application shortcuts
        'ctrl+shift+s' => 'syncData',
        'ctrl+shift+o' => 'toggleOfflineMode',
        'ctrl+shift+n' => 'showNotifications',
        'ctrl+shift+c' => 'clearCache',
        'ctrl+shift+l' => 'showLogs',

        // POS shortcuts
        'ctrl+shift+p' => 'openPOS',
        'ctrl+shift+i' => 'addProduct',
        'ctrl+shift+w' => 'showWarehouses',

        // Quick actions
        'ctrl+n' => 'newSale',
        'ctrl+shift+q' => 'newQuotation',
        'ctrl+shift+b' => 'showBarcode',
        'ctrl+shift+e' => 'exportData',

        // System shortcuts
        'ctrl+shift+?' => 'showHelp',
        'ctrl+shift+a' => 'showAbout',
        'ctrl+shift+u' => 'checkUpdates',
        'escape' => 'closeModal',
    ];

    /** Execute a shortcut action */
    public function executeShortcut(string $shortcut): array
    {
        if (! EnvironmentService::isDesktop()) {
            return [
                'success' => false,
                'action' => null,
                'message' => __('Desktop shortcuts only available in desktop mode'),
            ];
        }

        $action = self::SHORTCUTS[$shortcut] ?? null;

        if (! $action) {
            return [
                'success' => false,
                'action' => null,
                'message' => __('Unknown shortcut: :shortcut', ['shortcut' => $shortcut]),
            ];
        }

        try {
            return $this->$action();
        } catch (Exception $exception) {
            Log::error('Desktop shortcut error', [
                'shortcut' => $shortcut,
                'action' => $action,
                'error' => $exception->getMessage(),
            ]);

            return [
                'success' => false,
                'action' => $action,
                'message' => __('Failed to execute shortcut: :message', ['message' => $exception->getMessage()]),
            ];
        }
    }

    /** Get all available shortcuts with descriptions */
    public function getShortcuts(): array
    {
        return [
            'Navigation' => [
                'ctrl+d' => __('Toggle Developer Tools'),
                'ctrl+shift+d' => __('Toggle Developer Tools'),
                'ctrl+r' => __('Refresh Page'),
                'f5' => __('Refresh Page'),
                'ctrl+shift+r' => __('Hard Refresh (Clear Cache)'),
                'f11' => __('Toggle Fullscreen'),
                'alt+f4' => __('Close Window'),
                'ctrl+m' => __('Minimize Window'),
                'ctrl+shift+m' => __('Maximize Window'),
            ],
            'Application' => [
                'ctrl+shift+s' => __('Sync Data'),
                'ctrl+shift+o' => __('Toggle Offline Mode'),
                'ctrl+shift+n' => __('Show Notifications'),
                'ctrl+shift+c' => __('Clear Cache'),
                'ctrl+shift+l' => __('Show Logs'),
            ],
            'POS & Inventory' => [
                'ctrl+shift+p' => __('Open POS'),
                'ctrl+shift+i' => __('Add Product'),
                'ctrl+n' => __('New Sale'),
                'ctrl+shift+q' => __('New Quotation'),
                'ctrl+shift+b' => __('Show Barcode Generator'),
            ],
            'Management' => [
                'ctrl+shift+u' => __('Show Users'),
                'ctrl+shift+w' => __('Show Warehouses'),
                'ctrl+shift+e' => __('Export Data'),
            ],
            'System' => [
                'ctrl+shift+?' => __('Show Help'),
                'ctrl+shift+a' => __('Show About'),
                'ctrl+shift+u' => __('Check for Updates'),
                'escape' => __('Close Modal/Dialog'),
            ],
        ];
    }

    // Window management actions
    protected function toggleDevTools(): array
    {
        return ['success' => true, 'action' => 'toggleDevTools', 'message' => __('Developer tools toggled')];
    }

    protected function refreshPage(): array
    {
        return ['success' => true, 'action' => 'refresh', 'message' => __('Page refreshed')];
    }

    protected function hardRefresh(): array
    {
        Cache::flush();

        return ['success' => true, 'action' => 'hardRefresh', 'message' => __('Hard refresh completed')];
    }

    protected function toggleFullscreen(): array
    {
        return ['success' => true, 'action' => 'toggleFullscreen', 'message' => __('Fullscreen toggled')];
    }

    protected function closeWindow(): array
    {
        return ['success' => true, 'action' => 'closeWindow', 'message' => __('Closing window')];
    }

    protected function minimizeWindow(): array
    {
        return ['success' => true, 'action' => 'minimizeWindow', 'message' => __('Window minimized')];
    }

    protected function maximizeWindow(): array
    {
        return ['success' => true, 'action' => 'maximizeWindow', 'message' => __('Window maximized')];
    }

    // Application actions
    protected function syncData(): array
    {
        try {
            $syncService = resolve(DatabaseSyncService::class);

            if (! $syncService->isOnlineAvailable()) {
                return ['success' => false, 'message' => __('Cannot sync: No internet connection')];
            }

            $toOfflineResult = $syncService->syncToOffline();
            $toOnlineResult = $syncService->syncToOnline();

            return [
                'success' => $toOfflineResult && $toOnlineResult,
                'action' => 'syncData',
                'message' => __('Data synchronization completed'),
                'data' => [
                    'to_offline' => $toOfflineResult,
                    'to_online' => $toOnlineResult,
                ],
            ];
        } catch (Exception $exception) {
            return ['success' => false, 'message' => __('Sync failed: :message', ['message' => $exception->getMessage()])];
        }
    }

    protected function toggleOfflineMode(): array
    {
        $currentMode = Cache::get('desktop_offline_mode', false);
        $newMode = ! $currentMode;

        Cache::put('desktop_offline_mode', $newMode, now()->addDays(30));

        return [
            'success' => true,
            'action' => 'toggleOfflineMode',
            'message' => $newMode ? __('Switched to offline mode') : __('Switched to online mode'),
            'offline_mode' => $newMode,
        ];
    }

    protected function showNotifications(): array
    {
        return ['success' => true, 'action' => 'showNotifications', 'message' => __('Notifications panel opened')];
    }

    protected function clearCache(): array
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');

            return ['success' => true, 'action' => 'clearCache', 'message' => __('All caches cleared successfully')];
        } catch (Exception $exception) {
            return ['success' => false, 'message' => __('Failed to clear cache: :message', ['message' => $exception->getMessage()])];
        }
    }

    protected function showLogs(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/logs', 'message' => __('Opening logs')];
    }

    // Navigation actions
    protected function openPOS(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/pos', 'message' => __('Opening POS')];
    }

    protected function addProduct(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/products/create', 'message' => __('Opening product creation')];
    }

    protected function showUsers(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/users', 'message' => __('Opening users management')];
    }

    protected function showWarehouses(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/warehouses', 'message' => __('Opening warehouses')];
    }

    // Quick actions
    protected function newSale(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/sales/create', 'message' => __('Creating new sale')];
    }

    protected function newQuotation(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/quotations/create', 'message' => __('Creating new quotation')];
    }

    protected function showBarcode(): array
    {
        return ['success' => true, 'action' => 'navigate', 'url' => '/admin/barcodes', 'message' => __('Opening barcode generator')];
    }

    protected function exportData(): array
    {
        return ['success' => true, 'action' => 'showModal', 'modal' => 'export-data', 'message' => __('Opening export dialog')];
    }

    // System actions
    protected function showHelp(): array
    {
        return ['success' => true, 'action' => 'showModal', 'modal' => 'help', 'message' => __('Opening help')];
    }

    protected function showAbout(): array
    {
        return ['success' => true, 'action' => 'showModal', 'modal' => 'about', 'message' => __('Opening about dialog')];
    }

    protected function checkUpdates(): array
    {
        return ['success' => true, 'action' => 'checkUpdates', 'message' => __('Checking for updates')];
    }

    protected function closeModal(): array
    {
        return ['success' => true, 'action' => 'closeModal', 'message' => __('Modal closed')];
    }

    /** Register shortcuts with the desktop environment */
    public function registerShortcuts(): void
    {
        if (! EnvironmentService::isDesktop()) {
            return;
        }

        // This would integrate with NativePHP's shortcut registration
        // For now, we'll log the registration
        Log::info('Desktop shortcuts registered', [
            'shortcuts' => array_keys(self::SHORTCUTS),
            'count' => count(self::SHORTCUTS),
        ]);
    }

    /** Check if a shortcut is available */
    public function isShortcutAvailable(string $shortcut): bool
    {
        return isset(self::SHORTCUTS[$shortcut]);
    }

    /** Get shortcut description */
    public function getShortcutDescription(string $shortcut): ?string
    {
        $shortcuts = $this->getShortcuts();

        foreach ($shortcuts as $categoryShortcuts) {
            if (isset($categoryShortcuts[$shortcut])) {
                return $categoryShortcuts[$shortcut];
            }
        }

        return null;
    }
}
