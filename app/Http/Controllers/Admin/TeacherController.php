<?php
namespace App\Http\Controllers\Admin;

use App\Exports\TeacherExport;
use App\Models\Quarter;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use App\Imports\TeacherImport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\StudentFeeController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    
    public function index()
    {

        if(request()->ajax()) {

            $teachers = Teacher::all();

            return DataTables::of($teachers)
                   ->addIndexColumn()
                //    ->addColumn('teacher_avatar', function($row) {
                //         $img = "<img class='img-thumbnail' src='/storage/uploads/teacher/$row->teacher_avatar' alt='teacher_avatar' width='100'>";
                //         return $img;
                //    })
                   ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="text-decoration-none" onclick="showTeacher('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none" onclick="editTeacher('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class=" text-danger text-decoration-none  deleteTeacher" onclick="crud_delete(\' '.'a.deleteTeacher'.' \' , \'teacher.destroy\', \' '.'Teacher Deleted'.' \' , \' '.'.teacher_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';
    
                    return $btn;
               })
                ->rawColumns(['actions'])
                ->make(true);
        }
        
        return view('teacher.index');
    }

    public function create()
    {
        if(request()->ajax())
        {
            return $this->res(GradeLevel::all());
        }
    }


    public function store(TeacherRequest $request)
    {
        $teacher_form_data = $request->validated();

        if(request()->ajax()) 
        {
            if(request()->hasFile('teacher_avatar')) 
            {
                  // check if the request has an image file
                    $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                    request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
            }

            Teacher::create($teacher_form_data);

            return $this->success();

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
            
            $ay = AcademicYearController::getAcademicYear();
            $teacher_subjects = DB::table('section_subject')
                                ->join('subjects', 'subject_id', 'subjects.id')
                                ->join('teachers', 'teacher_id', 'teachers.id')
                                ->join('sections', 'section_id', 'sections.id')
                                ->select('subjects.*', DB::raw("sections.name as section, sections.id as section_id"))
                                ->where('teacher_id', $teacher->id)
                                ->get();


            
            return $this->res([$teacher, $teacher->section, $teacher_subjects]); // params (teacher, section, subjects)
        }
    }

    public function teacher_display_students_by_section_id(Section $section)
    {
        if(request()->ajax())
        {
            $ay = AcademicYearController::getAcademicYear();
            
            //Only display students who paid the downpayment
          //  Join section and students of that section and student fee
   
            $students = StudentFeeController::getStudentHasDownpayment();

            return $this->res($students); // display students by teacher's section_id
        }
    }

    public function edit(Teacher $teacher)
    {
        if(request()->ajax()) {
            return $this->res($teacher);
        }
    }

    public function update(Teacher $teacher, TeacherRequest $request)
    {
        $teacher_form_data = $request->validated();

        if(request()->ajax()) {
            if(request()->hasFile('teacher_avatar')) {
                $teacher_form_data['teacher_avatar'] = request('teacher_avatar')->getClientOriginalName(); // get only the original file_name 
                if($teacher->teacher_avatar) 
                {
                    Storage::delete("/public/uploads/teacher/$teacher->teacher_avatar");
                }
                request('teacher_avatar')->storeAs('uploads/teacher', $teacher_form_data['teacher_avatar'], 'public' );  // params: fileFolder , fileName , filePath
                return $this->res($teacher->update($teacher_form_data));
            }
            else {
                return $this->res($teacher->update($teacher_form_data));
            }
        }   
    }

    public function destroy(Teacher $teacher)
    {
        if(request()->ajax()) {

            $teachers =  Teacher::whereIn('id', request('id'))->get();
                         Teacher::whereIn('id', request('id'))->delete();

            foreach($teachers as $teacher): 

                $this->log_activity($teacher, 'deleted', 'Teacher', $teacher->first_name. "" . $teacher->last_name);

            endforeach;

            return $this->success();
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
            return $this->res($gl);
        }
    }


    public function teacher_subject2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return $this->res($gradeLevel->subject);
        }
    }

    public function teacher_student2_display_subjects_by_teacher_grade_level_id(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return $this->res($gradeLevel->student);
        }
    }

    public function teacher_assign_subject_to_student_display_teachers()
    {
        if(request()->ajax())
        {
            return $this->res(Teacher::all());
        }
    }

    public function teacher_assign_subject_to_student_display_sections(Teacher $teacher)
    {
        if(request()->ajax())
        {
            return $this->res([$teacher->section, $teacher->student, $teacher->subject]);
        }
    }

    public function teacher_assign_sections_display_sections()
    {
        if(request()->ajax())
        {
            return $this->res(Section::all());
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

            if($teacher_section)
            {
                return response()->json('error');
            }
  
            DB::table('section_teacher')->insert([
               'teacher_id' => $assign_teacher_section['teacher_id'],
               'section_id' => $assign_teacher_section['section_id'],
               'created_at' => now()
            ]);

            return $this->res('success');
        }


        
    }

    
    //Display section by teacher id
    public function display_section_by_teacher(Teacher $teacher){
      
        if(request()->ajax()) {
        return $this->res($teacher->section);
        }    
    }

    //Display Subjects by Sections Grade Level Id

    //Todo Once the subject already assigned it wont display
    public function display_subjects_by_grade_level_id(Section $section)
    {

        $grade_level_subj = []; // grade level subject containter    

        $grade_level_subject_id = DB::table('grade_level_subject')
                                ->where('grade_level_id', $section->grade_level->id)
                                ->get(); // select all assigned subjects(subject_ID) by Section's grade level id on grade_level_subject TABLE
        
        if($grade_level_subject_id->count() > 0) // if there is a result then loop and extract each row and push to the subject container[]
        {
            foreach($grade_level_subject_id as $subject_ids): 

                array_push($grade_level_subj, $subject_ids->subject_id); // push to the subject container[]

            endforeach;

             $subjects = Subject::whereIn('id', $grade_level_subj)->get(); // select all subject that has equivalent subject id's on the subject container[]


             // after getting the grade level subject 
            // select the section_subject and get the subjects that are assigned to the specific section 

             $section_subject_ids = DB::table('section_subject')
                                    ->select('subject_id')
                                    ->where('section_id',$section->id)
                                    ->get();
            $section_sub = []; // section subject container []
            $subs= []; // subject container []

            foreach($section_subject_ids as $subject_id):
                array_push($section_sub, $subject_id->subject_id);  // loop through section_subject table and get individual assigned subjects ( subject_id)
            endforeach;

            foreach($subjects as $subjs):
                array_push($subs, $subjs->id); // get the selected grade_level_subjects and store to the subs[] container
            endforeach;

            $results = array_diff($subs, $section_sub); // get its differences 

            $result_subject = Subject::whereIn('id',$results)->get(); // after getting the unique id's select the subjects using the unique results[subject id] 


            return $this->res($result_subject); // display
        }
    }

    //Store assigned subjects by teacher section id
    public function store_subjects_by_grade_level_id(){


        if(request()->ajax()) {

           // passing multiple insertion (subject_id) 
           // loop 
           //will look for subject null value and update the first occurence otherwise insert new data

           foreach(request('subject_id') as $subject_id): 


                $stored_subject_id = DB::table('section_subject')
                ->where('subject_id',$subject_id)
                ->where('section_id',request('section_id'))
                ->where('teacher_id',request('teacher_id'))
                ->first();

                if($stored_subject_id){
                    return $this->err();
                }

                DB::table('section_subject')
                ->updateOrInsert(
                 ['section_id' => request('section_id'), 'teacher_id' => request('teacher_id'),'subject_id'=>NULL],
                 ['subject_id' => $subject_id,'created_at'=>now()]
            );


                //Get student grade ids that belongs to a section
               $student_grade_ids =  DB::table('student_grade')
                                     ->join('students','student_grade.student_id','students.id')  
                                     ->select('student_grade.id')
                                     ->where('students.section_id',request('section_id')) 
                                     ->distinct()
                                     ->get();
           


              if($student_grade_ids){ 
               foreach($student_grade_ids as $id):

                            DB::table('grades')->updateOrInsert(
                                [
                                    'subject_id' => $subject_id,
                                    'student_grade_id'=> $id->id
                                ],
                                [
                                    'subject_teacher_id' => request('teacher_id')
                                ]
                            );

                            DB::table('grades')
                            ->where('student_grade_id',$id->id)
                            ->where('subject_id',NULL)
                            ->delete();


                endforeach;
              
            
            
            
            }

               
           endforeach;
         

        }
        return $this->res('success');
    }


    public function teacher_destroy_section(Teacher $teacher, Section $section)
    {
        if(request()->ajax())
        {
            //  get the teacher_section row by teacher_id and section_id 
       
            $teacher_section = DB::table('section_teacher')
                                  ->where('section_id', $section->id)
                                  ->where('teacher_id', $teacher->id)
                                  ->delete();
                                  // delete section_teacher

            $teacher_subject = DB::table('section_subject')
                                 ->where('section_id', $section->id)
                                 ->where('teacher_id', $teacher->id)
                                 ->delete();
                                 // after deleting of section_Teacher automatically delete its subjects (section_subject) 
                                 return $this->success();

        }
    }

    public function teacher_destroy_section_subject(Teacher $teacher , Subject $subject, Section $section)
    {
        if(request()->ajax())
        {
            $teacher_section_subject = DB::table('section_subject')
                                            ->where('section_id', $section->id)
                                            ->where('teacher_id', $teacher->id)
                                            ->where('subject_id', $subject->id)
                                            ->update(['subject_id' => NULL]);

                                            return $this->success();
        }
    }

    // display all teachers in teacher_assign_grade_to_subject_display_teachers modal
    public function teacher_assign_grade_to_subject_display_teachers()
    {
        if(request()->ajax())
        {
            $grade_level = GradeLevel::all();
            $quarters = Quarter::all();

            return $this->res([$grade_level,$quarters]);
        }
    }

     // display all sections in teacher_assign_grade_to_subject_display_teachers modal by teacher_ID
     public function teacher_assign_grade_to_subject_display_sections_by_teacher_id($id)
     {
         if(request()->ajax())
         {
             
            $sections = Section::where('grade_level_id',$id)->get();
             return $this->res($sections);
         }
     }

     public function teacher_assign_grade_to_subject_display_students_by_section_id(Section $section)
     {
         if(request()->ajax())
         {
           // $ay = AcademicYearController::getAcademicYear();
            //get student according to academic year 
            $students = StudentFeeController::getStudentHasDownpayment();
            return $this->res($students);
         }
     }

     // get all  subjects that the teacher assign to the specific section 
     public function teacher_assign_grade_to_subject_display_subjects_by_teacher_and_section_id(Section $section)
     {
         if(request()->ajax())
         {

            $student_id = request()->student_id;

             $get_subject_ids = DB::table('section_subject')
                         //->where('teacher_id', $teacher->id)
                         ->where('section_id', $section->id)
                         ->get();

             $subject_ids = []; // container for subject id

             

             foreach($get_subject_ids as $subject_id): 

                    array_push($subject_ids, $subject_id->subject_id);

             endforeach;


             $student_grade_id = DB::table('student_grade')->where('student_id',$student_id)->first();

             $core_values = DB::table('values')
                              ->leftJoin('descriptions', 'values.id','descriptions.values_id' )
                              ->leftJoin('student_values','descriptions.id','student_values.description_id')
                       
                            ->select('values.title','student_values.student_id','student_values.adviser_id','student_values.q1','student_values.q2','student_values.q3','student_values.q4','descriptions.description',DB::raw("values.id as values_id , descriptions.id as description_id"))
                              ->orderBy('values.id', 'asc')
                              ->where('student_values.student_id',$student_grade_id->student_id)
                              ->orWhere('student_values.description_id',NULL)
                              ->get(); // get student core values
            
             $subjects = DB::table('subjects')
                            ->join('section_subject','subjects.id','section_subject.subject_id')
                            ->join('grades','subjects.id','grades.subject_id')
                            ->select('section_subject.subject_id','subjects.name','grades.id','grades.quarter_1','grades.quarter_2','grades.quarter_3','grades.quarter_4','section_subject.section_id','grades.subject_teacher_id','grades.is_approve', 'grades.student_grade_id','grades.viewable')
                            ->where('section_subject.section_id',$section->id)
                            ->where('grades.student_grade_id',$student_grade_id->id)                            
                            ->get(); 
           
            $student = Student::where('id', request('student_id'))->first(); // get the specific student 
           


             //Get quarter to be approved from is_approved column in grades table
             foreach ($subjects as $is_approved):
                $quarters_to_be_approved[] = explode(",",$is_approved->is_approve);

             endforeach;   
             
                         return $this->res([$student, $subjects, $core_values]); // return subjects[] , student
         }
     }

     public function enable_grade_to_be_viewable($id)
     {
         if(request()->ajax())
         {

            DB::table('grades')->where('student_grade_id', $id)->update(['viewable' => request('viewable')]);

            return $this->success();
         }
     }

        // TODO VALUES ()


    public function teacher_assign_values_to_student()
    {

        if(request()->ajax())
        {

            $data = request()->validate([
                'student_id' => '',
                'adviser_id' => '',
                'description_id' => '',
                'quarter' => '',
                'values' => ''
            ]);


            $quarter = 0;
                        
            if($data['quarter'] == 1)
            {
                $quarter = 'q1';
            }
            else if($data['quarter'] == 2)
            {
                $quarter = 'q2';
            }
            else if($data['quarter'] == 3)
            {
                $quarter = 'q3';
            }
            else
            {
                $quarter = 'q4';
            }

            $ay = get_latest_academic_year(); // get latest academic_year

            DB::table('student_values')
            ->updateOrInsert(
                [
                    'student_id' => $data['student_id'],
                    'adviser_id' => $data['adviser_id'],
                    'description_id' => $data['description_id'],
                    'academic_year_id' => $ay->id
                ],
                [
                    $quarter => $data['values'],
                    'created_at' => now()
                ]
            );

           return $this->success();
        }
    }
 
    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['teachers' => "file|max:5000|mimes:xlsx,csv"]);

            $file = $request->file('teachers');
            Excel::import(new TeacherImport, $file);
            return $this->success();
        }
    }

    public function export() 
    {
        return Excel::download(new TeacherExport, 'exp_teacher.xlsx');

        //  return $this->res();
    }

    public function truncate()
    {
        if(request()->ajax())
        {
            $data = request()->validate(['password'=> 'required']);
            $admin = get_admin_pw();

            // check if the given password is equal to the super admin password
            if(Hash::check($data['password'], $admin['password']))
            {
                $teacher = Teacher::latest()->first();

                Teacher::query()->delete();

                $this->log_activity($teacher, 'Deleted all', 'Teacher Record','','');
                
                return $this->success();
            }
            else
            {
                return $this->danger();
            }

        }
    }

}