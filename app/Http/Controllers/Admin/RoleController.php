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
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteRole" onclick="crud_delete(\' '.'a.deleteRole'.' \' , \'role.destroy\', \' '.'Role Deleted'.' \' , \' '.'.role_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

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

                $check_role = Role::where('name', $role)->first();

                if($check_role):

                    return $this->err();

                endif;

                Role::create(['name' => $role]);

            endforeach;


            return response()->json('success');
        }
    }

    public function destroy(Role $role)
    {
        if(request()->ajax())
        {
            $role->delete();

            return $this->res();
        }
    }
}
