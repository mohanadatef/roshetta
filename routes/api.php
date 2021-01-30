<?php

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
        Route::prefix('/patient')->group(function () {
            Route::Post('/store', [App\Http\Controllers\Acl\PatientController::class, 'store']);
            Route::get('/show_profile/{id}', [App\Http\Controllers\Acl\PatientController::class, 'show_profile']);
            Route::post('/update', [App\Http\Controllers\Acl\PatientController::class, 'update']);
        });
    Route::prefix('/auth')->group(function () {
        Route::post('login', [App\Http\Controllers\Acl\PatientController::class, 'login']);
        Route::post('logout', [App\Http\Controllers\Acl\PatientController::class, 'logout']);
    });
});
Route::prefix('/language')->group(function () {
    Route::get('/list', [App\Http\Controllers\Core_Data\LanguageController::class, 'list_data']);
});
Route::prefix('/company_insurance')->group(function () {
    Route::get('/list', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'list_data']);
});
Route::prefix('/country')->group(function () {
    Route::get('/list', [App\Http\Controllers\Core_Data\CountryController::class, 'list_data']);
});