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

        $student = auth()->user()->student_id;


        $student_subject_teacher = DB::select("SELECT DISTINCT b.first_name, b.last_name , c.name, c.description, b.id as teacher_id ,c.id as subject_id from students a ,teachers b,subjects c, student_teacher d,subject_teacher e where a.id = $student and d.student_id = $student and e.subject_id = c.id and d.teacher_id = e.teacher_id and b.id = e.teacher_id");


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
