<?php

namespace Platform\Core\Base\Services;

use Platform\Core\Base\Models\Plugin;
use Illuminate\Support\Facades\Artisan;

class PluginService
{
    /**
     * INSTALL PLUGIN
     */
    public function install(string $slug): void
    {
        $plugin = Plugin::query()->where('slug', $slug)->firstOrFail();
        $plugin->update([
            'is_installed' => 1,
            'is_active' => 1,
        ]);

        $this->runMigrations($slug);
    }

    /**
     * UNINSTALL PLUGIN
     */
    public function uninstall(string $slug): void
    {
    $plugin = Plugin::query()->where('slug', $slug)->firstOrFail();
        // 1. rollback database plugin
        $this->rollbackMigrations($slug);

        // 2. update trạng thái
        $plugin->update([
            'is_installed' => 0,
            'is_active' => 0,
        ]);
    }

    /**
     * ACTIVATE
     */
    public function activate(string $slug): void
    {
        Plugin::where('slug', $slug)->update([
            'is_active' => 1,
        ]);
    }

    /**
     * DEACTIVATE
     */
    public function deactivate(string $slug): void
    {
        Plugin::where('slug', $slug)->update([
            'is_active' => 0,
        ]);
    }

    /**
     * RUN MIGRATIONS (INSTALL)
     */
    protected function runMigrations(string $slug): void
    {
        $path = base_path("platform/plugins/{$slug}/database/migrations");

        if (is_dir($path)) {
            Artisan::call('migrate', [
                '--path' => "platform/plugins/{$slug}/database/migrations",
                '--force' => true,
            ]);
        }
    }

    /**
     * ROLLBACK MIGRATIONS (UNINSTALL)
     */
    protected function rollbackMigrations(string $slug): void
    {
        $path = base_path("platform/plugins/{$slug}/database/migrations");

        if (is_dir($path)) {
            Artisan::call('migrate:rollback', [
                '--path' => "platform/plugins/{$slug}/database/migrations",
                '--force' => true,
            ]);
        }
    }
}
