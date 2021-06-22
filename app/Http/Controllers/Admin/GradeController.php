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
                'student_id' => 'required',
                'subject_id' => 'required|array',
                'subject_id .*' => 'required|string',
                'grade' => 'required|array',
                'grade .*' => 'required|float',

            ]);

            foreach (array_combine(request('subject_id'), request('grade')) as $subject_id => $grade):

                $inputs = ['student_id' => $data['student_id'],
                                    'subject_id' => $subject_id,
                                    'grades' => $grade];

                Grade::create($inputs);

            endforeach;


            return response()->json('success');
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
