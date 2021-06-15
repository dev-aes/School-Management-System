<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
                $subject =  $teacher->subject;

                // push the subjects to the array[]
                array_push($subjects, $subject);
            }
            

            return response()->json($subjects);
        }
    }
}
