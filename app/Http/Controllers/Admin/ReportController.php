<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
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

            $student_grade_id = DB::table('student_grade')->where('student_id',$student->id)->first();

            $student_grades = DB::table('grades')
                                ->join('subjects','grades.subject_id','subjects.id')
                                ->select('grades.quarter_1','grades.quarter_2','grades.quarter_3','grades.quarter_4','grades.subject_id','grades.is_approve','subjects.name','grades.id','grades.subject_teacher_id')
                                ->where('student_grade_id',$student_grade_id->id)
                                ->get(); // get subjects, grades by quarter where student id is equal to the param $student

            $core_values = DB::table('values')
                                ->leftJoin('descriptions', 'values.id','descriptions.values_id' )
                                ->leftJoin('student_values','descriptions.id','student_values.description_id')
                                ->select('values.title','student_values.student_id','student_values.adviser_id','student_values.q1','student_values.q2','student_values.q3','student_values.q4','descriptions.description',DB::raw("values.id as values_id , descriptions.id as description_id"))
                                ->orderBy('values.id', 'asc')
                                ->where('student_values.student_id',$student_grade_id->student_id)
                                ->orWhere('student_values.description_id',NULL)
                                ->get(); // display student core values
            
            return $this->res([$student_grades, $core_values]);
          
        }
    }

    public function report_display_payments_by_ay(AcademicYear $academic_year)
    {
       if(request()->ajax())
       {
            $ay = get_latest_academic_year();

            $payments = DB::table('payments')
                            ->join('student_fee', 'payments.student_fee_id', 'student_fee.id')
                            ->select('payments.*')
                            ->where('student_fee.academic_year_id', $ay->id)
                            ->get();

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->make(true);
       }
    }

    public function report_display_teachers_by_ay(AcademicYear $academic_year)
    {
       if(request()->ajax())
       {
            $ay = get_latest_academic_year();

            $teachers = DB::table('grades')
                        ->join('student_grade', 'student_grade_id', 'student_grade.id')
                        ->select('grades.subject_teacher_id')
                        ->where('student_grade.academic_year_id', $ay->id)
                        ->get();

            $teachers_ids = [];

            foreach($teachers as $teacher):  // get all subject teacher's id
                    array_push($teachers_ids, $teacher->subject_teacher_id);
            endforeach;

            $get_teachers_by_ay = Teacher::whereIn('id', $teachers_ids)->get();

            return DataTables::of($get_teachers_by_ay)
                   ->addIndexColumn()
                   ->make(true);
       }
    }
}
