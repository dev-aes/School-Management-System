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
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showSubject" onclick="showSubject('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editSubject" onclick="editSubject('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteSubject" onclick="deleteSubject('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

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
            'name' => 'required|string',
            'description'=>'required|string',
            'grade_val'=>'required'

            // 'grade_level_id'=>'required|string' removed
        ]);

        if(request()->ajax()) {

            $subject = Subject::create($subject_form_data);
            // DB::table('grade_level_subject')->insert([
            //   // 'grade_level_id' => request('grade_level_id'),
            //    'subject_id' => $subject->id,
            //    'created_at' => now()
            // ]);

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
            $recent_subject = $subject->grade_level->first();
            $grades = GradeLevel::all();

            return response()->json([$subject,$grades, $recent_subject]);
        }
    }

    public function update(Subject $subject)
    {
        $subject_form_data = request()->validate([
            'name' => 'required|string',
            'description'=>'required|string',
           

        ]);

        if(request()->ajax()) {
            

            // $sub =  DB::table('grade_level_subject')
            //       ->where('grade_level_id', $subject->grade_level[0]->id)
            //       ->where('subject_id',$subject->id)
            //       ->update(['grade_level_id' => request('grade_level_id')]);
               
            //Subject Update    
            $subject->update($subject_form_data); 

             // DB::update("UPDATE grade_level_subject set grade_level_id = $grade_level_id where ID = $sub->id");

           return response()->json('success');
        
        
        }
    }

    public function destroy(Subject $subject)
    {
        if(request()->ajax()) {
            $subject->delete();
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
