<?php

namespace App\Http\Controllers\User;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {

            $section_teacher = DB::table('section_teacher')
                               ->where('teacher_id', auth()->user()->teacher_id)
                               ->get(); // get teacher's designated sections 

            $sections = [];

            foreach($section_teacher as $section): 

                    array_push($sections, $section->section_id); // store each fetch section ids []

            endforeach;

            $teacher_students = Student::with('section')->whereIn('section_id', $sections)->get();

            return DataTables::of($teacher_students)
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showStudent" onclick="showStudent('.$row->id.')"><i class="fas fa-plus-circle"></i> Add Grade</a>';

                    return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('users.teacher.index');
    }
}
