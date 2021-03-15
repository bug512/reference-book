<?php

use App\Services\MysqlStorageService;
use App\Services\CacheStorageService;
use App\Services\JsonStorageService;
use App\Services\XlsxStorageService;

return [
    'storage' => [
        'Mysql' => MysqlStorageService::class,
        'Cache' => CacheStorageService::class,
        'JSON' => JsonStorageService::class,
        'XLSX' => XlsxStorageService::class,
    ],

    'storage_path' => [
        'json' => 'app/public/database.json',
        'xlsx' => 'public/database.xlsx',
        'cache' => 'database.cache',
    ],

    'cache_driver' => env('RB_CACHE_DRIVER', 'memcached'),
];
