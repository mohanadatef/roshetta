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
    Route::group(['middleware' => 'auth:api'], function () {
        Route::prefix('/patient')->group(function () {
            Route::get('/show_profile', [App\Http\Controllers\Acl\PatientController::class, 'show_profile']);
            Route::post('/update', [App\Http\Controllers\Acl\PatientController::class, 'update']);
        });
        Route::prefix('/auth')->group(function () {
            Route::post('logout', [App\Http\Controllers\Acl\PatientController::class, 'logout']);
        });
    });
    Route::prefix('/patient')->group(function () {
        Route::Post('/store', [App\Http\Controllers\Acl\PatientController::class, 'store']);
    });
    Route::prefix('/auth')->group(function () {
        Route::post('login', [App\Http\Controllers\Acl\PatientController::class, 'login']);
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
    Route::prefix('/city')->group(function () {
        Route::get('/list', [App\Http\Controllers\Core_Data\CityController::class, 'list_data']);
    });
    Route::prefix('/area')->group(function () {
        Route::get('/list', [App\Http\Controllers\Core_Data\AreaController::class, 'list_data']);
    });
    Route::prefix('/service_category')->group(function () {
        Route::get('/list', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'list_data']);
    });
    Route::prefix('/service')->group(function () {
        Route::get('/list', [App\Http\Controllers\Core_Data\ServiceController::class, 'list_data']);
    });
    Route::prefix('/specialty')->group(function () {
        Route::get('/list', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'list_data']);
    });
    Route::prefix('/medicine')->group(function () {
        Route::get('/search', [App\Http\Controllers\Core_Data\MedicineController::class, 'search']);
        Route::get('/show', [App\Http\Controllers\Core_Data\MedicineController::class, 'show']);
    });
    Route::prefix('/about_us')->group(function () {
        Route::get('/show', [App\Http\Controllers\Setting\AboutUsController::class, 'show_api']);
    });
    Route::prefix('/contact_us')->group(function () {
        Route::get('/show', [App\Http\Controllers\Setting\ContactUsController::class, 'show_api']);
    });
    Route::prefix('/privacy')->group(function () {
        Route::get('/show', [App\Http\Controllers\Setting\PrivacyController::class, 'show_api']);
    });
    Route::prefix('/setting')->group(function () {
        Route::get('/show', [App\Http\Controllers\Setting\SettingController::class, 'show_api']);
    });
    Route::prefix('/forgot_password')->group(function () {
        Route::post('check', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'check']);
        Route::post('validate_code', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'validate_code']);
        Route::post('change_password', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'change_password']);
    });
    Route::prefix('/call_us')->group(function () {
        Route::post('/store', [App\Http\Controllers\Setting\CallUsController::class, 'store']);
    });
    Route::prefix('/doctor')->group(function () {
        Route::get('/search_name', [App\Http\Controllers\Acl\DoctorController::class, 'search_name']);
        Route::get('/show', [App\Http\Controllers\Acl\DoctorController::class, 'show']);
    });
});