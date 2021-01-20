<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect('/admin');
});
Route::group(['middleware' => 'admin', 'auth','language'], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
        Route::prefix('/language')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\LanguageController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\LanguageController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\LanguageController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\LanguageController::class, 'change_many_status']);
            Route::post('/setLang', [App\Http\Controllers\Core_Data\LanguageController::class, 'language']);
        });
        Route::prefix('/setting')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\SettingController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Setting\SettingController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Setting\SettingController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\SettingController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\SettingController::class, 'update']);
        });
        Route::prefix('/privacy')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\PrivacyController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Setting\PrivacyController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Setting\PrivacyController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\PrivacyController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\PrivacyController::class, 'update']);
        });
        Route::prefix('/about_us')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\AboutUsController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Setting\AboutUsController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Setting\AboutUsController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\AboutUsController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\AboutUsController::class, 'update']);
        });
        Route::prefix('/contact_us')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\ContactUsController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Setting\ContactUsController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Setting\ContactUsController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\ContactUsController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\ContactUsController::class, 'update']);
        });
        Route::prefix('/country')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CountryController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\CountryController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\CountryController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CountryController::class, 'change_many_status']);
        });
        Route::prefix('/city')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CityController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\CityController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\CityController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CityController::class, 'change_many_status']);
            Route::get('/get_list_city_json', [App\Http\Controllers\Core_Data\CityController::class, 'Get_List_City_Json']);
        });
        Route::prefix('/area')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\AreaController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\AreaController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\AreaController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\AreaController::class, 'change_many_status']);
        });
        Route::prefix('/specialty')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'change_many_status']);
        });
        Route::prefix('/sub_specialty')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'change_many_status']);
        });
        Route::prefix('/company_insurance')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'change_many_status']);
        });
        Route::prefix('/scientific_degree')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'change_many_status']);
        });
        Route::prefix('/service_category')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'change_many_status']);
        });
        Route::prefix('/service')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ServiceController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\ServiceController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\ServiceController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ServiceController::class, 'change_many_status']);
        });
        Route::prefix('/product_category')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'change_many_status']);
        });
    });
});