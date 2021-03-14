<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

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
    public function addCustomer(CustomerRequest $request)
    {
        $validated = $request->validated();
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        return response()->json(['Customer was added successfully']);
    }
}
