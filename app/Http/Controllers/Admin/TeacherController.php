<?php
namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use App\Imports\TeacherImport;
use App\Models\SubjectStudent;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    
    public function index()
    {

        if(request()->ajax()) {

            $teachers = Teacher::all();

            return DataTables::of($teachers)
                   ->addIndexColumn()
                   ->addColumn('teacher_avatar', function($row) {
                        $img = "<img class='img-thumbnail' src='/storage/uploads/teacher/$row->teacher_avatar' alt='teacher_avatar' width='100'>";
                        return $img;
                   })
                   ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm  showTeacher" onclick="showTeacher('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary  btn-sm editTeacher" onclick="editTeacher('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm  deleteTeacher" onclick="crud_delete(\' '.'a.deleteTeacher'.' \' , \'teacher.destroy\', \' '.'Teacher Deleted'.' \' , \' '.'.teacher_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';
    
                    return $btn;
               })
                ->rawColumns(['teacher_avatar' , 'actions'])
                ->make(true);
        }
        
        return view('teacher.index');
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
        $teacher_form_data = request()->validate([
            'first_name' => 'required|alpha',
            'middle_name' => 'required',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => 'required|email',
            'teacher_avatar' => 'image',

        ]);
        if(request()->ajax()) {
            if(request()->hasFile('teacher_avatar')) {
                  // check if the request has an image file
                    $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                    request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
                    return response()->json(Teacher::create($teacher_form_data));
            }
        }
    }

    public function show(Teacher $teacher)
    {
        /**
         * TODO display teacher 
         * display his/her student
         * display his/her section 
         * display his/her subjects
         */
    
        if(request()->ajax()) {
            
            return response()->json([$teacher, $teacher->section]); // params (teacher, section)
        }
    }

    public function teacher_display_students_by_section_id(Section $section)
    {
        if(request()->ajax())
        {
            return response()->json($section->student); // display students by teacher's section_id
        }
    }

    public function edit(Teacher $teacher)
    {
        if(request()->ajax()) {
            return response()->json($teacher);
        }
    }

    public function update(Teacher $teacher)
    {
        $teacher_form_data = request()->validate([
            'first_name' => 'required|alpha',
            'middle_name' => 'required',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => 'required|email',
            'teacher_avatar' => 'image',
        ]);

        if(request()->ajax()) {
            if(request()->hasFile('teacher_avatar')) {
                $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                if($teacher->teacher_avatar) 
                {
                    Storage::delete("/public/uploads/teacher/$teacher->teacher_avatar");
                }
                request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
                return response()->json($teacher->update($teacher_form_data));
            }
            else {
                return response()->json($teacher->update($teacher_form_data));
            }
        }   
    }

    public function destroy(Teacher $teacher)
    {
        if(request()->ajax()) {

            Teacher::whereIn('id', request('id'))->delete();
            return $this->res();
        }
    }



/** TODO Student Teacher */

public function teacher_store_student()
{
    if(request()->ajax()) 
    {
            // check if the student is already enroled

        $student = DB::table('student_teacher')
                        ->where('student_id', request('student_id'))
                        ->where('teacher_id', request('teacher_id'))
                        ->get();


        $is_enrolled = DB::table('student_fee')->where('student_id', request('student_id'))->where('status', 'active')->first();

        if($is_enrolled)
        {
            // check if the student is already assigned to this specific teacher 
            if(!$student->count() > 0) 
            {

                $data = ['teacher_id' => request('teacher_id')];
                foreach(request('student_id') as $student_id) {

                $data['student_id'] = $student_id;
                $s = DB::table('student_teacher')->insert($data);
                }

                return response()->json('success');
            }

            return response()->json('error');
        }
    
        return response()->json('not enrolled');
                        

    }
} 


public function teacher_destroy_student()
{
    
    if(request()->ajax())
    {
       
        DB::table('student_teacher')
            ->where('teacher_id','=', request('teacher_id') )
            ->where('student_id','=', request('student_id') )
            ->delete();
    }
}

// end

