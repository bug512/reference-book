<?php

namespace App\Providers;

use App\Services\CacheStorageService;
use App\Services\JsonStorageService;
use App\Services\MysqlStorageService;
use App\Services\XslxStorageService;
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
        $this->app->bind('mysqlStorage', MysqlStorageService::class);
        $this->app->bind('cacheStorage', CacheStorageService::class);
        $this->app->bind('jsonStorage', JsonStorageService::class);
        $this->app->bind(XlsxStorageService::SERV, XlsxStorageService::class);
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
