<?php

namespace App\Providers;

use App\Services\EmailService\EmailService;
use App\Services\EmailService\EmailServiceInterface;
use App\Services\FileService\FileService;
use App\Services\FileService\FileServiceInterface;
use App\Services\JsonService\JsonService;
use App\Services\JsonService\JsonServiceInterface;
use App\Services\JsonService\JsonServices;
use App\Services\LoginService\LoginService;
use App\Services\LoginService\LoginServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmailServiceInterface::class, EmailService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(FileServiceInterface::class, FileService::class);
        $this->app->bind(JsonServiceInterface::class, JsonService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
