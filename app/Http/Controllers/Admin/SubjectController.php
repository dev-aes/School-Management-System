<?php
namespace App\Http\Controllers\Admin;
use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use App\Imports\SubjectImport;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Subject::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showSubject" onclick="showSubject('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editSubject" onclick="editSubject('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteSubject" onclick="crud_delete(\' '.'a.deleteSubject'.' \' , \'subject.destroy\', \' '.'Subject Deleted'.' \' , \' '.'.subject_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

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

        if(request()->ajax()) {

            $subject = Subject::create($subject_form_data);
           return $this->res();
        }
    }

   
    public function show(Subject $subject)
    {
        if(request()->ajax())
        {
            return response()->json($subject);
        }
    }

    public function edit(Subject $subject) 
    {
        
        if(request()->ajax())
        {
            // $recent_subject = $subject->grade_level->first();
            $recent_subject_by_grade_val = GradeLevel::where('grade_val', $subject->grade_val)->first();
            $grades = GradeLevel::all();

            return response()->json([$subject,$grades, $recent_subject_by_grade_val]);
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

           return response()->json('success');
        
        }
    }

    public function destroy(Subject $subject)
    {
        if(request()->ajax()) 
        {

            Subject::whereIn('id', request('id'))->delete();

            return $this->res();
           
        }
    }

    public function import(Request $request)
    {
        if(request()->ajax())
        {
            $data = $request->validate(['subjects' => "file|max:5000|mimes:xlsx,csv"]);
            
            $file = $request->file('subjects');
            Excel::import(new SubjectImport, $file);
            return response()->json('success');
        }
    }

   
}
