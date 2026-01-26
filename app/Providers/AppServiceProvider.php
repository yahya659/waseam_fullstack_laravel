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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $settings = \App\Models\Setting::all()->pluck('value', 'key');
            view()->share('settings', $settings);
        } catch (\Exception $e) {
            // في حال ما قد ترحلة قاعدة البيانات اول مره عند تثبيت الموقعيشن
        }
    }
}
