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
Route::group(['middleware' => 'admin', 'auth', 'language', 'permission:dashboard-show'], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('permission:dashboard-show');
        Route::get('/error/403', [App\Http\Controllers\HomeController::class, 'error_403']);
        Route::prefix('/language')->middleware('permission:language-list')->group(function () {
             Route::get('/index', [App\Http\Controllers\Core_Data\LanguageController::class, 'index'])->middleware('permission:language-index');
             Route::get('/create', [App\Http\Controllers\Core_Data\LanguageController::class, 'create'])->middleware('permission:language-create');
             Route::Post('/store', [App\Http\Controllers\Core_Data\LanguageController::class, 'store'])->middleware('permission:language-create');
             Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'edit'])->middleware('permission:language-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'update'])->middleware('permission:language-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\LanguageController::class, 'change_status'])->middleware('permission:language-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\LanguageController::class, 'change_many_status'])->middleware('permission:language-many-status');
        });
        Route::prefix('/setting')->middleware('permission:setting-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\SettingController::class, 'index'])->middleware('permission:setting-index');
            Route::get('/create', [App\Http\Controllers\Setting\SettingController::class, 'create'])->middleware('permission:setting-create');
            Route::Post('/store', [App\Http\Controllers\Setting\SettingController::class, 'store'])->middleware('permission:setting-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\SettingController::class, 'edit'])->middleware('permission:setting-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\SettingController::class, 'update'])->middleware('permission:setting-edit');
        });
        Route::prefix('/privacy')->middleware('permission:privacy-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\PrivacyController::class, 'index'])->middleware('permission:privacy-index');
            Route::get('/create', [App\Http\Controllers\Setting\PrivacyController::class, 'create'])->middleware('permission:privacy-create');
            Route::Post('/store', [App\Http\Controllers\Setting\PrivacyController::class, 'store'])->middleware('permission:privacy-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\PrivacyController::class, 'edit'])->middleware('permission:privacy-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\PrivacyController::class, 'update'])->middleware('permission:privacy-edit');
        });
        Route::prefix('/about_us')->middleware('permission:about-us-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\AboutUsController::class, 'index'])->middleware('permission:about-us-index');
            Route::get('/create', [App\Http\Controllers\Setting\AboutUsController::class, 'create'])->middleware('permission:about-us-create');
            Route::Post('/store', [App\Http\Controllers\Setting\AboutUsController::class, 'store'])->middleware('permission:about-us-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\AboutUsController::class, 'edit'])->middleware('permission:about-us-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\AboutUsController::class, 'update'])->middleware('permission:about-us-edit');
        });
        Route::prefix('/contact_us')->middleware('permission:contact-us-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Setting\ContactUsController::class, 'index'])->middleware('permission:contact-us-index');
            Route::get('/create', [App\Http\Controllers\Setting\ContactUsController::class, 'create'])->middleware('permission:contact-us-create');
            Route::Post('/store', [App\Http\Controllers\Setting\ContactUsController::class, 'store'])->middleware('permission:contact-us-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Setting\ContactUsController::class, 'edit'])->middleware('permission:contact-us-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Setting\ContactUsController::class, 'update'])->middleware('permission:contact-us-edit');
        });
        Route::prefix('/country')->middleware('permission:country-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CountryController::class, 'index'])->middleware('permission:country-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\CountryController::class, 'create'])->middleware('permission:country-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\CountryController::class, 'store'])->middleware('permission:country-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'edit'])->middleware('permission:country-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'update'])->middleware('permission:country-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CountryController::class, 'change_status'])->middleware('permission:country-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CountryController::class, 'change_many_status'])->middleware('permission:country-many-status');
        });
        Route::prefix('/city')->middleware('permission:city-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CityController::class, 'index'])->middleware('permission:city-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\CityController::class, 'create'])->middleware('permission:city-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\CityController::class, 'store'])->middleware('permission:city-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'edit'])->middleware('permission:city-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'update'])->middleware('permission:city-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CityController::class, 'change_status'])->middleware('permission:city-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CityController::class, 'change_many_status'])->middleware('permission:city-many-status');
            Route::get('/get_list_city_json/{country}', [App\Http\Controllers\Core_Data\CityController::class, 'Get_List_City_Json']);
        });
        Route::prefix('/area')->middleware('permission:area-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\AreaController::class, 'index'])->middleware('permission:area-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\AreaController::class, 'create'])->middleware('permission:area-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\AreaController::class, 'store'])->middleware('permission:area-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'edit'])->middleware('permission:area-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'update'])->middleware('permission:area-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\AreaController::class, 'change_status'])->middleware('permission:area-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\AreaController::class, 'change_many_status'])->middleware('permission:city-many-status');
        });
        Route::prefix('/specialty')->middleware('permission:specialty-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'index'])->middleware('permission:specialty-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'create'])->middleware('permission:specialty-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'store'])->middleware('permission:specialty-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'edit'])->middleware('permission:specialty-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'update'])->middleware('permission:specialty-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'change_status'])->middleware('permission:specialty-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\SpecialtyController::class, 'change_many_status'])->middleware('permission:specialty-many-status');
        });
        Route::prefix('/sub_specialty')->group(function () {
        Route::middleware('permission:sub-specialty-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'index'])->middleware('permission:sub-specialty-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'create'])->middleware('permission:sub-specialty-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'store'])->middleware('permission:sub-specialty-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'edit'])->middleware('permission:sub-specialty-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'update'])->middleware('permission:sub-specialty-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'change_status'])->middleware('permission:sub-specialty-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'change_many_status'])->middleware('permission:sub-specialty-many-status');
        });
            Route::get('/get_list_sub_specialty_json/{specialty}', [App\Http\Controllers\Core_Data\SubSpecialtyController::class, 'Get_List_Sub_Specialty_Json']);
        });
        Route::prefix('/company_insurance')->middleware('permission:company-insurance-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'index'])->middleware('permission:company-insurance-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'create'])->middleware('permission:company-insurance-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'store'])->middleware('permission:company-insurance-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'edit'])->middleware('permission:company-insurance-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'update'])->middleware('permission:company-insurance-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'change_status'])->middleware('permission:company-insurance-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\CompanyInsuranceController::class, 'change_many_status'])->middleware('permission:company-insurance-many-status');
        });
        Route::prefix('/scientific_degree')->middleware('permission:scientific-degree-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'index'])->middleware('permission:scientific-degree-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'create'])->middleware('permission:scientific-degree-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'store'])->middleware('permission:scientific-degree-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'edit'])->middleware('permission:scientific-degree-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'update'])->middleware('permission:scientific-degree-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'change_status'])->middleware('permission:scientific-degree-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ScientificDegreeController::class, 'change_many_status'])->middleware('permission:scientific-degree-many-status');
        });
        Route::prefix('/service_category')->middleware('permission:service-category-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'index'])->middleware('permission:service-category-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'create'])->middleware('permission:service-category-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'store'])->middleware('permission:service-category-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'edit'])->middleware('permission:service-category-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'update'])->middleware('permission:service-category-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'change_status'])->middleware('permission:service-category-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ServiceCategoryController::class, 'change_many_status'])->middleware('permission:service-category-many-status');
        });
        Route::prefix('/service')->middleware('permission:service-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ServiceController::class, 'index'])->middleware('permission:service-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\ServiceController::class, 'create'])->middleware('permission:service-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\ServiceController::class, 'store'])->middleware('permission:service-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'edit'])->middleware('permission:service-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'update'])->middleware('permission:service-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ServiceController::class, 'change_status'])->middleware('permission:service-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ServiceController::class, 'change_many_status'])->middleware('permission:service-many-status');
        });
        Route::prefix('/product_category')->middleware('permission:product-category-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'index'])->middleware('permission:product-category-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'create'])->middleware('permission:product-category-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'store'])->middleware('permission:product-category-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'edit'])->middleware('permission:product-category-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'update'])->middleware('permission:product-category-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'change_status'])->middleware('permission:product-category-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ProductCategoryController::class, 'change_many_status'])->middleware('permission:product-category-many-status');
        });
        Route::prefix('/product')->middleware('permission:product-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\ProductController::class, 'index'])->middleware('permission:product-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\ProductController::class, 'create'])->middleware('permission:product-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\ProductController::class, 'store'])->middleware('permission:product-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\ProductController::class, 'edit'])->middleware('permission:product-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\ProductController::class, 'update'])->middleware('permission:product-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\ProductController::class, 'change_status'])->middleware('permission:product-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\ProductController::class, 'change_many_status'])->middleware('permission:product-many-status');
        });
        Route::prefix('/medicine_category')->middleware('permission:medicine-category-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'index'])->middleware('permission:medicine-category-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'create'])->middleware('permission:medicine-category-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'store'])->middleware('permission:medicine-category-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'edit'])->middleware('permission:medicine-category-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'update'])->middleware('permission:medicine-category-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'change_status'])->middleware('permission:medicine-category-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\MedicineCategoryController::class, 'change_many_status'])->middleware('permission:medicine-category-many-status');
        });
        Route::prefix('/medicine')->middleware('permission:medicine-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Core_Data\MedicineController::class, 'index'])->middleware('permission:medicine-index');
            Route::get('/create', [App\Http\Controllers\Core_Data\MedicineController::class, 'create'])->middleware('permission:medicine-create');
            Route::Post('/store', [App\Http\Controllers\Core_Data\MedicineController::class, 'store'])->middleware('permission:medicine-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Core_Data\MedicineController::class, 'edit'])->middleware('permission:medicine-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Core_Data\MedicineController::class, 'update'])->middleware('permission:medicine-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Core_Data\MedicineController::class, 'change_status'])->middleware('permission:medicine-status');
            Route::get('/change_many_status', [App\Http\Controllers\Core_Data\MedicineController::class, 'change_many_status'])->middleware('permission:medicine-many-status');
        });
        Route::prefix('/permission')->middleware('permission:permission-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\PermissionController::class, 'index'])->middleware('permission:permission-index');
            Route::get('/create', [App\Http\Controllers\Acl\PermissionController::class, 'create'])->middleware('permission:permission-create');
            Route::Post('/store', [App\Http\Controllers\Acl\PermissionController::class, 'store'])->middleware('permission:permission-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Acl\PermissionController::class, 'edit'])->middleware('permission:permission-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Acl\PermissionController::class, 'update'])->middleware('permission:permission-edit');
        });
        Route::prefix('/role')->middleware('permission:role-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\RoleController::class, 'index'])->middleware('permission:role-index');
            Route::get('/create', [App\Http\Controllers\Acl\RoleController::class, 'create'])->middleware('permission:role-create');
            Route::Post('/store', [App\Http\Controllers\Acl\RoleController::class, 'store'])->middleware('permission:role-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Acl\RoleController::class, 'edit'])->middleware('permission:role-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Acl\RoleController::class, 'update'])->middleware('permission:role-edit');
        });
        Route::prefix('/user')->middleware('permission:user-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\UserController::class, 'index'])->middleware('permission:user-index');
            Route::get('/create', [App\Http\Controllers\Acl\UserController::class, 'create'])->middleware('permission:user-create');
            Route::get('/edit/{id}', [App\Http\Controllers\Acl\UserController::class, 'edit'])->middleware('permission:user-edit');
            Route::patch('/update/{id}', [App\Http\Controllers\Acl\UserController::class, 'update'])->middleware('permission:user-edit');
            Route::get('/change_status/{id}', [App\Http\Controllers\Acl\UserController::class, 'change_status'])->middleware('permission:user-status');
            Route::get('/change_many_status', [App\Http\Controllers\Acl\UserController::class, 'change_many_status'])->middleware('permission:user-many-status');
            Route::get('/resat_password/{id}', [App\Http\Controllers\Acl\UserController::class, 'resat_password'])->middleware('permission:user-password');
            Route::get('/password', [App\Http\Controllers\Acl\UserController::class, 'password'])->middleware('permission:user-list');
            Route::patch('/change_password/{id}', [App\Http\Controllers\Acl\UserController::class, 'change_password']);
        });
        Route::prefix('/patient')->middleware('permission:patient-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\PatientController::class, 'index'])->middleware('permission:patient-index');
            Route::get('/change_status/{id}', [App\Http\Controllers\Acl\PatientController::class, 'change_status'])->middleware('permission:patient-status');
            Route::get('/change_many_status', [App\Http\Controllers\Acl\PatientController::class, 'change_many_status'])->middleware('permission:patient-many-status');
        });
        Route::prefix('/doctor')->group(function () {
            Route::middleware('permission:doctor-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\DoctorController::class, 'index'])->middleware('permission:doctor-index');
            Route::get('/index_request', [App\Http\Controllers\Acl\DoctorController::class, 'index_request'])->middleware('permission:doctor-index-request');
            Route::get('/show_request/{id}', [App\Http\Controllers\Acl\DoctorController::class, 'show_request'])->middleware('permission:doctor-show-request');
            Route::get('/change_status/{id}', [App\Http\Controllers\Acl\DoctorController::class, 'change_status'])->middleware('permission:doctor-status');
            Route::get('/change_many_status', [App\Http\Controllers\Acl\DoctorController::class, 'change_many_status'])->middleware('permission:doctor-many-stauts');
            Route::get('/change_status_request/{id}', [App\Http\Controllers\Acl\DoctorController::class, 'change_status_request'])->middleware('permission:doctor-status-request');
            });
            Route::middleware('permission:doctor-list-information')->group(function () {
                Route::get('/create', [App\Http\Controllers\Acl\DoctorController::class, 'create'])->middleware('permission:doctor-create');
                Route::Post('/store', [App\Http\Controllers\Acl\DoctorController::class, 'store'])->middleware('permission:doctor-create');
                Route::get('/edit/{id}', [App\Http\Controllers\Acl\DoctorController::class, 'edit'])->middleware('permission:doctor-edit');
                Route::patch('/update/{id}', [App\Http\Controllers\Acl\DoctorController::class, 'update'])->middleware('permission:doctor-edit');
            });
        });
        Route::prefix('/clinic')->group(function () {
            Route::middleware('permission:doctor-list')->group(function () {
            Route::get('/index', [App\Http\Controllers\Acl\ClinicController::class, 'index'])->middleware('permission:clinic-index');
            Route::get('/index_request', [App\Http\Controllers\Acl\ClinicController::class, 'index_request'])->middleware('permission:clinic-index-request');
            Route::get('/show_request/{id}', [App\Http\Controllers\Acl\ClinicController::class, 'show_request'])->middleware('permission:clinic-show-request');
            Route::get('/change_status/{id}', [App\Http\Controllers\Acl\ClinicController::class, 'change_status'])->middleware('permission:clinic-status');
            Route::get('/change_many_status', [App\Http\Controllers\Acl\ClinicController::class, 'change_many_status'])->middleware('permission:clinic-many-stauts');
            Route::get('/change_status_request/{id}', [App\Http\Controllers\Acl\ClinicController::class, 'change_status_request'])->middleware('permission:clinic-status-request');
            });
            Route::middleware('permission:clinic-list-information')->group(function () {
                Route::get('/create', [App\Http\Controllers\Acl\ClinicController::class, 'create'])->middleware('permission:clinic-create');
                Route::Post('/store', [App\Http\Controllers\Acl\ClinicController::class, 'store'])->middleware('permission:clinic-create');
                Route::get('/edit/{id}', [App\Http\Controllers\Acl\ClinicController::class, 'edit'])->middleware('permission:clinic-edit');
                Route::patch('/update/{id}', [App\Http\Controllers\Acl\ClinicController::class, 'update'])->middleware('permission:clinic-edit');
            });
        });
        Route::prefix('/call_us')->middleware('permission:call-us-index')->group(function () {
            Route::get('/read', [App\Http\Controllers\Setting\CallUsController::class, 'read'])->middleware('permission:call-us-read');
            Route::get('/unread', [App\Http\Controllers\Setting\CallUsController::class, 'unread'])->middleware('permission:call-us-unread');
            Route::get('/change_status/{id}', [App\Http\Controllers\Setting\CallUsController::class, 'change_status'])->middleware('permission:call-us-status');
            Route::get('/change_many_status', [App\Http\Controllers\Setting\CallUsController::class, 'change_many_status'])->middleware('permission:call-us-many-status');
            Route::get('/delete/{id}', [App\Http\Controllers\Setting\CallUsController::class, 'delete'])->middleware('permission:call-us-delete');
        });
    });
});
Route::group(['middleware' => 'language'], function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/language')->group(function () {
            Route::post('/setLang', [App\Http\Controllers\Core_Data\LanguageController::class, 'language']);
        });
        Route::prefix('/user')->group(function () {
            Route::Post('/store', [App\Http\Controllers\Acl\UserController::class, 'store']);
        });
    });
    Route::prefix('/forgot_password')->group(function () {
        Route::get('/', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'index']);
        Route::get('/check', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'check']);
        Route::get('/validate_code', [App\Http\Controllers\Acl\ForgotPasswordController::class, 'validate_code']);
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', [App\Http\Controllers\Acl\UserController::class, 'register']);
    });
    Route::prefix('/about_us')->group(function () {
        Route::get('/', [App\Http\Controllers\Setting\AboutUsController::class, 'show']);
    });
});