<?php

namespace App\Providers;

use App\Models\AppConfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Share AppConfig data to all views globally.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $data = cache()->remember('app_config', 60, function () {
                $config = AppConfig::first();
                return $config ? $config->toArray() : [
                    'instansi_name' => 'Kiosk Antrian',
                    'active_theme'  => 'default',
                ];
            });

            $appConfig = new AppConfig($data);
            $appConfig->exists = isset($data['id']);
            if (isset($data['id'])) {
                $appConfig->id = $data['id'];
            }

            $view->with('appConfig', $appConfig);
        });
    }
}