/** TODO  Assign subjects to teacher */
    public function teacher_store_subject()
    {
        if(request()->ajax())
        {
           

            $input = request()->all(); // subject ids array()
          // return response()->json($input['subject_id']);
            
        //Check if teacher has been assigned to a subject
          
        $sub_id = DB::table('subject_teacher')->select()
        ->where('subject_id',$input['subject_id'])
        ->where('teacher_id',$input['teacher_id'])
        ->first();
          if(!$sub_id){
            foreach($input['subject_id'] as $subject_id){
                
                

                DB::table('subject_teacher')->insert([
                    'teacher_id' => $input['teacher_id'],
                    'subject_id' => $subject_id,
                    'created_at' => now()
                 ]);
            }
 

           return response()->json('success');
             
          }
          return response()->json(response());
          
        }
    } //end


    public function teacher_destroy_subject(Teacher $teacher, Subject $subject)
    {
        if (request()->ajax())
        {
             $subject_teacher_id = DB::table('subject_teacher')
                                ->where('teacher_id','=', $teacher->id)
                                ->where('subject_id', '=', $subject->id)
                                ->delete();
        }
    }


    /**TODO TEACHER SUBJECT II && TEACHER STUDENT II */

    public function teacher_create_subject_2()
    {
        if(request()->ajax())
        {

            return response()->json([Teacher::all()]);
        }
    }

    public function teacher_teacher_display_grade_level_by_teacher_id(Teacher $teacher)
    {
        if(request()->ajax())
        {
            $gl = [];

            //teacher->section returns a collection 
            // extract its individual value via loop
            // return section value 
            // you can now get the invidual section value with a invidiual grade level value (thru relationship);


            foreach($teacher->section as $section): 
                    array_push($gl, $section->grade_level);
            endforeach;
            //distinct 
           // $grade_levels = array_unique($gl);
            return response()->json($gl);
        }
    }

    public function teacher_display_by_teacher_id(Teacher $teacher)
    {
        if(request()->ajax())
        {

            return response()->json('here');
        }
    }

    public function teacher_subject2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel->subject);
        }
    }

    public function teacher_student2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel->student);
        }
    }

    public function teacher_assign_subject_to_student_display_teachers()
    {
        if(request()->ajax())
        {
            return response()->json(Teacher::all());
        }
    }

    public function teacher_assign_subject_to_student_display_sections(Teacher $teacher)
    {
        if(request()->ajax())
        {
            return response()->json([$teacher->section, $teacher->student, $teacher->subject]);
        }
    }

    public function teacher_assign_sections_display_sections()
    {
        if(request()->ajax())
        {
            return response()->json(Section::all());
        }
    }

    public function teacher_assign_section()
    {

       

        $assign_teacher_section = request()->validate([
            'section_id' => 'required',
            'teacher_id'=>'required',

            // 'grade_level_id'=>'required|string' removed
        ]);



        if(request()->ajax()) {

            $teacher_section = DB::table('section_teacher') //check if teacher already assigned to a section
                ->where('section_id',$assign_teacher_section['section_id'])
                ->where('teacher_id',$assign_teacher_section['teacher_id'])
                ->first();

//            return response()->json($id);

            if($teacher_section)
            {
                return response()->json('error');
            }


           
            DB::table('section_teacher')->insert([
               'teacher_id' => $assign_teacher_section['teacher_id'],
               'section_id' => $assign_teacher_section['section_id'],
               'created_at' => now()
            ]);

            return response()->json('success');
        }
    }















    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['teachers' => "file|max:5000|mimes:xlsx,csv"]);

            $file = $request->file('teachers');
            Excel::import(new TeacherImport, $file);
            return response()->json('success');
        }
    }

}

    
                    return $btn;
               })
                ->rawColumns(['teacher_avatar' , 'actions'])
                ->make(true);
        }
        
        return view('teacher.index');
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
        $teacher_form_data = request()->validate([
            'first_name' => 'required|alpha',
            'middle_name' => 'required',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => 'required|email',
            'teacher_avatar' => 'image',

        ]);
        if(request()->ajax()) {
            if(request()->hasFile('teacher_avatar')) {
                  // check if the request has an image file
                    $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                    request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
                    return response()->json(Teacher::create($teacher_form_data));
            }
        }
    }

    public function show(Teacher $teacher)
    {
        /**
         * TODO display teacher 
         * display his/her student
         * display his/her section 
         * display his/her subjects
         */
    
        if(request()->ajax()) {
            
            return response()->json([$teacher, $teacher->section]); // params (teacher, section)
        }
    }

    public function teacher_display_students_by_section_id(Section $section)
    {
        if(request()->ajax())
        {
            return response()->json($section->student); // display students by teacher's section_id
        }
    }

    public function edit(Teacher $teacher)
    {
        if(request()->ajax()) {
            return response()->json($teacher);
        }
    }

    public function update(Teacher $teacher)
    {
        $teacher_form_data = request()->validate([
            'first_name' => 'required|alpha',
            'middle_name' => 'required',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => 'required|email',
            'teacher_avatar' => 'image',
        ]);

        if(request()->ajax()) {
            if(request()->hasFile('teacher_avatar')) {
                $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                if($teacher->teacher_avatar) 
                {
                    Storage::delete("/public/uploads/teacher/$teacher->teacher_avatar");
                }
                request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
                return response()->json($teacher->update($teacher_form_data));
            }
            else {
                return response()->json($teacher->update($teacher_form_data));
            }
        }   
    }

    public function destroy(Teacher $teacher)
    {
        if(request()->ajax()) {
            $teacher->delete();
        }
    }



