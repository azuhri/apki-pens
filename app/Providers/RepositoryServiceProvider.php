<?php

namespace App\Providers;

use App\Repositories\LocationRepository\LocationRepository;
use App\Repositories\LocationRepository\LocationRepositoryInterface;
use App\Repositories\MapRepository\MapRepository;
use App\Repositories\MapRepository\MapRepositoryInterface;
use App\Repositories\ReportRepository\ReportRepository;
use App\Repositories\ReportRepository\ReportRepositoryInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(MapRepositoryInterface::class, MapRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
