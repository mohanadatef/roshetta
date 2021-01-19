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
    });
});