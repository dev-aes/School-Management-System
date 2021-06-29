<?php

namespace App\Http\Controllers\User;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware(['auth', 'student']);
    }

    public function index() 
    {

        $student = Student::where('id', auth()->user()->student_id)->first();

        $student_subject_teacher = DB::table('section_subject')
                                        ->join('teachers', 'teacher_id', 'teachers.id')
                                        ->join('subjects', 'subject_id', 'subjects.id')
                                        ->join('sections', 'section_id', 'sections.id')
                                        ->select('subjects.name', 'subjects.description', 'teachers.first_name' , 'teachers.last_name','teachers.teacher_avatar')
                                        ->where('section_id', $student->section_id)
                                        ->get();

        return view('users.student.index', compact('student_subject_teacher'));
    }

    public function update(Student $student)
    {
        if(request()->ajax())
        {   
            $student_form_data = request()->validate(['student_avatar' => 'image'] );

            if(request()->hasFile('student_avatar')) {
                // check if the request has an image file
                 $student_form_data['student_avatar'] = request('student_avatar')->getClientOriginalName(); // get only the original file_name 
                  request('student_avatar')->storeAs('uploads/student',$student_form_data['student_avatar'] , 'public' );  // params: fileFolder , fileName , filePath
                  $student->update(['student_avatar' => $student_form_data['student_avatar']]);
                  return response()->json('success');
            }
        
        }
    }
}
