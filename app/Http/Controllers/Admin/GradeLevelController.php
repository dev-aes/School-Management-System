<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class GradeLevelController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(GradeLevel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showGradeLevel" onclick="showGradeLevel('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editGradeLevel" onclick="editGradeLevel('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteGradeLevel" onclick="deleteGradeLevel('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

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
                'description'=>'string'
            ]);
            
            $months_no = School::all('months_no')->first();
            $grade_level_form_data['months_no'] =  $months_no->months_no;
            if(request()->ajax()) 
            {
                return response()->json(GradeLevel::create($grade_level_form_data));
            }

        }
       
    }

    public function show(GradeLevel $gradeLevel)
    {
        if(request()->ajax())
        {
            return response()->json($gradeLevel);
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
            'description'=>'required|string'
        ]);

        if(request()->ajax()) {

            return response()->json($gradeLevel->update( $grade_level_form_data));
        }
    }

    public function destroy(GradeLevel $gradeLevel)
    {
        if(request()->ajax()) {
            $gradeLevel->delete();
        }
    }
}
