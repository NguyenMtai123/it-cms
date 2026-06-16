<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Platform\Plugins\Footer\Models\FooterSetting;
use Platform\Plugins\Footer\Models\FooterLink;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('theme::partials.footer', function ($view) {

            $view->with(
                'footerSetting',
                FooterSetting::first()
            );

            $view->with(
                'organizationLinks',
                FooterLink::where('group', 'organization')
                    ->where('status', 1)
                    ->orderBy('sort_order')
                    ->get()
            );

            $view->with(
                'quickFooterLinks',
                FooterLink::where('group', 'quick')
                    ->where('status', 1)
                    ->orderBy('sort_order')
                    ->get()
            );
        });
    }
}
