<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentExport;
use App\Models\Section;
use App\Models\Student;
use App\Models\GradeLevel;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    
    public function index()
    {
        

        if(request()->ajax()) {
            
            $students = DB::table('sections')
                        ->join('students', 'section_id', '=' , 'sections.id')
                        ->select('students.*', 'sections.name')
                        ->get();

            return DataTables::of($students)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="text-decoration-none" onclick="showStudent('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none" onclick="editStudent('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-danger text-decoration-none deleteStudent" onclick="crud_delete(\' '.'a.deleteStudent'.' \' , \'student.destroy\', \' '.'Student Deleted'.' \' , \' '.'.student_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';
        
                        return $btn;
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('student.index');
    
    }

    public function create()
    {
        if(request()->ajax())
        {
            return $this->res(Section::all());
        }
    }

    public function store(StudentRequest $request)
    {
        $student_form_data = $request->validated();

        if(request()->ajax()) 
        {
            if(request()->hasFile('student_avatar')) 
            {
                // check if the request has an imagefile

                $student_form_data['student_avatar'] = request('student_avatar')->getClientOriginalName(); // get the original file name
                request('student_avatar')->storeAs('uploads/student', $student_form_data['student_avatar'], 'public' ); // params: fileFolder, fileName , filePath
                
            }
               //Insert student data here
                $student_data = Student::create($student_form_data);
                
                //Get Current Academic Year ID
                $ay_id = AcademicYear::select('id')->where('status',1)->first();


                DB::table('student_subject_teacher')
                ->updateOrInsert(
                    [ 'section_id' => $student_data->section_id],
                    ['student_id' => $student_data->id]
                );


                //Insert ay_id, student_id, adviser_id on student_grade    
                $academic_year = AcademicYear::where('status',1)->first();

                //Get Adviser ID through section_id
                $adviser_id = Section::where('id',$student_form_data['section_id'])->first();
                
                $student_grade_id = DB::table('student_grade')->insertGetId([
                    'academic_year_id'=>$academic_year->id,
                    'adviser_id'=>$adviser_id->adviser_id,
                    'student_id'=>$student_data->id
                ]);
            
        
                //Populate grades here
                $get_subjects_and_teachers_id = DB::table('section_subject')->where('section_id',$student_form_data['section_id'])->get();
            
                $get_section_grade_level = DB::table('sections')
                                        ->join('grade_levels','sections.grade_level_id','grade_levels.id')
                                        ->select('grade_levels.grade_val')
                                        ->where('sections.id',$student_data->section_id)
                                        ->first();

            
        

                //If no subjects and teachers exist    
                if($get_subjects_and_teachers_id->count() == 0)
                {
                    DB::table('grades')->insert(['student_grade_id'=>$student_grade_id]);
                    
                }
        

                //if there is already existing section with subjects the newly added student will populate the Grades Table
                
                foreach ($get_subjects_and_teachers_id as $subject_teacher_id):
                    DB::table('grades')->insert([
                        'student_grade_id'=>$student_grade_id,
                        'subject_id'=>$subject_teacher_id->subject_id,
                        'subject_teacher_id'=>$subject_teacher_id->teacher_id,
                        'grade_level_val' => $get_section_grade_level->grade_val,
                    ]);
                endforeach;    
            

                // trigger activity log

                $this->log_activity($student_data, 'created', 'Student', $student_data->first_name." ".$student_data->last_name);


                return $this->success();
                
        }

    }

    public function show(Student $student) 
    {
        if(request()->ajax())
        {
            
            $student_profile =  Student::with('parents')->where('id', $student->id)->first(); // student with assigned parent

            $student_grade =  $student->section->grade_level;

            $student_section = $student->section;
            
            $grade_level = GradeLevel::find($student->section->id)->first();

            $student_guardian = $student->parents; // get student's parent
          

            $student_subject_teacher = DB::table('section_subject')
                                       ->join('teachers', 'teacher_id', 'teachers.id')
                                       ->join('subjects', 'subject_id', 'subjects.id')
                                       ->join('sections', 'section_id', 'sections.id')
                                       ->select('subjects.name', 'subjects.description', 'teachers.first_name' , 'teachers.last_name')
                                       ->where('section_id', $student->section_id)
                                       ->get();
                               
                            

            return $this->res([$student_profile, $student_section, $student_grade, $student_subject_teacher]);
          
        }
    }

    public function edit(Student $student)
    {
        if(request()->ajax())
        {
            return $this->res([$student,Section::all(), $student->section->name]);
        }
    }

    public function update(Student $student, StudentRequest $request)
    {

        $student_form_data = $request->validated();

        if(request()->ajax())
        {
            if(request()->hasFile('student_avatar'))
            {
                $student_form_data['student_avatar'] = request('student_avatar')->getClientOriginalName(); // get only the original file_name

                //check if the student has an avatar 
                if($student->student_avatar) 
                {
                    Storage::delete("/public/uploads/student/$student->student_avatar");
                }
                request('student_avatar')->storeAs('uploads/student', $student_form_data['student_avatar'], 'public'); //params: fileFolder , fileName , filePath
                
                $this->log_activity($student,'updated','Student',$student->first_name." ". $student->last_name);
                $student->update($student_form_data);

                return response()->json('success');
                
            }
            else 
            {
                $this->log_activity($student,'updated','Student',$student->first_name." ". $student->last_name);
                $student->update($student_form_data);

                return $this->success();
            }
        }
    }

    public function destroy(Student $student)
    {
        if(request()->ajax())
        {
            $students =  Student::whereIn('id', request('id'))->get();
                         Student::whereIn('id', request('id'))->delete();

            foreach($students as $stud): 

                $this->log_activity($student, 'deleted', 'Student', $stud->first_name. "" . $stud->last_name);

            endforeach;

            return $this->success();
        }
    }

    public function display_student_teacher_subject($id)
    {
       if(request()->ajax())
       {
        $subjects = DB::select("SELECT b.id , b.first_name , b.last_name FROM subject_teacher a, teachers b , subjects c WHERE a.teacher_id = b.id AND a.subject_id = c.id AND c.id = $id");

        return $this->res($subjects);
       }
    }

    public function store_student_teacher_subject()
    {
      
        if(request()->ajax()) {
            $data = request()->validate([
                'student_id' => 'required',
                'subject_id' => 'required',
                'teacher_id' => 'required'
            ]);

            $student = DB::table('student_teacher')
                      ->where('student_id', $data['student_id'])
                      ->where('subject_id', $data['subject_id'])
                      ->get();

            // check if the student already have this subject
            if(!$student->count() > 0)
            {
                DB::table('student_teacher')->insert($data);
                return response()->json('success');
            }

        return response()->json('error');
        }
    }
    public function delete_student_teacher_subject($id)
    {
        if(request()->ajax()) {
            $subject = DB::table('student_teacher')
            ->where('id', $id);

            $subject->delete();
        }
    }

    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['students' => "file|max:5000|mimes:xlsx,csv"]);
            $file = $request->file('students');
            
            Excel::import(new StudentImport, $file);
            $imported_students = Student::where('is_imported',1)->get();
            $ay = AcademicYear::where('status',1)->first();
             
             
             
             //$adviser = Teachers::where('id',$adviser_id->adviser_id)->first();
            

            
             foreach($imported_students as $student)
             {
                $adviser_id = Section::where('id',$student->section_id)->first();
                if($adviser_id){
                    $insert_student = DB::table('student_grade')->insertGetId([
                        'academic_year_id'=>$ay->id,
                        'adviser_id'=>$adviser_id->adviser_id,
                        'student_id'=>$student->id,
                        'created_at'=>now(),
                    ]);
                }
                else
                {
                    $insert_student = DB::table('student_grade')->insertGetId([
                        'academic_year_id'=>$ay->id,
                        'student_id'=>$student->id,
                        'created_at'=>now(),
                    ]);
                }


                $get_subjects_and_teachers_id = DB::table('section_subject')->where('section_id',$student->section_id)->get();
   
                 $get_section_grade_level = DB::table('sections')
                            ->join('grade_levels','sections.grade_level_id','grade_levels.id')
                            ->select('grade_levels.grade_val')
                            ->where('sections.id',$student->section_id)
                            ->first();

                foreach ($get_subjects_and_teachers_id as $subject_teacher_id):
                    DB::table('grades')->insert([
                        'student_grade_id'=>$insert_student,
                        'subject_id'=>$subject_teacher_id->subject_id,
                        'subject_teacher_id'=>$subject_teacher_id->teacher_id,
                        'grade_level_val' => $get_section_grade_level->grade_val,
                    ]);
                endforeach;  
    

                    //If no subjects and teachers exist    
                    if($get_subjects_and_teachers_id->count() == 0)
                    {
                        DB::table('grades')->insert(['student_grade_id'=>$insert_student]);
                        
                    }
                      
                    
                $this->log_activity($student, 'created', 'Student', $student->first_name. " " . $student->last_name);
                                
                            
            }
                            
             Student::where('is_imported',1)->update(['is_imported'=>0]);

             
    
    //Populate grades here
    
    

         //if there is already existing section with subjects the newly added student will populate the Grades Table
        
   
    //************** */


                 return $this->success();
        }
    }

    public function export() 
    {
        return Excel::download(new StudentExport, 'exp_student.xlsx');
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
                $student = Student::latest()->first();
                Student::query()->delete();

                $this->log_activity($student, 'Deleted all', 'Student Record','','');
                
                return $this->success();
            }
            else
            {
                return $this->danger();
            }

        }
    }
}
