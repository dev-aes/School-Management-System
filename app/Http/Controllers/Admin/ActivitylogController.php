<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class ActivitylogController extends Controller
{
    public function index()
    {
        $activities = Activity::all();

        if(request()->ajax())
        {
            return DataTables::of($activities)
            ->make(true);
        }

        return view('activity_log.index');

    }

}
