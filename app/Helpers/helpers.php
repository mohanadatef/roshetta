<?php

if (!function_exists('language'))
{
    function language($ar, $en)
    {
        if( \Illuminate\Support\Facades\App::getLocale() == 'en' )
            return $en;
        else
            return $ar;
    }
}