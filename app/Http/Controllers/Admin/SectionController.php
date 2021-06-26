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

            $section = Section::where('name',$data['name'])->first();
            if($section){
                return $this->err();
            }


            Section::create($data);

            return response()->json('success');
        }
    }

    public function show(Section $section)
    {
        if(request()->ajax())
        {
            // TODO display section and its assigned GradeLevel , Teachers & Students.

            return response()->json(Section::with('grade_level','teacher', 'student')->where('id', $section->id)->first());

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

            $section = DB::table('sections')
            ->where('id',$section->id)
            ->update([
                'grade_level_id' => $data['grade_level_id'],
                'name' => $data['name'],
                'description' => $data['description']
            ]);

            return response()->json(request()->all());

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
                'section_adviser'=>'',
            ]);
           
            $adviser = Section::where('id',$data['section_id'])
                     ->where('adviser_id',$data['teacher_id'])
                     ->first();

            $data['created_at'] = now();
            
                    if($data['section_adviser'] == '1'){
                        DB::table('sections')
                        ->updateOrInsert(
                        ['id' => $data['section_id']],
                        ['adviser_id' => $data['teacher_id'],'created_at'=>now()]
                    );

                    //Get Section id via student ID
                    $insert_adviser_id = DB::table('student_grade')
                    ->leftJoin('students','students.id','student_grade.student_id')
                    ->where('students.section_id',$data['section_id'])
                    ->update(['adviser_id'=>$data['teacher_id']]);

                    }
                    
                     $teacher = DB::table('section_teacher')
                            ->where('section_id', $data['section_id'])
                            ->where('teacher_id', $data['teacher_id'])
                            ->first();
                            
                            if(!$teacher)
                            {
                                DB::table('section_teacher')->insert(
                                    [
                                        'section_id'=>$data['section_id'],
                                        'teacher_id'=> $data['teacher_id'],
                                        'created_at'=> now()
                                    ],
                                    
                                );
                                return response()->json('success');
                            }
                            else
                            {
                                return response()->json('error');
                            }
                        
        
        }
    }

 

}
