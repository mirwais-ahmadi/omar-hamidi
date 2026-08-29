<?php

namespace App\Providers;

use App\Services\ContentService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ContentService::class);
    }

    public function boot(): void
    {
        View::composer(['partials.footer', 'partials.nav', 'layouts.app'], function ($view) {
            try {
                $content = app(ContentService::class);
                $view->with([
                    'settings' => $content->section('settings'),
                    'contactInfo' => $content->section('contact'),
                ]);
            } catch (\Throwable) {
                $view->with([
                    'settings' => [],
                    'contactInfo' => [],
                ]);
            }
        });
    }
}
