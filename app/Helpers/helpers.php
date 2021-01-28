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
        return \App\Models\Core_Data\Language::orderby('order','asc')->get();
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
        if ($permission)
            return true;
        else
            return false;
    }
}

if (!function_exists('change_locale_language')) {
    function change_locale_language($id)
    {
        if($id != null)
        {
        \Illuminate\Support\Facades\App::setLocale(\App\Models\Core_Data\Language::find($id)->code);
        }
    }
}

if (!function_exists('check_locale_language')) {
    function check_locale_language($id)
    {
        if($id != null)
        {
            return \App\Models\Core_Data\Language::find($id)->code;
        }
        else
        {
            return  Language_Locale();
        }
    }
}