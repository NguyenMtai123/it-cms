<?php

namespace Platform\Core\Base\Http\Controllers;

use Platform\Core\Base\Models\Plugin;
use Platform\Core\Base\Services\PluginService;
use Illuminate\Http\Request;

class PluginController
{
    public function __construct(
        protected PluginService $service
    ) {}

    public function index(Request $request)
    {
        $query = Plugin::query();

        switch ($request->tab) {
            case 'installed':
                $query->where('is_installed', 1);
                break;

            case 'not-installed':
                $query->where('is_installed', 0);
                break;

            case 'active':
                $query->where('is_active', 1);
                break;

            case 'inactive':
                $query->where('is_active', 0);
                break;
        }

        $plugins = $query->get();

        return view('base::plugins.index', compact('plugins'));
    }

    public function install($id)
    {
        $plugin = Plugin::findOrFail($id);
        $this->service->install($plugin->slug);
        return back();
    }

    public function uninstall($id)
    {
        $plugin = Plugin::findOrFail($id);
        $this->service->uninstall($plugin->slug);
        return back();
    }

    public function activate($id)
    {
        $plugin = Plugin::findOrFail($id);
        $this->service->activate($plugin->slug);
        return back();
    }

    public function deactivate($id)
    {
        $plugin = Plugin::findOrFail($id);
        $this->service->deactivate($plugin->slug);
        return back();
    }
}
