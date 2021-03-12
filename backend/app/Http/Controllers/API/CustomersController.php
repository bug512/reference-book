<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Models\CustomerMysql;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class CustomersController
 * @package App\Http\Controllers\API
 */
class CustomersController extends Controller implements Actionable
{
    /**
     * @param Request $request
     * @return Request|mixed
     */
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function action(Request $request)
    {
        $useStorage = $request->get('userStorage');
        if (!$useStorage) {
            return response()->json(CustomerMysql::all());
        }

        return response()->json(['sdsdsd']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function storage()
    {
        $storage = Config::get('customers.storage', ['mysql']);
        return response()->json($storage);
    }
}
