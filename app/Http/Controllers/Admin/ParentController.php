<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ParentController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(ParentModel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showParent" onclick="showParent('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editParent" onclick="editParent('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteParent" onclick="deleteParent('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }
        return view('parent.index');
    }

    public function store()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'name' => 'required|alpha_spaces',
                'email'=> 'required|email',
                'contact' => 'required',
                'facebook' => 'required'
            ]);

            ParentModel::create($data);

            return response()->json('success');

            //return response()->json(request()->all());
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

                                                 

            return response()->json([$parent, $parent_student_section  ]); // parent, parent's student's section
        }
    }

    public function edit(ParentModel $parent)
    {
        if(request()->ajax())
        {
            return response()->json($parent);
        }
    }

    public function update(ParentModel $parent)
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'name' => 'required|alpha_spaces',
                'email'=> 'required|email',
                'contact' => 'required',
                'facebook' => 'required'
            ]);

            $parent->update($data);

            return response()->json('success');
        }
    }

    public function destroy(ParentModel $parent)
    {
        $parent->delete();

        return response()->json('success');
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

        return response()->json('success');
    }
}
