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
                'display_title' => ['en' => 'acl list', 'ar' => 'قائمه الامان'],
            ],
            //user
            [
                'title' => 'user-list',
                'display_title' => ['en' => 'user list', 'ar' => 'قائمه المستخدمين']
            ],
            [
                'title' => 'user-index',
                'display_title' => 'index user',
            ],
            [
                'title' => 'user-create',
                'display_title' => 'create user',
            ],
            [
                'title' => 'user-edit',
                'display_title' => 'edit user',
            ],
            [
                'title' => 'user-password',
                'display_title' => 'password user',
            ],
            [
                'title' => 'user-status',
                'display_title' => 'user status',
            ],
            [
                'title' => 'user-many-status',
                'display_title' => 'user many status',
            ],
            //role
            [
                'title' => 'role-list',
                'display_title' => 'list role',
            ],
            [
                'title' => 'role-index',
                'display_title' => 'index role',
            ],
            [
                'title' => 'role-create',
                'display_title' => 'create role',
            ],
            [
                'title' => 'role-edit',
                'display_title' => 'edit role',
            ],
            //permission
            [
                'title' => 'permission-list',
                'display_title' => 'permission list',
            ],
            [
                'title' => 'permission-index',
                'display_title' => 'permission index',
            ],
            [
                'title' => 'permission-edit',
                'display_title' => 'edit permission',
            ],
            //setting
            [
                'title' => 'setting-list',
                'display_title' => 'setting list',
            ],
            [
                'title' => 'setting-index',
                'display_title' => 'setting index',
            ],
            [
                'title' => 'setting-create',
                'display_title' => 'create setting',
            ],
            [
                'title' => 'setting-edit',
                'display_title' => 'edit setting',
            ],
            //about us
            [
                'title' => 'about-us-list',
                'display_title' => 'about us list',
            ],
            [
                'title' => 'about-us-index',
                'display_title' => 'about us index',
            ],
            [
                'title' => 'about-us-create',
                'display_title' => 'create about us',
            ],
            [
                'title' => 'about-us-edit',
                'display_title' => 'edit about us',
            ],
            //contact us
            [
                'title' => 'contact-us-list',
                'display_title' => 'contact us list',
            ],
            [
                'title' => 'contact-us-index',
                'display_title' => 'contact us index',
            ],
            [
                'title' => 'contact-us-create',
                'display_title' => 'create contact us',
            ],
            [
                'title' => 'contact-us-edit',
                'display_title' => 'edit about us',
            ],
            //privacy
            [
                'title' => 'privacy-list',
                'display_title' => 'privacy list',
            ],
            [
                'title' => 'privacy-index',
                'display_title' => 'privacy index',
            ],
            [
                'title' => 'privacy-create',
                'display_title' => 'create privacy',
            ],
            [
                'title' => 'privacy-edit',
                'display_title' => 'edit privacy',
            ],
            //core data
            [
                'title' => 'core-data-list',
                'display_title' => 'core-data list',
            ],
            //area
            [
                'title' => 'area-list',
                'display_title' => 'area list',
            ],
            [
                'title' => 'area-index',
                'display_title' => 'index area',
            ],
            [
                'title' => 'area-create',
                'display_title' => 'create area',
            ],
            [
                'title' => 'area-edit',
                'display_title' => 'edit area',
            ],
            [
                'title' => 'area-status',
                'display_title' => 'status area',
            ],
            [
                'title' => 'area-many-status',
                'display_title' => 'status many area',
            ],
            //city
            [
                'title' => 'city-list',
                'display_title' => 'city list',
            ],
            [
                'title' => 'city-index',
                'display_title' => 'index city',
            ],
            [
                'title' => 'city-create',
                'display_title' => 'create city',
            ],
            [
                'title' => 'city-edit',
                'display_title' => 'edit city',
            ],
            [
                'title' => 'city-status',
                'display_title' => 'status city',
            ],
            [
                'title' => 'city-many-status',
                'display_title' => 'status many city',
            ],
            //company-insurance
            [
                'title' => 'company-insurance-list',
                'display_title' => 'company insurance list',
            ],
            [
                'title' => 'company-insurance-index',
                'display_title' => 'index company insurance',
            ],
            [
                'title' => 'company-insurance-create',
                'display_title' => 'create company insurance',
            ],
            [
                'title' => 'company-insurance-edit',
                'display_title' => 'edit company insurance',
            ],
            [
                'title' => 'company-insurance-status',
                'display_title' => 'status company-insurance',
            ],
            [
                'title' => 'company-insurance-many-status',
                'display_title' => 'status many company-insurance',
            ],
            //country
            [
                'title' => 'country-list',
                'display_title' => 'country list',
            ],
            [
                'title' => 'country-index',
                'display_title' => 'index country',
            ],
            [
                'title' => 'country-create',
                'display_title' => 'create country',
            ],
            [
                'title' => 'country-edit',
                'display_title' => 'edit country',
            ],
            [
                'title' => 'country-status',
                'display_title' => 'status country',
            ],
            [
                'title' => 'country-many-status',
                'display_title' => 'status many country',
            ],
            //language
            [
                'title' => 'language-list',
                'display_title' => 'language list',
            ],
            [
                'title' => 'language-index',
                'display_title' => 'index language',
            ],
            [
                'title' => 'language-create',
                'display_title' => 'create language',
            ],
            [
                'title' => 'language-edit',
                'display_title' => 'edit language',
            ],
            [
                'title' => 'language-status',
                'display_title' => 'status language',
            ],
            [
                'title' => 'language-many-status',
                'display_title' => 'status many language',
            ],
            //medicine
            [
                'title' => 'medicine-list',
                'display_title' => 'medicine list',
            ],
            [
                'title' => 'medicine-index',
                'display_title' => 'index medicine',
            ],
            [
                'title' => 'medicine-create',
                'display_title' => 'create medicine',
            ],
            [
                'title' => 'medicine-edit',
                'display_title' => 'edit medicine',
            ],
            [
                'title' => 'medicine-status',
                'display_title' => 'status medicine',
            ],
            [
                'title' => 'medicine-many-status',
                'display_title' => 'status many medicine',
            ],
            //medicine-category
            [
                'title' => 'medicine-category-list',
                'display_title' => 'medicine-category list',
            ],
            [
                'title' => 'medicine-category-index',
                'display_title' => 'index medicine-category',
            ],
            [
                'title' => 'medicine-category-create',
                'display_title' => 'create medicine-category',
            ],
            [
                'title' => 'medicine-category-edit',
                'display_title' => 'edit medicine-category',
            ],
            [
                'title' => 'medicine-category-status',
                'display_title' => 'status medicine-category',
            ],
            [
                'title' => 'medicine-category-many-status',
                'display_title' => 'status many medicine-category',
            ],
            //product
            [
                'title' => 'product-list',
                'display_title' => 'product list',
            ],
            [
                'title' => 'product-index',
                'display_title' => 'index product',
            ],
            [
                'title' => 'product-create',
                'display_title' => 'create product',
            ],
            [
                'title' => 'product-edit',
                'display_title' => 'edit product',
            ],
            [
                'title' => 'product-status',
                'display_title' => 'status product',
            ],
            [
                'title' => 'product-many-status',
                'display_title' => 'status many product',
            ],
            //product-category
            [
                'title' => 'product-category-list',
                'display_title' => 'product-category list',
            ],
            [
                'title' => 'product-category-index',
                'display_title' => 'index product-category',
            ],
            [
                'title' => 'product-category-create',
                'display_title' => 'create product-category',
            ],
            [
                'title' => 'product-category-edit',
                'display_title' => 'edit product-category',
            ],
            [
                'title' => 'product-category-status',
                'display_title' => 'status product-category',
            ],
            [
                'title' => 'product-category-many-status',
                'display_title' => 'status many product-category',
            ],
            //scientific-degree
            [
                'title' => 'scientific-degree-list',
                'display_title' => 'scientific-degree list',
            ],
            [
                'title' => 'scientific-degree-index',
                'display_title' => 'index scientific-degree',
            ],
            [
                'title' => 'scientific-degree-create',
                'display_title' => 'create scientific-degree',
            ],
            [
                'title' => 'scientific-degree-edit',
                'display_title' => 'edit scientific-degree',
            ],
            [
                'title' => 'scientific-degree-status',
                'display_title' => 'status scientific-degree',
            ],
            [
                'title' => 'scientific-degree-many-status',
                'display_title' => 'status many scientific-degree',
            ],
            //service
            [
                'title' => 'service-list',
                'display_title' => 'service list',
            ],
            [
                'title' => 'service-index',
                'display_title' => 'index service',
            ],
            [
                'title' => 'service-create',
                'display_title' => 'create service',
            ],
            [
                'title' => 'service-edit',
                'display_title' => 'edit service',
            ],
            [
                'title' => 'service-status',
                'display_title' => 'status service',
            ],
            [
                'title' => 'service-many-status',
                'display_title' => 'status many service',
            ],
            //service-category
            [
                'title' => 'service-category-list',
                'display_title' => 'service-category list',
            ],
            [
                'title' => 'service-category-index',
                'display_title' => 'index service-category',
            ],
            [
                'title' => 'service-category-create',
                'display_title' => 'create service-category',
            ],
            [
                'title' => 'service-category-edit',
                'display_title' => 'edit service-category',
            ],
            [
                'title' => 'service-category-status',
                'display_title' => 'status service-category',
            ],
            [
                'title' => 'service-category-many-status',
                'display_title' => 'status many service-category',
            ],
            //specialty
            [
                'title' => 'specialty-list',
                'display_title' => 'specialty list',
            ],
            [
                'title' => 'specialty-index',
                'display_title' => 'index specialty',
            ],
            [
                'title' => 'specialty-create',
                'display_title' => 'create specialty',
            ],
            [
                'title' => 'specialty-edit',
                'display_title' => 'edit specialty',
            ],
            [
                'title' => 'specialty-status',
                'display_title' => 'status specialty',
            ],
            [
                'title' => 'specialty-many-status',
                'display_title' => 'status many specialty',
            ],
            //sub-specialty
            [
                'title' => 'sub-specialty-list',
                'display_title' => 'sub-specialty list',
            ],
            [
                'title' => 'sub-specialty-index',
                'display_title' => 'index sub-specialty',
            ],
            [
                'title' => 'sub-specialty-create',
                'display_title' => 'create sub-specialty',
            ],
            [
                'title' => 'sub-specialty-edit',
                'display_title' => 'edit sub-specialty',
            ],
            [
                'title' => 'sub-specialty-status',
                'display_title' => 'status sub-specialty',
            ],
            [
                'title' => 'sub-specialty-many-status',
                'display_title' => 'status many sub-specialty',
            ],
        ];
        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
