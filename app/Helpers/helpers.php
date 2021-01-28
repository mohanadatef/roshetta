<?php

if (!function_exists('Language_Locale')) {
    function Language_Locale()
    {
        return \Illuminate\Support\Facades\App::getLocale();
    }
}

if (!function_exists('Language')) {
    function Language()
    {
        return \App\Models\Core_Data\Language::where('status',1)->orderby('order','asc')->get();
    }
}

if (!function_exists('permission_show')) {
    function permission_show($permission_title)
    {
        $permission = \Illuminate\Support\Facades\DB::table('permissions')
            ->join('permission_roles', 'permission_roles.permission_id', '=', 'permissions.id')
            ->where('permission_roles.role_id', \Illuminate\Support\Facades\Auth::user()->role_id)
            ->where('permissions.title', $permission_title)
            ->count();
        return $permission ? true : false;
    }
}

if (!function_exists('change_locale_language')) {
    function change_locale_language($id)
    {
        $id != null ? \Illuminate\Support\Facades\App::setLocale(\App\Models\Core_Data\Language::find($id)->code) : false ;
    }
}

if (!function_exists('check_locale_language')) {
    function check_locale_language($id)
    {
        return $id != null ? \App\Models\Core_Data\Language::find($id)->code : Language_Locale();
    }
}