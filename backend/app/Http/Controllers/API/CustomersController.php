<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Models\Customer;
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
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function action(Request $request)
    {
        $useStorage = $request->get('userStorage');
        if (!$useStorage) {
            return response()->json(Customer::all());
        }

        return response()->json(Customer::all());
    }

    /**
     * @param Request $request
     */
    public function addCustomer(Request $request)
    {

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
