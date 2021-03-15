<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Exceptions\InvalidCustomerException;
use App\Exceptions\StorageServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\CustomerRecord;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class CustomersController
 * @package App\Http\Controllers\API
 */
class CustomersController extends Controller implements Actionable
{
    /**
     * @var array
     */
    protected $storage = [];

    /**
     * CustomersController constructor.
     */
    public function __construct()
    {
        $this->storage = Config::get('reference_book.storage', [
            StorageService::DEFAULT_SERVICE_STORAGE => Customer::class
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function action(Request $request)
    {
        $usedStorage = $request->get('usedStorage');
        if (!$usedStorage || $usedStorage === StorageService::DEFAULT_SERVICE_STORAGE) {
            return response()->json(Customer::all());
        }

        $scheme = $this->storage[$usedStorage];

        return response()->json(app()->make($scheme)->toArray());
    }

    /**
     * @param CustomerRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws InvalidCustomerException
     */
    public function addCustomer(CustomerRequest $request)
    {
        $validated = $request->validated();
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }

        $scheme = $this->storage[$request->database];

        $record = CustomerRecord::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        try {
            $result = app()->make($scheme)->save($record);
        } catch (StorageServiceException $e) {
            return response()->json([$e->getMessage()], 500);
        } catch (InvalidCustomerException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return response()->json([$e->getMessage(), $e->getTraceAsString()], 500);
        }

        if (!$result) {
            return response()->json(['Error saving customer data.'], 500);
        }

        return response()->json(['Customer was added successfully']);
    }
}
