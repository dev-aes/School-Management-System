<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Grade;


class GradeController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
        }

        return view('grades.index');
    }

    public function create()
    {
        if(request()->ajax())
        {
            return response()->json(Student::all());
        }
    }

    public function store(){
        if(request()->ajax()) {
            
            $data = request()->validate([
                'grades' => '',
                'quarter_id' => '',
                'section_id'=>'',
                'student_id'=>'',
                'subject_id'=>'',
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
                                ->join('teachers','section_subject.teacher_id','teachers.id')
                                ->select('teachers.id')
                                ->where('section_subject.section_id',$data['section_id'])
                                ->where('section_subject.subject_id',$data['subject_id'])
                                ->first(); 



                   
            DB::table('grades')
            ->updateOrInsert(
                [ 'student_grade_id'=>$student_grade_id->id,
                'subject_id'=> $data['subject_id'],
                'subject_teacher_id'=>$get_subject_teacher->id,
                'quarter_id'=>$data['quarter_id'],
                ],
                
                ['grades'=>$data['grades'],'created_at'=> now()]
            );                                

            return response()->json($get_subject_teacher);
            }

    } 

    public function grade_display_subjects_by_student_id()
    {
        if(request()->ajax())
        {
         
            // get the teachers by student_id (Array / Collection)
            $student_teachers = DB::table('student_teacher')
                        ->where('student_id', request('student_id'))
                        ->get();

            $subjects = []; // make a container and store the fetch subject in this array []
            foreach($student_teachers as $student_teacher)
            {
                // get the teacher by teacher id
                $teacher = Teacher::where('id', $student_teacher->teacher_id)->first();

                // get the assigned subjects by teacher id
                $subject =  $teacher::with('subject')->get();

                // push the subjects to the array[]
                array_push($subjects, $subject);
            }
            
            return response()->json($subjects);
        }
    }

    

    public function grade_display_grades_subjects_by_student_id(){

        $student_grades = DB::table('grades')
        ->leftJoin('subjects','grades.subject_id','subjects.id')
        ->leftJoin('quarter','grades.quarter_id','quarter.id')
        ->leftJoin('teachers','grades.subject_teacher_id','teachers.id')
        ->leftJoin('student_grade','grades.student_grade_id','student_grade.id')
        ->where('student_grade.student_id',1)
        ->get();

return response()->json($student_grades);
    }
}
