<?php

namespace App\Providers;

use App\Models\ACL\Permission;
use App\Models\Setting\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $permission_show = DB::table('permissions')
                ->join('permission_roles', 'permission_roles.permission_id', '=', 'permissions.id')
                ->where('permission_roles.role_id',Auth::user()->role_id)
                ->pluck('permissions.title','permissions.id');
            $view->with('permission_show',$permission_show);
            $view->with('setting', Setting::first());

        });
    }

}
