<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none editUser" onclick="editUser('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-decoration-none text-danger deleteUser" onclick="deleteUser('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

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
            $students = Student::all();
            $roles = Role::all();
            $parents = ParentModel::all();
            $teachers = Teacher::all();


            return $this->res([ $students,$roles,$parents,$teachers]);
        }
    }

    public function display_student_info(Student $student)
    {
        if(request()->ajax())
        {
            return $this->res($student); // display student info by student_id 
        }
    }

    public function display_parent_info(ParentModel $parent)
    {
        if(request()->ajax())
        {
            return $this->res($parent); // display parent info by parent_id 
        }
    }

    public function display_teacher_info(Teacher $teacher)
    {
        if(request()->ajax())
        {
            return $this->res($teacher); // display teacher info by teacher_id 
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
            
            if($user)
            {
                return $this->danger();
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

                    $user_role =    User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'role_id' => $data['user_role']
                        ]);
                        
                        $this->log_activity($user_role,'created','User',$user_role->first_name." ".$user_role->last_name);
                        return $this->success();
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

                    $user_role =    User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'student_id' => $data['student_id'],
                            'role_id' => $data['student_role']
                        ]);
                        
                        $this->log_activity($user_role,'created','User',$user_role->first_name." ".$user_role->last_name);
                        return $this->success();
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

                     $user_role =   User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'parent_id' => $data['parent_id'],
                            'role_id' => $data['parent_role']
                        ]);

                        $this->log_activity($user_role,'created','User',$user_role->first_name." ".$user_role->last_name);
                        return response()->json('success');
                }   

                 // Teacher
                 if($request->has('teacher_role'))
                 {
                     // return response()->json(request()->all());
 
                     $data = request()->validate([
                         'name' => 'alpha_spaces|required',
                         'email'=> 'email|required',
                         'password' => 'required|min:8',
                         'teacher_id' => 'required',
                         'teacher_role' => 'required'
                         ]);
 
                     $user_role =    User::create([
                             'name' => $data['name'],
                             'email' => $data['email'],
                             'password' => Hash::make($data['password']),
                             'teacher_id' => $data['teacher_id'],
                             'role_id' => $data['teacher_role']
                         ]);

                         $this->log_activity($user_role,'created','User',$user_role->first_name." ".$user_role->last_name);
                         return $this->success();
                 }
                 
                 
        }
    }

    public function edit(User $user)
    {
        if(request()->ajax())
        {
            return $this->res($user);
        }
    }

    public function update(User $user)
    {
        if(request()->ajax())
        {
            $user->update([
                'password' => Hash::make(request('password'))
            ]);

            $this->log_activity($user,'updated','User',$user->first_name." ".$user->last_name);

            return $this->success();
        }
    }



    public function destroy(User $user)
    {
        if(request()->ajax())
        {
            $this->log_activity($user,'deleted','User',$user->first_name." ".$user->last_name);

            $user->delete();

            return $this->success();

        }
    }
}
