<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\SignUpController;
use \App\Http\Controllers\API\CustomersController;
use \App\Http\Controllers\API\StoragesController;
use \App\Http\Controllers\API\UserController;

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

Route::get('storages', [StoragesController::class, 'action']);

Route::get('customers', [CustomersController::class, 'action']);

Route::post('sign-up', [SignUpController::class, 'action']);

Route::get('storages', [StoragesController::class, 'action']);

Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [UserController::class, 'action']);

    Route::post('add-customer', [CustomersController::class, 'addCustomer']);

    Route::get('/logout', [UserController::class, 'logout']);
});

