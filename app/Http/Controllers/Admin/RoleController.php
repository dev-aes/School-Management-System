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
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none editRole" onclick="editRole('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-decoration-none text-danger deleteRole" onclick="crud_delete(\' '.'a.deleteRole'.' \' , \'role.destroy\', \' '.'Role Deleted'.' \' , \' '.'.role_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

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

                Role::create(['name' => strtolower($role)]);

            endforeach;


            return response()->json('success');
        }
    }

    public function edit(Role $role)
    {
        if(request()->ajax())
        {
            return response()->json($role);
        }
    }

    public function update(Role $role)
    {
        if(request()->ajax())
        {
            $data = request()->validate(['title' => 'required|alpha']);

            $role->update($data);

            return $this->res();
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
