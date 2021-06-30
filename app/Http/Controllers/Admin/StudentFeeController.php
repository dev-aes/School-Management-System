<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\School;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AcademicYearController;

class StudentFeeController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {

            $student_fee = DB::select("SELECT student_fee.id, student_fee.months_no, student_fee.downpayment, student_fee.status, concat(students.first_name , students.last_name) as student_name , student_fee.total_fee as amount_payable, 
            SUM(payments.amount) as paid, (student_fee.total_fee - SUM(payments.amount)) as total_balance , (total_fee - downpayment) / months_no as monthly_payment  FROM student_fee LEFT JOIN payments ON 
            student_fee.id = payments.student_fee_id LEFT JOIN students ON student_fee.student_id = students.id Group By student_fee.id ORDER BY student_fee.status ASC");

            foreach($student_fee as $sf):

                if($sf->paid === $sf->amount_payable):
                
                 DB::table('student_fee')
                ->where('id', $sf->id)
                ->update(['status' => 'paid']);
                 
                 endif;

            endforeach;

            return DataTables::of($student_fee)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
             $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showStudentFee" onclick="showStudentFee('.$row->id.')"><i class="fas fa-eye"></i> View</a> ';
                
                $sf = DB::table('student_fee')->where('id', $row->id)->first();
                if($sf->has_downpayment)
                {
                    $btn .= ' | <button class="btn btn-sm btn-secondary" disabled> <i class="fas fa-trash"></i> Delete </button>';
                }
                else
                {
                    $btn .= ' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteStudentFee" onclick="deleteStudentFee('.$row->id.')" role="button"><i class="fas fa-trash"></i> Delete</a>';
                }
           

             return $btn;
         })
          ->rawColumns(['actions'])
          ->make(true);
          

         
         }

        return view('studentfee.index');

    }

    public function create()
    {
        if(request()->ajax())
        {
            $student = DB::table('students')
                       ->leftJoin('student_fee', 'students.id', 'student_fee.student_id')
                       ->select('students.*', 'student_fee.grade_level_id', 'student_fee.has_downpayment', 'student_fee.status', 'student_fee.total_fee')
                       ->orderBy('status', 'ASC')
                    //    ->where('student_fee.status', 'active')
                       ->get();
            //Student::all()
            return response()->json($student);
        }
    }
    

    public function displayGradeLevelByStudentID(Student $student)
    {
        if(request()->ajax())
        {

            $get_student_grade_level_by_section_id = $student->section->grade_level;


            $check_student_status = DB::table('student_fee')
                                    ->where('student_id', $student->id)
                                    ->first();
                                    
             return response()->json([$get_student_grade_level_by_section_id , $check_student_status]);
        }
    }

    public function store()
    {
        if(request()->ajax())
        {

            $data = request()->validate([
                'student_id' => 'required',
                'grade_level_id' => 'required',
                'total_fee' => 'required'
            ]);


            $academic_year = AcademicYear::where('status', 1)->first(); // get the current / active academic year

            $data['academic_year_id'] = $academic_year->id; // store the current academic_year_id for insertion 
            $data['created_at'] = Carbon::now();
            $data['discount'] = request('discount');
            $months_no = School::all('months_no')->first();
            $data['months_no'] =  $months_no->months_no;

            $student = DB::table('student_fee')
                        ->where('student_id', $data['student_id'])
                        ->where('grade_level_id', $data['grade_level_id'])
                        ->get();
            
            $date_started = School::all('date_started')->first();

            $data['date_started'] = $date_started->date_started;
            // check if the student is already enroled if it does then block the insertion
            if(!$student->count() > 0)
            {
                // insert student fee
                DB::table('student_fee')->insert($data);
                return response()->json('success');
            }
            else 
            {
                return response()->json('error');
            }

        }
    }

    public function show($id)
    {
        if(request()->ajax())
        {
            $student = DB::table('student_fee')
            ->join('grade_levels', 'grade_level_id', '=', 'grade_levels.id' )
            ->join('students', 'student_id', '=' , 'students.id')
            ->select('student_fee.*', 'grade_levels.name', 'students.first_name' , 'students.last_name')
            ->where('student_fee.id', '=', $id)
            ->first();

            $fee = DB::table('fees')->where('grade_level_id', $student->grade_level_id)->get();

            $total_fee = DB::table('fees')
                        ->select(DB::raw('sum(amount) as total'))
                        ->where('grade_level_id', '=', $student->grade_level_id)
                        ->first();

            $payments = DB::table('payments')
                        ->join('student_fee', 'student_fee_id' , '=' , 'student_fee.id')
                        ->select('amount', 'remarks', 'payments.created_at')
                        ->where('student_fee.id', $student->id)
                        ->get();

            $paymentsTotal = DB::select("SELECT student_fee.total_fee as amount_payable, 
            SUM(payments.amount) as paid, (student_fee.total_fee - SUM(payments.amount)) as total_balance FROM payments INNER JOIN student_fee ON 
            payments.student_fee_id = student_fee.id WHERE payments.student_fee_id = $student->id");

            return response()->json([$student, $fee, $total_fee, $payments,  $paymentsTotal ]);

        }
       
    }

    public function destroy($id)
    {
         DB::table('student_fee')
                       ->where('id', $id)
                       ->delete();

        DB::table('payments')
            ->where('student_fee_id', $id)
            ->delete();
    }



    public static function getStudentHasDownpayment(){
        $ay = AcademicYearController::getAcademicYear();
        $students = DB::table('section_adviser_ay')
                ->join('sections','section_adviser_ay.section_id','sections.id')
                ->join('students','section_adviser_ay.adviser_id','students.section_id')
                ->join('student_fee','students.id','student_fee.student_id')
                ->where('section_adviser_ay.ay_id',$ay->id)
                ->where('student_fee.has_downpayment',1)
                ->get();

                return $students;
        //To access this method just call this StudentFeeController::getStudentHasDownpayment();
        //Import StudentFeeController first
        // $student = StudentFeeController::getStudentHasDownpayment();

    }

}
