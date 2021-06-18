<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Section::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showSection" onclick="showSection('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editSection" onclick="editSection('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteSection" onclick="deleteSection('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteSection" onclick="showStudentsAndTeacherInASection('.$row->id.')"><i class="fas fa-trash"></i> View Students</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }
        return view('section.index');
    }

    public function create()
    {
        if(request()->ajax())
        {
            return response()->json(GradeLevel::all());
        }
    }

    public function store()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'grade_level_id' => 'required',
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            Section::create($data);

            return response()->json('success');
        }
    }

    public function edit(Section $section)
    {
        if(request()->ajax())
        {
            return response()->json([$section , GradeLevel::all(), $section->grade_level->name]);
        }
    }

    public function update(Section $section)
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'grade_level_id' => 'required',
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            $section->update($data);

            return response()->json('success');

        }
    }

    public function destroy(Section $section)
    {
        if(request()->ajax())
        {
            $section->delete();

            return response()->json('success');
        }
    }

    public function section_create_teacher()
    {
        if(request()->ajax())
        {
            return response()->json([Section::all(), Teacher::all()]);
        }
    }

    public function section_store_teacher()
    {
        if(request()->ajax())
        {
           
            $data = request()->validate([
                'section_id' => 'required',
                'teacher_id' => 'required',
            ]);

            $data['created_at'] = now();

            // check if the teacher is already assigned to the specific section

            $teacher = DB::table('section_teacher')
                      ->where('section_id', $data['section_id'])
                      ->where('teacher_id', $data['teacher_id'])
                      ->first();
            
            if(!$teacher)
            {
                DB::table('section_teacher')->insert($data);
                return response()->json('success');
            }
            else
            {
                return response()->json('error');
            }
        
        }
    }

    // Display students in a section
    public function show_students_and_teacher_in_section(Section $section){
        if(request()->ajax())
        {
            return response()->json($section->student);
        }
    }

    


}
