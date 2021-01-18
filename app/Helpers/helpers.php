<?php

if (!function_exists('Language_Locale'))
{
    function Language_Locale()
    {
        return \Illuminate\Support\Facades\App::getLocale() ;
    }
}

if (!function_exists('Language'))
{
    function Language()
    {
        return  \App\Models\Core_Data\Language::all();
    }
}