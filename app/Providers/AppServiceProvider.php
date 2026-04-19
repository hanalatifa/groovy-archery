<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
    // Jika file kamu ada di resources/views/dashboard/admin-layout.blade.php
    Blade::component('dashboard.admin-layout', 'admin-layout');

    // Jika kamu ingin menggunakan namespace untuk folder komponen
    Blade::anonymousComponentNamespace('dashboard/components', 'dashboard');
}
}
