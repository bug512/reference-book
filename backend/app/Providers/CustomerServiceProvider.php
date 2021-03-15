<?php

namespace App\Providers;

use App\Services\CacheStorageService;
use App\Services\JsonStorageService;
use App\Services\MysqlStorageService;
use App\Services\XlsxStorageService;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MysqlStorageService::SERVICE_NAME, MysqlStorageService::class);
        $this->app->bind(CacheStorageService::SERVICE_NAME, CacheStorageService::class);
        $this->app->bind(JsonStorageService::SERVICE_NAME, JsonStorageService::class);
        $this->app->bind(XlsxStorageService::SERVICE_NAME, XlsxStorageService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
