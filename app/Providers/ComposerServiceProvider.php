<?php

namespace App\Providers;


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
            $languange_code = \Illuminate\Support\Facades\App::getLocale();
            $languange=Language::where('code',$languange_code)->first();
            $setting_detail = Setting_Detail::where('language_id',$languange->id)->where('status',1)->first();
            $setting = array_merge($setting,$setting_detail);
            $view->with('setting', $setting);
        });
    }

}
