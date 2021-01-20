<?php

namespace App\Providers;


use App\Models\Core_Data\Language;
use App\Models\Setting\Setting;
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
        view()->composer(['*'], function ($view) {
            $setting = Setting::first();
           $language = Language::all();
           $language_Locale = Language_Locale();
            $view->with('setting', $setting);
            $view->with('language', $language);
            $view->with('language_Locale', $language_Locale);
        });
    }

}
