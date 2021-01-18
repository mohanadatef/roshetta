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
            Route::get('/index', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'create']);
            Route::Post('/store', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'store']);
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'edit']);
            Route::patch('/update/{id}', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'update']);
            Route::get('/change_status/{id}', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'change_status']);
            Route::get('/change_many_status', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'change_many_status']);
            Route::post('/setLang', [App\Http\Controllers\Admin\Core_Data\LanguageController::class, 'language']);
        });

    });
});