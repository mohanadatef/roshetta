<?php

namespace Database\Seeders;

use App\Models\ACL\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
            //dashboard
            [
                'title' => 'dashboard-show',
                'display_title' => ['en' => 'dashboard show', 'ar' => 'عرض لوحه التحكم'],
            ],
            //acl
            [
                'title' => 'acl-list',
                'display_title' =>['en' => 'acl list', 'ar' => 'قائمه الامان'],
            ],
            //user
            [
                'title' => 'user-list',
                'display_title' => ['en' => 'user list', 'ar' => 'قائمه اذنات المستخدمين']
            ],
            [
                'title' => 'user-index',
                'display_title' => ['en' => 'index user', 'ar' => 'قائمه المستخدمين'],
            ],
            [
                'title' => 'user-create',
                'display_title' => ['en' => 'create user', 'ar' => 'اضافه المستخدم'],
            ],
            [
                'title' => 'user-edit',
                'display_title' => ['en' =>'edit user', 'ar' => 'تعديل المستخدم'],
            ],
            [
                'title' => 'user-password',
                'display_title' => ['en' => 'password user', 'ar' => 'تغير كلمه السر المستخدم'],
            ],
            [
                'title' => 'user-status',
                'display_title' => ['en' => 'user status', 'ar' => 'تغير حاله المستخدم'],
            ],
            [
                'title' => 'user-many-status',
                'display_title' => ['en' =>'user many status', 'ar' => 'تغير حاله المستخدمين'],
            ],
            //role
            [
                'title' => 'role-list',
                'display_title' => ['en' => 'list role', 'ar' => 'قائمه اذنات صلحيات'],
            ],
            [
                'title' => 'role-index',
                'display_title' => ['en' => 'index role', 'ar' => 'قائمه صلحيات'],
            ],
            [
                'title' => 'role-create',
                'display_title' =>['en' => 'create role', 'ar' => 'اضافه صلحيات'] ,
            ],
            [
                'title' => 'role-edit',
                'display_title' =>['en' => 'edit role', 'ar' => 'تعديل صلحيات'] ,
            ],
            //permission
            [
                'title' => 'permission-list',
                'display_title' =>['en' => 'permission list', 'ar' => 'قائمه اذنات اذنات'] ,
            ],
            [
                'title' => 'permission-index',
                'display_title' =>['en' =>  'permission index', 'ar' => 'قائمه اذنات'],
            ],
            [
                'title' => 'permission-create',
                'display_title' =>['en' => 'permission create', 'ar' => 'اضافه اذنات'] ,
            ],
            [
                'title' => 'permission-edit',
                'display_title' =>['en' => 'edit permission', 'ar' => 'تعديل اذنات'] ,
            ],
            //setting
            [
                'title' => 'setting-list',
                'display_title' =>['en' => 'setting list', 'ar' => 'قائمه اذنات الاعدادات'] ,
            ],
            [
                'title' => 'setting-index',
                'display_title' =>['en' => 'setting index', 'ar' => 'قائمه الاعدادات'] ,
            ],
            [
                'title' => 'setting-create',
                'display_title' =>['en' =>  'create setting', 'ar' => 'اضافه الاعدادات'],
            ],
            [
                'title' => 'setting-edit',
                'display_title' =>['en' =>'edit setting', 'ar' => 'تعديل الاعدادات'] ,
            ],
            //about us
            [
                'title' => 'about-us-list',
                'display_title' =>['en' => 'about us list', 'ar' => 'قائمه اذنات عن الشركه'] ,
            ],
            [
                'title' => 'about-us-index',
                'display_title' =>['en' => 'about us index', 'ar' => 'قائمه عن الشركه'] ,
            ],
            [
                'title' => 'about-us-create',
                'display_title' =>['en' => 'create about us', 'ar' => 'اضافه عن الشركه'] ,
            ],
            [
                'title' => 'about-us-edit',
                'display_title' =>['en' => 'edit about us', 'ar' => 'تعديل عن الشركه'] ,
            ],
            //contact us
            [
                'title' => 'contact-us-list',
                'display_title' =>['en' => 'contact us list', 'ar' => 'قائمه اذنات تواصل معانا'] ,
            ],
            [
                'title' => 'contact-us-index',
                'display_title' =>['en' => 'contact us index', 'ar' => 'قائمه تواصل معانا'] ,
            ],
            [
                'title' => 'contact-us-create',
                'display_title' =>['en' => 'create contact us', 'ar' => 'اضافه تواصل معانا'] ,
            ],
            [
                'title' => 'contact-us-edit',
                'display_title' =>['en' => 'edit about us', 'ar' => 'تعديل تواصل معانا'] ,
            ],
            //privacy
            [
                'title' => 'privacy-list',
                'display_title' =>['en' => 'privacy list', 'ar' => 'قائمه اذنات السياسه و الشروط'] ,
            ],
            [
                'title' => 'privacy-index',
                'display_title' =>['en' => 'privacy index', 'ar' => 'قائمه السياسه و الشروط'] ,
            ],
            [
                'title' => 'privacy-create',
                'display_title' =>['en' => 'create privacy', 'ar' => 'اضافه السياسه و الشروط'] ,
            ],
            [
                'title' => 'privacy-edit',
                'display_title' =>['en' => 'edit privacy', 'ar' => 'تعديل السياسه و الشروط'] ,
            ],
            //call us
            [
                'title' => 'call-us-list',
                'display_title' =>['en' => 'call us list', 'ar' => 'قائمه اذنات رسائل التواصل'] ,
            ],
            [
                'title' => 'call-us-read',
                'display_title' =>['en' => 'call us read', 'ar' => 'قائمه المقروةء رسائل التواصل'] ,
            ],
            [
                'title' => 'call-us-unread',
                'display_title' =>['en' => 'call us unread', 'ar' => 'قائمه الغير المقروةء رسائل التواصل'] ,
            ],
            [
                'title' => 'call-us-status',
                'display_title' =>['en' => 'call us status', 'ar' => 'تغير حاله رساله التواصل'] ,
            ],
            [
                'title' => 'call-us-delete',
                'display_title' =>['en' => 'call us delete', 'ar' => 'مسح رساله التواصل'] ,
            ],
            [
                'title' => 'call-us-many-status',
                'display_title' =>['en' => 'call us status many', 'ar' => 'تغير حاله رسائل التواصل'] ,
            ],
            //core data
            [
                'title' => 'core-data-list',
                'display_title' =>['en' => 'core-data list', 'ar' => 'قائمه اذنات البيانات الاساسيه'] ,
            ],
            //area
            [
                'title' => 'area-list',
                'display_title' =>['en' => 'area list', 'ar' => 'قائمه اذنات المنطقه'] ,
            ],
            [
                'title' => 'area-index',
                'display_title' =>['en' => 'index area', 'ar' => 'قائمه المنطقه'] ,
            ],
            [
                'title' => 'area-create',
                'display_title' =>['en' => 'create area', 'ar' => 'اضافه المنطقه'] ,
            ],
            [
                'title' => 'area-edit',
                'display_title' =>['en' => 'edit area', 'ar' => 'تعديل المنطقه'] ,
            ],
            [
                'title' => 'area-status',
                'display_title' =>['en' =>  'status area', 'ar' => 'تغير حاله المنطقه'],
            ],
            [
                'title' => 'area-many-status',
                'display_title' =>['en' => 'status many area', 'ar' => 'تغير حاله المناطق'] ,
            ],
            //city
            [
                'title' => 'city-list',
                'display_title' =>['en' =>  'city list', 'ar' => 'قائمه اذنات المدينه'],
            ],
            [
                'title' => 'city-index',
                'display_title' =>['en' =>'index city', 'ar' => 'قائمه المدينه'] ,
            ],
            [
                'title' => 'city-create',
                'display_title' =>['en' =>  'create city', 'ar' => 'اضافه المدينه'],
            ],
            [
                'title' => 'city-edit',
                'display_title' =>['en' =>  'edit city', 'ar' => 'تعديل المدينه'],
            ],
            [
                'title' => 'city-status',
                'display_title' =>['en' => 'status city', 'ar' => 'تغير حاله المدينه'] ,
            ],
            [
                'title' => 'city-many-status',
                'display_title' =>['en' => 'status many city', 'ar' => 'تغير حاله المدن'] ,
            ],
            //company-insurance
            [
                'title' => 'company-insurance-list',
                'display_title' =>['en' => 'company insurance list', 'ar' => 'قائمه اذنات شركه التامين'] ,
            ],
            [
                'title' => 'company-insurance-index',
                'display_title' =>['en' =>  'index company insurance', 'ar' => 'قائمه شركه التامين'],
            ],
            [
                'title' => 'company-insurance-create',
                'display_title' =>['en' => 'create company insurance', 'ar' => 'اضافه شركه التامين'] ,
            ],
            [
                'title' => 'company-insurance-edit',
                'display_title' =>['en' => 'edit company insurance', 'ar' => 'تعديل شركه التامين'] ,
            ],
            [
                'title' => 'company-insurance-status',
                'display_title' =>['en' => 'status company insurance', 'ar' => 'تغير حاله شركه التامين'] ,
            ],
            [
                'title' => 'company-insurance-many-status',
                'display_title' =>['en' => 'status many company insurance', 'ar' => 'تغير حاله شركات التامين'] ,
            ],
            //country
            [
                'title' => 'country-list',
                'display_title' =>['en' => 'country list', 'ar' => 'قائمه اذنات البلد'] ,
            ],
            [
                'title' => 'country-index',
                'display_title' =>['en' => 'index country', 'ar' => 'قائمه البلد'] ,
            ],
            [
                'title' => 'country-create',
                'display_title' =>['en' =>  'create country', 'ar' => 'اضافه البلد'],
            ],
            [
                'title' => 'country-edit',
                'display_title' =>['en' => 'edit country', 'ar' => 'تعديل البلد'] ,
            ],
            [
                'title' => 'country-status',
                'display_title' =>['en' => 'status country', 'ar' => 'تغير حاله البلد'] ,
            ],
            [
                'title' => 'country-many-status',
                'display_title' =>['en' => 'status many country', 'ar' => 'تغير حاله البلاد'] ,
            ],
            //language
            [
                'title' => 'language-list',
                'display_title' =>['en' => 'language list', 'ar' => 'قائمه اذنات اللغه'] ,
            ],
            [
                'title' => 'language-index',
                'display_title' =>['en' => 'index language', 'ar' => 'قائمه اللغه'] ,
            ],
            [
                'title' => 'language-create',
                'display_title' =>['en' => 'create language', 'ar' => 'اضافه اللغه'] ,
            ],
            [
                'title' => 'language-edit',
                'display_title' =>['en' => 'edit language', 'ar' => 'تعديل اللغه'] ,
            ],
            [
                'title' => 'language-status',
                'display_title' =>['en' => 'status language', 'ar' => 'تغير حاله اللغه'] ,
            ],
            [
                'title' => 'language-many-status',
                'display_title' =>['en' => 'status many language', 'ar' => 'تغير حاله اللغات'] ,
            ],
            //medicine
            [
                'title' => 'medicine-list',
                'display_title' =>['en' => 'medicine list', 'ar' => 'قائمه اذنات الدواء'] ,
            ],
            [
                'title' => 'medicine-index',
                'display_title' =>['en' => 'index medicine', 'ar' => 'قائمه الدواء'] ,
            ],
            [
                'title' => 'medicine-create',
                'display_title' =>['en' => 'create medicine', 'ar' => 'اضافه الدواء'] ,
            ],
            [
                'title' => 'medicine-edit',
                'display_title' =>['en' => 'edit medicine', 'ar' => 'تعديل الدواء'] ,
            ],
            [
                'title' => 'medicine-status',
                'display_title' =>['en' => 'status medicine', 'ar' => 'تغير حاله الدواء'] ,
            ],
            [
                'title' => 'medicine-many-status',
                'display_title' =>['en' => 'status many medicine', 'ar' => 'تغير حاله الادويه'] ,
            ],
            //medicine-category
            [
                'title' => 'medicine-category-list',
                'display_title' =>['en' => 'medicine category list', 'ar' => 'قائمه اذنات تخصص الدواء'] ,
            ],
            [
                'title' => 'medicine-category-index',
                'display_title' =>['en' => 'index medicine category', 'ar' => 'قائمه تخصص الدواء'] ,
            ],
            [
                'title' => 'medicine-category-create',
                'display_title' =>['en' => 'create medicine category', 'ar' => 'اضافه تخصص الدواء'] ,
            ],
            [
                'title' => 'medicine-category-edit',
                'display_title' =>['en' => 'edit medicine category', 'ar' => 'تعديل تخصص الدواء'] ,
            ],
            [
                'title' => 'medicine-category-status',
                'display_title' =>['en' => 'status medicine category', 'ar' => 'تغير حاله  تخصص الدواء'] ,
            ],
            [
                'title' => 'medicine-category-many-status',
                'display_title' =>['en' => 'status many medicine category', 'ar' => 'تغير حاله تخصص الادويه'] ,
            ],
            //product
            [
                'title' => 'product-list',
                'display_title' =>['en' => 'product list', 'ar' => 'قائمه اذنات المنتج'] ,
            ],
            [
                'title' => 'product-index',
                'display_title' =>['en' => 'index product', 'ar' => 'قائمه المنتج'] ,
            ],
            [
                'title' => 'product-create',
                'display_title' =>['en' => 'create product', 'ar' => 'اضافه المنتج'] ,
            ],
            [
                'title' => 'product-edit',
                'display_title' =>['en' => 'edit product', 'ar' => 'تعديل المنتج'] ,
            ],
            [
                'title' => 'product-status',
                'display_title' =>['en' => 'status product', 'ar' => 'تغير حاله المنتج'] ,
            ],
            [
                'title' => 'product-many-status',
                'display_title' =>['en' => 'status many product', 'ar' => 'تغير حاله المنتحات'] ,
            ],
            //product-category
            [
                'title' => 'product-category-list',
                'display_title' =>['en' => 'product category list', 'ar' => 'قائمه اذنات تخصص المنتج'] ,
            ],
            [
                'title' => 'product-category-index',
                'display_title' =>['en' => 'index product category', 'ar' => 'قائمه تخصص المنتج'] ,
            ],
            [
                'title' => 'product-category-create',
                'display_title' =>['en' => 'create product category', 'ar' => 'اضافه تخصص المنتج'] ,
            ],
            [
                'title' => 'product-category-edit',
                'display_title' =>['en' => 'edit product category', 'ar' => 'تعديل تخصص المنتج'] ,
            ],
            [
                'title' => 'product-category-status',
                'display_title' =>['en' => 'status product category', 'ar' => 'تغير حاله تخصص المنتج'] ,
            ],
            [
                'title' => 'product-category-many-status',
                'display_title' =>['en' => 'status many product category', 'ar' => 'تغير حاله تخصص المنتجات'] ,
            ],
            //scientific-degree
            [
                'title' => 'scientific-degree-list',
                'display_title' =>['en' => 'scientific degree list', 'ar' => 'قائمه اذنات الدرجه علميه'] ,
            ],
            [
                'title' => 'scientific-degree-index',
                'display_title' =>['en' => 'index scientific degree', 'ar' => 'قائمه الدرجه علميه'] ,
            ],
            [
                'title' => 'scientific-degree-create',
                'display_title' =>['en' => 'create scientific degree', 'ar' => 'اضافه الدرجه علميه'] ,
            ],
            [
                'title' => 'scientific-degree-edit',
                'display_title' =>['en' => 'edit scientific degree', 'ar' => 'تعديل الدرجه علميه'] ,
            ],
            [
                'title' => 'scientific-degree-status',
                'display_title' =>['en' => 'status scientific degree', 'ar' => 'تغير حاله الدرجه علميه'] ,
            ],
            [
                'title' => 'scientific-degree-many-status',
                'display_title' =>['en' =>  'status many scientific-degree', 'ar' => 'تغير حاله الدرجات علميه'],
            ],
            //service
            [
                'title' => 'service-list',
                'display_title' =>['en' => 'service list', 'ar' => 'قائمه اذنات خدمه'] ,
            ],
            [
                'title' => 'service-index',
                'display_title' =>['en' => 'index service', 'ar' => 'قائمه خدمه'] ,
            ],
            [
                'title' => 'service-create',
                'display_title' =>['en' => 'create service', 'ar' => 'اضافه خدمه'] ,
            ],
            [
                'title' => 'service-edit',
                'display_title' =>['en' => 'edit service', 'ar' => 'تعديل خدمه'] ,
            ],
            [
                'title' => 'service-status',
                'display_title' =>['en' => 'status service', 'ar' => 'تغير حاله خدمه'] ,
            ],
            [
                'title' => 'service-many-status',
                'display_title' =>['en' => 'status many service', 'ar' => 'تغير حاله الخدمات'] ,
            ],
            //service-category
            [
                'title' => 'service-category-list',
                'display_title' =>['en' =>  'service-category list', 'ar' => 'قائمه اذنات تخصص خدمه'],
            ],
            [
                'title' => 'service-category-index',
                'display_title' =>['en' => 'index service category', 'ar' => 'قائمه تخصص خدمه'] ,
            ],
            [
                'title' => 'service-category-create',
                'display_title' =>['en' => 'create service category', 'ar' => 'اضافه تخصص خدمه'] ,
            ],
            [
                'title' => 'service-category-edit',
                'display_title' =>['en' => 'edit service category', 'ar' => 'تعديل تخصص خدمه'] ,
            ],
            [
                'title' => 'service-category-status',
                'display_title' =>['en' => 'status service category', 'ar' => 'تغير حاله تخصص خدمه'] ,
            ],
            [
                'title' => 'service-category-many-status',
                'display_title' =>['en' => 'status many service category', 'ar' => 'تغير حاله تخصص خدمات'] ,
            ],
            //specialty
            [
                'title' => 'specialty-list',
                'display_title' =>['en' => 'specialty list', 'ar' => 'قائمه اذنات تخصص'] ,
            ],
            [
                'title' => 'specialty-index',
                'display_title' =>['en' => 'index specialty', 'ar' => 'قائمه تخصص'] ,
            ],
            [
                'title' => 'specialty-create',
                'display_title' =>['en' => 'create specialty', 'ar' => 'اضافه تخصص'] ,
            ],
            [
                'title' => 'specialty-edit',
                'display_title' =>['en' => 'edit specialty', 'ar' => 'تعديل تخصص'] ,
            ],
            [
                'title' => 'specialty-status',
                'display_title' =>['en' => 'status specialty', 'ar' => 'تغير حاله تخصص'] ,
            ],
            [
                'title' => 'specialty-many-status',
                'display_title' =>['en' => 'status many specialty', 'ar' => 'تغير حاله التخصصات'] ,
            ],
            //sub-specialty
            [
                'title' => 'sub-specialty-list',
                'display_title' =>['en' => 'sub specialty list', 'ar' => 'قائمه اذنات تخصص التخصص'] ,
            ],
            [
                'title' => 'sub-specialty-index',
                'display_title' =>['en' => 'index sub specialty', 'ar' => 'قائمه تخصص التخصص'] ,
            ],
            [
                'title' => 'sub-specialty-create',
                'display_title' =>['en' => 'create sub specialty', 'ar' => 'اضافه تخصص التخصص'] ,
            ],
            [
                'title' => 'sub-specialty-edit',
                'display_title' =>['en' => 'edit sub specialty', 'ar' => 'تعديل تخصص التخصص'] ,
            ],
            [
                'title' => 'sub-specialty-status',
                'display_title' =>['en' => 'status sub specialty', 'ar' => 'تغير حاله تخصص التخصص'] ,
            ],
            [
                'title' => 'sub-specialty-many-status',
                'display_title' =>['en' => 'status many sub specialty', 'ar' => 'تغير حاله تخصص التخصصات'] ,
            ],
            //patient
            [
                'title' => 'patient-list',
                'display_title' => ['en' => 'patient list', 'ar' => 'قائمه اذنات المرضاء']
            ],
            [
                'title' => 'patient-index',
                'display_title' => ['en' => 'index patient', 'ar' => 'قائمه المرضاء'],
            ],
            [
                'title' => 'patient-status',
                'display_title' => ['en' => 'patient status', 'ar' => 'تغير حاله مرضي'],
            ],
            [
                'title' => 'patient-many-status',
                'display_title' => ['en' =>'patient many status', 'ar' => 'تغير حاله المرضاء'],
            ],
            //doctor
            [
                'title' => 'doctor-list',
                'display_title' => ['en' => 'doctor list', 'ar' => 'قائمه اذنات دكتور']
            ],
            [
                'title' => 'doctor-index',
                'display_title' => ['en' => 'index doctor', 'ar' => 'قائمه دكتور'],
            ],
            [
                'title' => 'doctor-index-request',
                'display_title' => ['en' => 'index doctor request', 'ar' => 'قائمه دكتور فى طلب'],
            ],
            [
                'title' => 'doctor-status',
                'display_title' => ['en' => 'doctor status', 'ar' => 'تغير حاله دكتور'],
            ],
            [
                'title' => 'doctor-many-status',
                'display_title' => ['en' =>'doctor many status', 'ar' => 'تغير اكثر حاله دكتور'],
            ],
            [
                'title' => 'doctor-status-request',
                'display_title' => ['en' => 'doctor status request', 'ar' => 'تغير حاله دكتور فى الطلب'],
            ],
            [
                'title' => 'doctor-list-information',
                'display_title' => ['en' => 'doctor list information', 'ar' => 'قائمه بيانات دكتور']
            ],
            [
                'title' => 'doctor-create',
                'display_title' =>['en' => 'create doctor', 'ar' => 'اضافه دكتور'] ,
            ],
            [
                'title' => 'doctor-edit',
                'display_title' =>['en' => 'edit doctor', 'ar' => 'تعديل دكتور'] ,
            ],
            [
                'title' => 'doctor-show-request',
                'display_title' =>['en' => 'doctor show request', 'ar' => 'مشاهده طلب دكتور'] ,
            ],
            //clinic
            [
                'title' => 'clinic-list',
                'display_title' => ['en' => 'clinic list', 'ar' => 'قائمه اذنات عياده']
            ],
            [
                'title' => 'clinic-index',
                'display_title' => ['en' => 'index clinic', 'ar' => 'قائمه عياده'],
            ],
            [
                'title' => 'clinic-index-request',
                'display_title' => ['en' => 'index clinic request', 'ar' => 'قائمه عياده فى طلب'],
            ],
            [
                'title' => 'clinic-status',
                'display_title' => ['en' => 'clinic status', 'ar' => 'تغير حاله عياده'],
            ],
            [
                'title' => 'clinic-many-status',
                'display_title' => ['en' =>'clinic many status', 'ar' => 'تغير اكثر حاله عياده'],
            ],
            [
                'title' => 'clinic-status-request',
                'display_title' => ['en' => 'clinic status request', 'ar' => 'تغير حاله عياده فى الطلب'],
            ],
            [
                'title' => 'clinic-list-information',
                'display_title' => ['en' => 'clinic list information', 'ar' => 'قائمه بيانات عياده']
            ],
            [
                'title' => 'clinic-create',
                'display_title' =>['en' => 'create clinic', 'ar' => 'اضافه عياده'] ,
            ],
            [
                'title' => 'clinic-edit',
                'display_title' =>['en' => 'edit clinic', 'ar' => 'تعديل عياده'] ,
            ],
            [
                'title' => 'clinic-show-request',
                'display_title' =>['en' => 'clinic show request', 'ar' => 'مشاهده طلب عياده'] ,
            ],
            //hospital
            [
                'title' => 'hospital-list',
                'display_title' => ['en' => 'hospital list', 'ar' => 'قائمه اذنات مستشفى']
            ],
            [
                'title' => 'hospital-index',
                'display_title' => ['en' => 'index hospital', 'ar' => 'قائمه مستشفى'],
            ],
            [
                'title' => 'hospital-index-request',
                'display_title' => ['en' => 'index hospital request', 'ar' => 'قائمه مستشفى فى طلب'],
            ],
            [
                'title' => 'hospital-status',
                'display_title' => ['en' => 'hospital status', 'ar' => 'تغير حاله مستشفى'],
            ],
            [
                'title' => 'hospital-many-status',
                'display_title' => ['en' =>'hospital many status', 'ar' => 'تغير اكثر حاله مستشفى'],
            ],
            [
                'title' => 'hospital-status-request',
                'display_title' => ['en' => 'hospital status request', 'ar' => 'تغير حاله مستشفى فى الطلب'],
            ],
            [
                'title' => 'hospital-list-information',
                'display_title' => ['en' => 'hospital list information', 'ar' => 'قائمه بيانات مستشفى']
            ],
            [
                'title' => 'hospital-create',
                'display_title' =>['en' => 'create hospital', 'ar' => 'اضافه مستشفى'] ,
            ],
            [
                'title' => 'hospital-edit',
                'display_title' =>['en' => 'edit hospital', 'ar' => 'تعديل مستشفى'] ,
            ],
            [
                'title' => 'hospital-show-request',
                'display_title' =>['en' => 'hospital show request', 'ar' => 'مشاهده طلب مستشفى'] ,
            ],
            //vendor
            [
                'title' => 'vendor-list',
                'display_title' => ['en' => 'vendor list', 'ar' => 'قائمه اذنات فيندر']
            ],
            [
                'title' => 'vendor-index',
                'display_title' => ['en' => 'index vendor', 'ar' => 'قائمه فيندر'],
            ],
            [
                'title' => 'vendor-index-request',
                'display_title' => ['en' => 'index vendor request', 'ar' => 'قائمه فيندر فى طلب'],
            ],
            [
                'title' => 'vendor-status',
                'display_title' => ['en' => 'vendor status', 'ar' => 'تغير حاله فيندر'],
            ],
            [
                'title' => 'vendor-many-status',
                'display_title' => ['en' =>'vendor many status', 'ar' => 'تغير اكثر حاله فيندر'],
            ],
            [
                'title' => 'vendor-status-request',
                'display_title' => ['en' => 'vendor status request', 'ar' => 'تغير حاله فيندر فى الطلب'],
            ],
            [
                'title' => 'vendor-list-information',
                'display_title' => ['en' => 'vendor list information', 'ar' => 'قائمه بيانات فيندر']
            ],
            [
                'title' => 'vendor-create',
                'display_title' =>['en' => 'create vendor', 'ar' => 'اضافه فيندر'] ,
            ],
            [
                'title' => 'vendor-edit',
                'display_title' =>['en' => 'edit vendor', 'ar' => 'تعديل فيندر'] ,
            ],
            [
                'title' => 'vendor-show-request',
                'display_title' =>['en' => 'vendor show request', 'ar' => 'مشاهده طلب فيندر'] ,
            ],
            //hospital branch
            [
                'title' => 'hospital-branch-list',
                'display_title' =>['en' => 'hospital branch list', 'ar' => 'قائمه اذنات فرع المستشقى'] ,
            ],
            [
                'title' => 'hospital-branch-index',
                'display_title' =>['en' => 'index hospital branch', 'ar' => 'قائمه فرع المستشقى'] ,
            ],
            [
                'title' => 'hospital-branch-create',
                'display_title' =>['en' => 'create hospital branch', 'ar' => 'اضافه فرع المستشقى'] ,
            ],
            [
                'title' => 'hospital-branch-edit',
                'display_title' =>['en' => 'edit hospital branch', 'ar' => 'تعديل فرع المستشقى'] ,
            ],
            //clinic doctor
            [
                'title' => 'clinic-doctor-list',
                'display_title' =>['en' => 'clinic doctor list', 'ar' => 'قائمه اذنات دكتور عياده'] ,
            ],
            [
                'title' => 'clinic-doctor-index',
                'display_title' =>['en' => 'index clinic doctor', 'ar' => 'قائمه دكتور عياده'] ,
            ],
            [
                'title' => 'clinic-doctor-create',
                'display_title' =>['en' => 'create clinic doctor', 'ar' => 'اضافه دكتور عياده'] ,
            ],
            //hospital clinic
            [
                'title' => 'hospital-clinic-list',
                'display_title' =>['en' => 'hospital clinic list', 'ar' => 'قائمه اذنات عياده المستشقى'] ,
            ],
            [
                'title' => 'hospital-clinic-index',
                'display_title' =>['en' => 'index hospital clinic', 'ar' => 'قائمه عياده المستشقى'] ,
            ],
            [
                'title' => 'hospital-clinic-create',
                'display_title' =>['en' => 'create hospital clinic', 'ar' => 'اضافه عياده المستشقى'] ,
            ],
        ];
        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
