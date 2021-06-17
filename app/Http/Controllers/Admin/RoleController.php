<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Role::all())
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editRole" onclick="editRole('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteRole" onclick="deleteRole('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
        }
        
        return view('role.index');
    }

    public function store()
    {
        if(request()->ajax())
        {

            // get the requested roles ( Array )

            $roles = explode(',',request('name'));

            foreach($roles as $role):

                Role::create(['name' => $role]);

            endforeach;


            return response()->json('success');
        }
    }
}
