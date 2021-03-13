<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\SignUpController;
use \App\Http\Controllers\API\SignInController;
use \App\Http\Controllers\API\CustomersController;
use \App\Http\Controllers\API\StoragesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('sign-up', [SignUpController::class, 'action']);

Route::post('sign-in', [SignInController::class, 'action']);

Route::get('storages', [StoragesController::class, 'action']);

Route::post('customers/add-customer', [CustomersController::class, 'addCustomer']);

Route::get('customers', [CustomersController::class, 'action']);


Route::middleware('auth:api')->group(function () {
    Route::post('/login', function (Request $request) {
        return $request;
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/list', function (Request $request) {
        dd($request);
        return User::all();
    });
});

