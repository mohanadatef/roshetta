<?php

namespace App\Providers;


use App\Models\Core_Data\Language;
use App\Models\Setting\Setting;
use App\Models\Setting\Setting_Detail;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['auth.login', 'includes.admin.head', 'includes.admin.header'], function ($view) {
            $setting = Setting::first();
           $language = Language::all();
            $view->with('setting', $setting);
            $view->with('language', $language);
        });
    }

}
