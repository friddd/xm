<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        /** Services */
        $this->app->bind(
            \App\Contracts\Services\CompanyService::class,
            \App\Services\CompanyService::class
        );

        /** Repositorires */
        $this->app->bind(
            \App\Contracts\Repositories\CompanyRepository::class,
            \App\Repositories\CompanyRepository::class
        );
    }

    public function boot(): void
    {
    }
}
