<?php

namespace App\Http\Controllers\User;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {

            // $section_teacher = DB::table('section_teacher')
            //                    ->where('teacher_id', auth()->user()->teacher_id)
            //                    ->get(); // get teacher's designated sections 

            // $sections = [];

            // foreach($section_teacher as $section): 

            //         array_push($sections, $section->section_id); // store each fetch section ids []

            // endforeach;

            // $teacher_students = Student::with('section')->whereIn('section_id', $sections)->get(); // select * from students where section id =  ID[]

 
            // return DataTables::of($teacher_students)
            // ->addIndexColumn()
            // ->addColumn('actions', function($row){
            //         $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showStudent" onclick="t_assign_grade(\' '.$row->section->id.' \' , \' '. $row->id .'\')"><i class="fas fa-plus-circle"></i> Add Grade</a>';

            //         return $btn;
            // })
            // ->rawColumns(['actions'])
            // ->make(true);

            $section_teacher = DB::table('section_teacher')
                                ->join('sections', 'section_id', 'sections.id')
                                ->where('teacher_id', auth()->user()->teacher_id)
                                ->get(); // get teacher's designated sections 

            
            return response()->json($section_teacher);

        }

        return view('users.teacher.index');
    }

    public function t_display_students(Section $section)
    {
        if(request()->ajax())
        {
            $students = Section::with('student')->where('id', $section->id)->first();

            return response()->json($students);
        }
    }






    public function create(Section $section, Student $student)
    {
            if(request()->ajax())
            {
                $teacher_login_id = auth()->user()->teacher_id;

                $adviser = DB::table('sections')->where('adviser_id',$teacher_login_id)->first();

                //Get id from student_grade
                $student_grade_id = DB::table('student_grade')->where('student_id',$student->id)->first();
               
              //***If Adviser is login all subjects will be displayed otherwise subject handled of a teacher will be displayed***//  
                if($adviser){
                    $grades = DB::table('grades')
                    ->join('subjects','grades.subject_id','subjects.id')
                    ->select('grades.quarter_1','grades.quarter_2','grades.quarter_3','grades.quarter_4','grades.subject_id','subjects.name','subjects.id','grades.is_approve')
                    ->where('student_grade_id',$student_grade_id->id)
                    ->get(); // get subjects, grades by quarter where student id is equal to the param $student
                }
                else{
                    $grades = DB::table('grades')
                    ->join('subjects','grades.subject_id','subjects.id')
                    ->select('grades.quarter_1','grades.quarter_2','grades.quarter_3','grades.quarter_4','grades.subject_id','subjects.name','subjects.id','grades.is_approve')
                    ->where('student_grade_id',$student_grade_id->id)
                    ->where('grades.subject_teacher_id',auth()->user()->teacher_id)
                    ->get(); // get subjects, grades by quarter where student id is equal to the param $student
                }
                //*****************End************************** *//


                $section_with_grade_level = Section::with('grade_level')->where('id', $section->id)->first();
                
                
                return response()->json([$section_with_grade_level, $student,$grades]);
            }
    }

    public function store()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'grades' => '',
                'quarter_id' => '',
                'section_id'=>'',
                'student_id'=>'',
                'subject_id'=>'',
                'grades_id'=>'',
            ]);


            $academic_year = DB::table('academic_years')
                    ->join('student_grade','academic_years.id','student_grade.academic_year_id')
                    ->select('academic_years.id')
                    ->where('student_grade.student_id',$data['student_id'])
                    ->first();
            //Get ID from student grade ID with academic year id and student_id
            $student_grade_id = DB::table('student_grade')
                            ->where('academic_year_id',$academic_year->id)
                            ->where('student_id',$data['student_id'])
                            ->first();
            
            //Get Subject Teacher ID section_subject
            
            $get_subject_teacher = DB::table('section_subject')
                                   ->leftJoin('subjects','section_subject.subject_id','subjects.id')
                                   ->where('section_subject.section_id',$data['section_id'])
                                   ->where('section_subject.subject_id',$data['subject_id'])
                                   ->first();
   
            //Get grade value of a subject
            $grade_val = DB::table('grade_level_subject')
                         ->join('grade_levels','grade_level_subject.grade_level_id','grade_levels.id')                           
                        ->where('grade_level_subject.subject_id', $data['subject_id'])->first();  

                        $quarter = 0;
                        
                        if($data['quarter_id'] == 1)
                        {
                            $quarter = 'quarter_1';
                        }
                        else if($data['quarter_id'] == 2)
                        {
                            $quarter = 'quarter_2';
                        }
                        else if($data['quarter_id'] == 3)
                        {
                            $quarter = 'quarter_3';
                        }
                        else
                        {
                            $quarter = 'quarter_4';
                        }

                    //***** Process is_approve data here    
                        $is_approve = DB::table('grades')
                        ->select('grades.is_approve')
                        ->where('student_grade_id',$data['student_id'])
                        ->where('subject_id', $data['subject_id'])  
                        ->where('subject_teacher_id',$get_subject_teacher->teacher_id)
                        ->first();
                        
                        //explode is_approve data
                        $is_approved = explode(",",$is_approve->is_approve);
                        for($i = 0; $i < count($is_approved); $i++){
                         if($i == $data['quarter_id']-1)   
                         $is_approved[$i] = $data['quarter_id'];
                        }
         
                        $is_approves = implode(",",$is_approved);    
                    //***************************************************** */

         //Check if the teacher is adviser or subject teacher
         //(auth()->user()->teacher_id
         $adviser_id = DB::table('sections')->where('adviser_id',$get_subject_teacher->teacher_id)->first();
         if($adviser_id){   
            $is_approves = '0,0,0,0';
           // return response()->json($is_approves); 
         }

         //Update or insert grades of a student on all quarters
            DB::table('grades')
            ->updateOrInsert(
                [ 
                    'student_grade_id'=>$data['student_id'],
                    'subject_id'=> $data['subject_id'],
                    'subject_teacher_id'=>$get_subject_teacher->teacher_id,          
                ],
                [
                    'grade_level_val'=> $grade_val->grade_val,
                     $quarter => $data['grades'],
                     'is_approve'=>$is_approves,
                    'created_at'=> now()
                ]
            );                                
           
            return response()->json('success'); 

        }
    }
}
