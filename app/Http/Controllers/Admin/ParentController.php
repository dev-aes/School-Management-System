<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use Yajra\DataTables\Facades\DataTables;

class ParentController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(ParentModel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="text-decoration-none " onclick="showParent('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none " onclick="editParent('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-decoration-none text-danger deleteParent" onclick="deleteParent('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }
        return view('parent.index');
    }

    public function store(ParentRequest $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate();

           $parent = ParentModel::create($data);

           $this->log_activity($parent, 'created', 'Guardian', $parent->name);


            return $this->success();

        }
    }

    public function show(ParentModel $parent)
    {
        if(request()->ajax())
        {
            $parent_student_section = [];

            foreach($parent->students as $student):

                $s = Student::with('section')->where('id', $student->id)->first(); // get the individual students with assigned section and store to the parent_student_section[]

                array_push($parent_student_section, $s);

            endforeach;

                                                 

            return $this->res([$parent, $parent_student_section  ]); // parent, parent's student's section
        }
    }

    public function edit(ParentModel $parent)
    {
        if(request()->ajax())
        {
            return $this->res($parent);
        }
    }

    public function update(ParentModel $parent, ParentRequest $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate();

            $parent->update($data);
            $this->log_activity($parent, 'updated', 'Guardian', $parent->name);

               return $this->success();
        }
    }

    public function destroy(ParentModel $parent)
    {
        $parent->delete();

        $this->log_activity($parent, 'deleted', 'Guardian', $parent->name);

           return $this->success();
    }

    public function parent_display_student()
    {
        if(request()->ajax())
        {
            return response()->json([ParentModel::all(), Student::all()]);
        }
    }

    public function parent_student_store()
    {
        if(request()->ajax())
        {
            //check if the parent already have this student

           $parent = DB::table('parent_student')
                        ->where('student_id', request('student_id'))
                        ->where('parent_id', request('parent_id'))
                        ->first();

           if($parent)
           {
               return response()->json('error');
           }

           $parent_student = DB::table('parent_student')
                                ->insert([
                                'parent_id' => request('parent_id'),
                                'student_id' => request('student_id'),
                                'created_at' => now()
                                        ]);

            return true;
        }
    }

    public function parent_destroy_student(ParentModel $parent, Student $student)
    {
                        DB::table('parent_student')
                          ->where('parent_id', '=', $parent->id)
                          ->where('student_id', '=', $student->id)
                          ->delete();

        // $parent_student->delete();

           return $this->success();
    }
}
