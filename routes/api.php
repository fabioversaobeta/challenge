<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImportController;

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PhonesController;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ItemOrderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/import', [ImportController::class, 'index']);

/**
 * People
 */
Route::get('/getPeople', [PeopleController::class, 'index']);
Route::get('/getPhones', [PhonesController::class, 'index']);

Route::get('/getAddress', [AddressController::class, 'index']);
Route::get('/getItems', [ItemsController::class, 'index']);
Route::get('/getOrders', [OrdersController::class, 'index']);
Route::get('/getItemOrder', [ItemOrderController::class, 'index']);
