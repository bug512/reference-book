<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\CustomerRecord;
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
     * @param CustomerRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function addCustomer(CustomerRequest $request)
    {
        $validated = $request->validated();
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }

        $storage = Config::get('reference_book.storage', ['Mysql' => 'mysqlStorage']);
        $scheme = $storage[$request->database];

        $record = CustomerRecord::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        try {
            $result = app()->make($scheme)->save($record);
        } catch (\Throwable $e) {
            return response()->json(['Error'], 500);
        }

        if (!$result) {
            return response()->json(['Error saving customer data.'], 500);
        }

        return response()->json(['Customer was added successfully']);
    }
}
