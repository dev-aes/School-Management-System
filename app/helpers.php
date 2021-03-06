<?php

use App\Models\User;
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


if(!function_exists('get_user_role_name'))
{
    function get_user_role_name()
    {
        $role = auth()->id();

        return $role;
        // return ucfirst($role);
    }
}


if(!function_exists('get_admin_pw'))
{
    function get_admin_pw()
    {
        $admin = User::with(['role' => function($query) {
            $query->where('name', '=', 'admin');
        }])->first();

        return $admin;
        // return ucfirst($role);
    }
}






