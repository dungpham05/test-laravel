<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\LicensePlateRepository;
use App\Repositories\Interfaces\LicensePlateRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->bind(
            LicensePlateRepositoryInterface::class,
            LicensePlateRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