/** TODO Student Teacher */

public function teacher_store_student()
{
    if(request()->ajax()) 
    {
            // check if the student is already enroled

        $student = DB::table('student_teacher')
                        ->where('student_id', request('student_id'))
                        ->where('teacher_id', request('teacher_id'))
                        ->get();


        $is_enrolled = DB::table('student_fee')->where('student_id', request('student_id'))->where('status', 'active')->first();

        if($is_enrolled)
        {
            // check if the student is already assigned to this specific teacher 
            if(!$student->count() > 0) 
            {

                $data = ['teacher_id' => request('teacher_id')];
                foreach(request('student_id') as $student_id) {

                $data['student_id'] = $student_id;
                $s = DB::table('student_teacher')->insert($data);
                }

                return response()->json('success');
            }

            return response()->json('error');
        }
    
        return response()->json('not enrolled');
                        

    }
} 


public function teacher_destroy_student()
{
    
    if(request()->ajax())
    {
       
        DB::table('student_teacher')
            ->where('teacher_id','=', request('teacher_id') )
            ->where('student_id','=', request('student_id') )
            ->delete();
    }
}

// end

/** TODO  Assign subjects to teacher */
    public function teacher_store_subject()
    {
        if(request()->ajax())
        {
           

            $input = request()->all(); // subject ids array()
          // return response()->json($input['subject_id']);
            
        //Check if teacher has been assigned to a subject
          
        $sub_id = DB::table('subject_teacher')->select()
        ->where('subject_id',$input['subject_id'])
        ->where('teacher_id',$input['teacher_id'])
        ->first();
          if(!$sub_id){
            foreach($input['subject_id'] as $subject_id){
                
                

                DB::table('subject_teacher')->insert([
                    'teacher_id' => $input['teacher_id'],
                    'subject_id' => $subject_id,
                    'created_at' => now()
                 ]);
            }
 

           return response()->json('success');
             
          }
          return response()->json(response());
          
        }
    } //end


    public function teacher_destroy_subject(Teacher $teacher, Subject $subject)
    {
        if (request()->ajax())
        {
             $subject_teacher_id = DB::table('subject_teacher')
                                ->where('teacher_id','=', $teacher->id)
                                ->where('subject_id', '=', $subject->id)
                                ->delete();
        }
    }


    /**TODO TEACHER SUBJECT II && TEACHER STUDENT II */

    public function teacher_create_subject_2()
    {
        if(request()->ajax())
        {

            return response()->json([Teacher::all()]);
        }
    }

    public function teacher_teacher_display_grade_level_by_teacher_id(Teacher $teacher)
    {
        if(request()->ajax())
        {
            $gl = [];

            //teacher->section returns a collection 
            // extract its individual value via loop
            // return section value 
            // you can now get the invidual section value with a invidiual grade level value (thru relationship);


            foreach($teacher->section as $section): 
                    array_push($gl, $section->grade_level);
            endforeach;
            //distinct 
           // $grade_levels = array_unique($gl);
            return response()->json($gl);
        }
    }

    public function teacher_display_by_teacher_id(Teacher $teacher)
    {
        if(request()->ajax())
        {

            return response()->json('here');
        }
    }

    public function teacher_subject2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel->subject);
        }
    }

    public function teacher_student2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel->student);
        }
    }

    public function teacher_assign_subject_to_student_display_teachers()
    {
        if(request()->ajax())
        {
            return response()->json(Teacher::all());
        }
    }

    public function teacher_assign_subject_to_student_display_sections(Teacher $teacher)
    {
        if(request()->ajax())
        {
            return response()->json([$teacher->section, $teacher->student, $teacher->subject]);
        }
    }

    public function teacher_assign_sections_display_sections()
    {
        if(request()->ajax())
        {
            return response()->json(Section::all());
        }
    }

    public function teacher_assign_section()
    {

       

        $assign_teacher_section = request()->validate([
            'section_id' => 'required',
            'teacher_id'=>'required',

            // 'grade_level_id'=>'required|string' removed
        ]);



        if(request()->ajax()) {

            $teacher_section = DB::table('section_teacher') //check if teacher already assigned to a section
                ->where('section_id',$assign_teacher_section['section_id'])
                ->where('teacher_id',$assign_teacher_section['teacher_id'])
                ->first();

//            return response()->json($id);

            if($teacher_section)
            {
                return response()->json('error');
            }

            DB::table('section_teacher')->insert([
               'teacher_id' => $assign_teacher_section['teacher_id'],
               'section_id' => $assign_teacher_section['section_id'],
               'created_at' => now()
            ]);

            return response()->json('success');
        }
    }



    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['teachers' => "file|max:5000|mimes:xlsx,csv"]);

            $file = $request->file('teachers');
            Excel::import(new TeacherImport, $file);
            return response()->json('success');
        }
    }

}
