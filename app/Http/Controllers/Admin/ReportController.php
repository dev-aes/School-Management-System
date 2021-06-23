<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function index()
    {
        $academic_years = AcademicYear::all();
        return view('report.index', compact('academic_years'));
    }

    public function report_display_students_by_ay(AcademicYear $academic_year)
    {
        if(request()->ajax())
        {
            $get_student_ids = DB::table('student_fee')
                       ->select('student_id')
                       ->where('has_downpayment', 1)
                       ->where('academic_year_id', $academic_year->id)
                       ->get();

            $student_ids = []; // container for student_id

            foreach($get_student_ids as $student_id):

                array_push($student_ids, $student_id->student_id);

            endforeach;

            $result_student = Student::with('section')->whereIn('id', $student_ids)->get();

            return DataTables::of($result_student)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm " onclick="report_to_form_138_show_by_student_id('.$row->id.')"><i class="fas fa-eye"></i> Form 138</a>';

                return $btn;
       })
       ->rawColumns(['actions'])
       ->make(true);

        }
    }

    public function to_form_138_show_by_student_id(Student $student)
    {
        if(request()->ajax())
        {
            return $this->res();
        }
    }
}
