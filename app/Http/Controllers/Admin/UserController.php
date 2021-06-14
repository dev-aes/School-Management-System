<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(User::with('role')->get())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showUser" onclick="showUser('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editUser" onclick="editUser('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteUser" onclick="deleteUser('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }

        return view('users.all.index');
    }

    public function create()
    {
        if(request()->ajax())
        {
            return response()->json([Student::all(), Role::where('name', '!=', 'student')->where('name', '!=', 'parent')->get(), ParentModel::all()]);
        }
    }

    public function display_student_info(Student $student)
    {
        if(request()->ajax())
        {
            return response()->json($student); // display student info by student_id 
        }
    }

    public function display_parent_info(ParentModel $parent)
    {
        if(request()->ajax())
        {
            return response()->json($parent); // display parent info by parent_id 
        }
    }

    public function store(Request $request)
    {
        if(request()->ajax())
        {

            $user = DB::table('users')
                    ->where('email', request('email'))
                    ->where('name', request('name'))
                    ->first();

                    // return response()->json($user);
            
            if($user)
            {
                return response()->json('error');
            }

                //Admin
                if($request->has('user_role'))
                {
                    $data = request()->validate([
                        'name' => 'alpha_spaces|required',
                        'email'=> 'email|required',
                        'password' => 'required|min:8',
                        'user_role' => 'required'
                        ]);

                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'role_id' => $data['user_role']
                        ]);
                        
                        return response()->json('success');
                }

                // Student
                if($request->has('student_role'))
                {
                    $data = request()->validate([
                        'name' => 'alpha_spaces|required',
                        'email'=> 'email|required',
                        'password' => 'required|min:8',
                        'student_id' => 'required',
                        'student_role' => 'required'
                        ]);

                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'student_id' => $data['student_id'],
                            'role_id' => $data['student_role']
                        ]);
                        
                        return response()->json('success');
                }

                // Parent
                if($request->has('parent_role'))
                {
                    // return response()->json(request()->all());

                    $data = request()->validate([
                        'name' => 'alpha_spaces|required',
                        'email'=> 'email|required',
                        'password' => 'required|min:8',
                        'parent_id' => 'required',
                        'parent_role' => 'required'
                        ]);

                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'parent_id' => $data['parent_id'],
                            'role_id' => $data['parent_role']
                        ]);
                        
                        return response()->json('success');
                }   
        }
    }

    public function edit(User $user)
    {
        if(request()->ajax())
        {
            return response()->json($user);
        }
    }

    public function update(User $user)
    {
        if(request()->ajax())
        {
            $user->update([
                'password' => Hash::make(request('password'))
            ]);

            return response()->json('success');
        }
    }



    public function destroy(User $user)
    {
        if(request()->ajax())
        {
            $user->delete();

            return response()->json('success');

        }
    }

    public function isOnline(User $user)
    {
        if(request()->ajax())
        {
            if(request('status') == 'online')
            {
                return response()->json('OL');
                // $user->update(['status' => 1]);
                // return;
            }
            if(request('status') == 'offline')
            {
                return response()->json('OF');

                // $user->update(['status' => 0]);
                // return;
            }
        }
    }
}
