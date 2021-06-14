<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            
        }

        return view('grades.index');
    }
}
