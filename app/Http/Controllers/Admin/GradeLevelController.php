<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\School;
use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class GradeLevelController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(GradeLevel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showGradeLevel" onclick="showGradeLevel('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editGradeLevel" onclick="editGradeLevel('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="AddSubject" class="btn btn-secondary btn-sm assignSubject" onclick="assign_subject('.$row->id.')"><i class="fas fa-edit"></i> Add Subject</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteGradeLevel" onclick="deleteGradeLevel('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }

        return view('grade.index');
    }

    public function store()
    {
        if(request()->ajax())
        {
            $grade_level_form_data = request()->validate([
                'name' => 'string',
                'description'=>'string',
                'grade_val' => 'integer'
            ]);
            
            $months_no = School::all('months_no')->first();
            $grade_level_form_data['months_no'] =  $months_no->months_no;
            if(request()->ajax()) 
            {
                return response()->json(GradeLevel::create($grade_level_form_data));
            }

        }
       
    }

    public function show(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json(GradeLevel::with('subject')->where('id', $gradeLevel->id)->first()); // get grade level and its assigned subject(s)
        }
    }

    public function edit(GradeLevel $gradeLevel) 
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel);
        }
    }

    public function update(GradeLevel $gradeLevel)
    {
         $grade_level_form_data = request()->validate([
            'name' => 'required|string',
            'description'=>'required|string',
            'grade_val' => 'integer'

        ]);

        if(request()->ajax()) {

            return response()->json($gradeLevel->update( $grade_level_form_data));
        }
    }

    public function destroy(GradeLevel $gradeLevel)
    {
        if(request()->ajax()) {
            $gradeLevel->delete();
        }
    }

    // Todo display unadded subjects by grade level
    public function display_subjects_for_grade_level(GradeLevel $grade_level)
    {
        if(request()->ajax()){
            //$subjects_per_grade_level = Subject::where('grade_val',$grade_level->grade_val)->get();

            $subjects = DB::table('subjects')
                        ->leftJoin('grade_level_subject','subjects.id','grade_level_subject.subject_id')
                        //->leftJoin('grade_levels','grade_levels.id','grade_level_subject.grade_level_id')
                        ->select('subjects.name','subjects.id','subjects.grade_val')
                        ->where('subjects.grade_val','=',$grade_level->id)
                        ->where('grade_level_subject.subject_id', NULL)
                        ->get();

            return response()->json($subjects);

        }
    }

    public function grade_level_assign_subject_subject_id_store() 
    {
        if(request()->ajax())
        {

           $grade_level_id = request('grade_level_id'); // grade level

           foreach(request('subject_id') as $subject_id):

            // check if this subject is already assigned to this grade level

                $subject = DB::table('grade_level_subject')
                           ->where('grade_level_id', $grade_level_id)
                           ->where('subject_id', $subject_id)
                           ->first();

                if($subject)
                {
                    return $this->err(); // return error msg
                }

                else
                {
                    
                    DB::table('grade_level_subject')
                    ->insert(['grade_level_id' => $grade_level_id,
                              'subject_id' => $subject_id,
                              'created_at' => now()
                               ]);

                    $student_grade_ids =  DB::table('grades')->select('student_grade_id')->distinct()->get();
                    
                    foreach($student_grade_ids as $id):
                        DB::table('grades')
                        ->insert([
                            'student_grade_id'=>$id->student_grade_id,
                            'subject_id' => $subject_id,  
                            'grade_level_val'=>$grade_level_id,
                            'quarter_id'=>1    
                        ]);    
                    endforeach;         

                          

                }



               
           endforeach;

           return $this->res(); // success msg
         
        }
    }


    

}
