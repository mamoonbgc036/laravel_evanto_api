<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Resources\V1\InvoiceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// don't need to import class for every controller if provide namespace as below
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);
    Route::post('invoice/bulk', [InvoiceController::class, 'bulkInvoie']);
});
