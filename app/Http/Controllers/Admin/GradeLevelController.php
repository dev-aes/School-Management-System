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

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(GradeLevel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="text-decoration-none" onclick="showGradeLevel('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none" onclick="editGradeLevel('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                  
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-decoration-none text-danger deleteGradeLevel" onclick="deleteGradeLevel('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';
                    // $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="AddSubject" class="text-decoration-none text-success  assignSubject" onclick="assign_subject('.$row->id.')"><i class="fas fa-plus-circle"></i> Add Subject</a>';

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
            $ay = get_latest_academic_year();
            $grade_level_form_data['academic_year_id'] = $ay->id;


            if(request()->ajax()) 
            {

                $gl = GradeLevel::create($grade_level_form_data);

                $this->log_activity($gl, 'created', 'Grade Level', $gl->name);

                return response()->json();
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

            $gradeLevel->update( $grade_level_form_data);

            $this->log_activity($gradeLevel, 'updated', 'Grade Level', $gradeLevel->name);

            return response()->json('success');
        }
    }

    public function destroy(GradeLevel $gradeLevel)
    {
        if(request()->ajax()) {

            $this->log_activity($gradeLevel, 'deleted', 'Grade Level', $gradeLevel->name);
            $gradeLevel->delete();

            return $this->res();
        }
    }

    // Todo display unadded subjects by grade level
    public function display_subjects_for_grade_level(GradeLevel $grade_level)
    {
        if(request()->ajax()){

            $subjects = DB::table('subjects')
                        ->leftJoin('grade_level_subject','subjects.id','grade_level_subject.subject_id')
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

                }
               
           endforeach;

           return $this->res(); // success msg
         
        }
    }

    // TODO destroy assigned subject

    function destroy_subject(GradeLevel $grade_level, Subject $subject)
    {
        if(request()->ajax())
        {

            $this->log_activity($grade_level, 'deleted', 'assigned Subject', $subject->name,'an');

            DB::table('grade_level_subject')
                ->where('grade_level_id', $grade_level->id)
                ->where('subject_id', $subject->id)
                ->delete();

                return $this->res(); // success
        }
    }


    

}
