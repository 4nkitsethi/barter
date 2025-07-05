<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $modulesPath = app_path('Modules');
        $modules = scandir($modulesPath);

        foreach ($modules as $module) {
            if (in_array($module, ['.', '..'])) continue;

            $provider = "App\\Modules\\{$module}\\ModuleServiceProvider";
            if (class_exists($provider)) {
                $this->app->register($provider);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
