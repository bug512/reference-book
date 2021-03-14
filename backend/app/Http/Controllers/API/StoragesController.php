<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

/**
 * Class StoragesController
 * @package App\Http\Controllers\API
 */
class StoragesController extends Controller implements Actionable
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function action(Request $request)
    {
        $storage = Config::get('reference_book.storage', ['Mysql' => 'mysqlStorage']);

        return response()->json(array_keys($storage));
    }
}
