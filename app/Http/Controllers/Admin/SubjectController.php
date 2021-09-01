<?php
namespace App\Http\Controllers\Admin;

use App\Exports\SubjectExport;
use App\Models\Subject;
use App\Models\GradeLevel;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Imports\SubjectImport;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Subject::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showSubject" onclick="showSubject('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none" onclick="editSubject('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-danger text-decoration-none deleteSubject " onclick="crud_delete(\' '.'a.deleteSubject'.' \' , \'subject.destroy\', \' '.'Subject Deleted'.' \' , \' '.'.subject_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }

        return view('subject.index');
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
        
        $subject_form_data = request()->validate([
            'name' => 'required|string|unique:subjects',
            'description'=>'required|unique:subjects|string',
            'grade_val'=>'required'

        ]);

        if(request()->ajax()) 
        {

            $grade_level_val_and_id = explode(",",$subject_form_data['grade_val']);

            $subject = Subject::create([
                                            'name' => $subject_form_data['name'],
                                            'description' => $subject_form_data['description'],
                                            'grade_val' => $grade_level_val_and_id[0]
                                            ]) ;
        

            
            DB::table('grade_level_subject')->insert([
                'subject_id'=>$subject->id,
                'grade_level_id'=>$grade_level_val_and_id[1],
                'created_at'=>now(),
            ]);

            //Enter Subject to its corresponding Grade Level
  
           $this->log_activity($subject,'created','Subject',$subject->name);
           return $this->success();
        }
    }

   
    public function show(Subject $subject)
    {
        if(request()->ajax())
        {
            return $this->res($subject);
        }
    }

    public function edit(Subject $subject) 
    {
        
        if(request()->ajax())
        {
            // $recent_subject = $subject->grade_level->first();
            $recent_subject_by_grade_val = GradeLevel::where('grade_val', $subject->grade_val)->first();
            $grades = GradeLevel::all();

            return $this->res([$subject,$grades, $recent_subject_by_grade_val]);
        }
    }

    public function update(Subject $subject)
    {
        $subject_form_data = request()->validate([
            'name' => 'required|string',
            'description'=>'required|string',
            'grade_val'=>'',
        ]);

        if(request()->ajax()) 
        {
            //Subject Update    
            $subject->update($subject_form_data); 

           $this->log_activity($subject,'updated','Subject',$subject->name);

           return $this->success();
        
        }
    }

    public function destroy(Subject $subject)
    {
        if(request()->ajax()) 
        {
            
           $subjects =  Subject::whereIn('id', request('id'))->get();
                        Subject::whereIn('id', request('id'))->delete();

           
           foreach($subjects as $sub): 

                $this->log_activity($subject, 'deleted', 'Subject', $sub->name);

           endforeach;

           return $this->success();
           
        }
    }

   

    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['subjects' => "file|max:5000|mimes:xlsx,csv"]);
            $file = $request->file('subjects');
            Excel::import(new SubjectImport, $file);

            $get_imported_subjects = Subject::where('is_imported', 1)->get();

            foreach($get_imported_subjects as $subject): 

                $grade_level = GradeLevel::where('grade_val', $subject->grade_val)->first();

                DB::table('grade_level_subject')->insert([
                                                            'subject_id' => $subject->id,
                                                            'grade_level_id' => $grade_level->id]);


            endforeach;


            return $this->success();
        }
    }

    public function export() 
    {
        return Excel::download(new SubjectExport, 'exp_subject.xlsx');

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
                $subject = Subject::latest()->first();

                Subject::query()->delete();

                $this->log_activity($subject, 'Deleted all', 'Subject Record','','');
                
                return $this->success();
            }
            else
            {
                return $this->danger();
            }

        }
    }
   
}
