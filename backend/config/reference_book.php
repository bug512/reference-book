<?php

use App\Models\Customer;
return [
    'storage' => [
        'Mysql' => Customer::class,
        'Cache' => CacheCustome,
        'JSON' => 'jsonStorage',
        'XLSX' => 'xlsxStorage',
    ],
];
