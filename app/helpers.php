<?php

use App\Models\AcademicYear;

if(!function_exists('get_latest_academic_year'))
{
    function get_latest_academic_year()
    {
        $ay = AcademicYear::where('status',1)->first();

        return $ay;
    }
}

if(!function_exists('get_username'))
{
    function get_username()
    {
        $name = auth()->user()->name;

        return $name;
    }
}

