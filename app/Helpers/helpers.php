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