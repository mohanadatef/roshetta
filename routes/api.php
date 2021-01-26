<?php

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['middleware' => 'api'], function () {
        Route::prefix('/user')->group(function () {
            Route::Post('/store', [App\Http\Controllers\Acl\PatientController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Acl\PatientController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Acl\PatientController::class, 'update']);
        });
});