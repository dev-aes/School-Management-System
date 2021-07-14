<?php

namespace App\Http\Controllers\User;

use App\Models\Payment;
use App\Models\Student;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Models\ParentPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PaymentMode;

class ParentController extends Controller
{
 
    public function index() 
    {
        $parent = ParentModel::where('id', auth()->user()->parent_id)->first();

        // $parent_student = $parent::with('students')->get();

        $parent_students = [] ; // parent student_id container 

        foreach($parent->students as $student): 

                    array_push($parent_students, $student->id);
        endforeach;

        $get_parent_students_with_section = Student::with('section')->whereIn('id', $parent_students)->get();


        return view('users.parent.index', compact('get_parent_students_with_section'));
    }

    public function parent_show_payment_ledger(Student $student)
    {
        if(request()->ajax())
        {
            // get the invoice / billing / student_fee by student_id
            $student_fee = DB::table('student_fee')
                            ->where('student_id', $student->id)
                            ->first();

          
           $payment_modes = PaymentMode::where('status', 'active')->get();


        
           // if student is active ( has downpayment)
            if($student_fee->status == 'active' && $student_fee->has_downpayment > 0)
            {
                $payment_ledger = DB::table('payment_ledger')
                                    ->leftJoin('payments', 'payment_id' , '=', 'payments.id')
                                    ->select(DB::raw("payment_ledger.payment_change , payment_ledger.month, payment_ledger.amount as amount , payment_ledger.balance as balance , payment_ledger.status , payments.amount as payment_amount , payments.remarks as payment_remark, payments.official_receipt as payment_official_receipt, payments.transaction_no as payment_transaction_no, payments.created_at as payment_date, payments.id as payment_id"))
                                    ->where('payment_ledger.student_fee_id', $student_fee->id)
                                    ->get();

                $next_monthly_payment = DB::table('payment_ledger')
                                    ->where('student_fee_id', $student_fee->id)
                                    ->where('status', 'unpaid')
                                    ->first();

                $student_balance = DB::table('student_fee')
                            ->join('payments', 'student_fee.id', '=', 'payments.student_fee_id')
                            ->select(DB::raw("(student_fee.total_fee - SUM(payments.amount)) as total_balance"))
                            ->where('student_fee.id', $student_fee->id)
                            ->first();

                return response()->json([$payment_ledger, $next_monthly_payment, $student_balance, $student,  $payment_modes]);

            }
            // if student is fully paid
            else if($student_fee->status == 'paid' && $student_fee->has_downpayment >0)
            {
                $payment_ledger = DB::table('payment_ledger')
                ->leftJoin('payments', 'payment_id' , '=', 'payments.id')
                ->select(DB::raw("payment_ledger.payment_change , payment_ledger.month, payment_ledger.amount as amount , payment_ledger.balance as balance , payment_ledger.status , payments.amount as payment_amount , payments.remarks as payment_remark, payments.official_receipt as payment_official_receipt, payments.transaction_no as payment_transaction_no, payments.created_at as payment_date, payments.id as payment_id"))
                ->where('payment_ledger.student_fee_id', $student_fee->id)
                ->get();

                $next_monthly_payment = DB::table('payment_ledger')
                                    ->where('student_fee_id', $student_fee->id)
                                    ->where('status', 'unpaid')
                                    ->first();

                $student_balance = DB::table('student_fee')
                            ->join('payments', 'student_fee.id', '=', 'payments.student_fee_id')
                            ->select(DB::raw("(student_fee.total_fee - SUM(payments.amount)) as total_balance"), "student_fee.status")
                            ->where('student_fee.id', $student_fee->id)
                            ->first();

                return response()->json([$payment_ledger, $next_monthly_payment, $student_balance, $student,  $payment_modes]);

            }
            // if student is active but don't have a down payment
            else if($student_fee->status == 'active' && $student_fee->has_downpayment == 0)
            {
                return response()->json([$student_fee->total_fee, $student,  $payment_modes]);
            }
            else
            {
                return response()->json('error');
            }
        }
    }

    // TODO Monthly Payment
    public function parent_store_payment_to_student()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'student_id' => 'required',
                'official_receipt' => 'required',
                'amount' => 'required',
                'screenshot' => 'image',
                'payment_mode_id' => 'required'

                ]);

                $data['parent_id'] = auth()->user()->parent_id;
                $data['remark'] = "monthly payment";

                if(request()->hasFile('screenshot')) {
                    // check if the request has an image file
                      $data['screenshot'] = request('screenshot')->getClientOriginalName(); // get only the original file_name 
                     request('screenshot')->storeAs('/uploads/receipt',$data['screenshot'], 'public'); // params: fileFolder , fileName , filePath

                      $payment = ParentPayment::create($data);

                      $parent = ParentModel::where('id', $data['parent_id'])->first(); // get authenticated parent

                      $this->log_activity($parent,'sent','payment',"Php $payment->amount", 'a', $parent->id, $payment->student_id);

                      return response()->json('success');
                }

        }
    }

    //TODO DownPayment
    public function parent_store_down_payment_to_student()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'student_id' => 'required',
                'official_receipt' => 'required',
                'amount' => 'required',
                'screenshot' => 'image',
                'payment_mode_id' => 'required'
                ]);

            $data['parent_id'] = auth()->user()->parent_id;
            $data['remark'] = "down payment";

                if(request()->hasFile('screenshot')) {
                    // check if the request has an image file
                      $data['screenshot'] = request('screenshot')->getClientOriginalName(); // get only the original file_name 
                     request('screenshot')->storeAs('/uploads/receipt',$data['screenshot'], 'public'); // params: fileFolder , fileName , filePath

                     $payment = ParentPayment::create($data);
                     $parent = ParentModel::where('id', $data['parent_id'])->first(); // get authenticated parent

                     $this->log_activity($parent,'sent','payment',"Php $payment->amount", 'a', $parent->id, $payment->student_id);


                      return response()->json('success');
                }
        }
    }

    public function parent_show_payment_history(ParentModel $parent , Student $student)
    {
        if(request()->ajax())
        {
           $payment_history = DB::table('parent_payments')
                            ->join('students', 'student_id', '=', 'students.id')
                            ->join('payment_modes', 'parent_payments.payment_mode_id', 'payment_modes.id')
                            ->select('parent_payments.*', 'students.first_name', 'students.last_name', 'payment_modes.title')
                            ->where('parent_id', $parent->id)   
                            ->where('student_id', $student->id)
                            ->get();
           
        //    $ph = ParentPayment::where('parent_id', $parent->id)->where('student_id', $student->id)->get();

           return response()->json($payment_history);
        }
    }

    public function parent_show_payment(Payment $payment)
    {
        if(request()->ajax())
        {

              // get the payment by payment id
              $selected_payment = Payment::with('user', 'payment_mode')->where('id', $payment->id)->first();


            // get student name , grade level name and student fee
            $student = DB::table('student_fee')
                        ->join('grade_levels', 'grade_level_id', '=', 'grade_levels.id' )
                        ->join('students', 'student_id', '=' , 'students.id')
                        ->select('student_fee.*', 'grade_levels.name', 'students.first_name' , 'students.last_name')
                        ->where('student_fee.id', '=', $payment->student_fee_id)
                        ->first();

            // display all sub fees by students grade level
            $fee = DB::table('fees')->where('grade_level_id', $student->grade_level_id)->get();

            $total_fee = DB::table('fees')
                            ->select(DB::raw('sum(amount) as subtotal'))
                            ->where('grade_level_id', '=', $student->grade_level_id)
                            ->first();

              // select * payments that is not equal to the selected id

              $payments = Payment::where('id', '<=' , $payment->id)->where('student_fee_id', $student->id)->get();

              $total_paid = $payments->sum('amount');
  
              $balance = DB::table('student_fee')->select(DB::raw("total_fee - $total_paid as total_balance"))->where('id', $student->id)->first();
  
              $total_balance = $balance->total_balance;
  
  
              // return response()->json($total_balance);
  
              // get the amount payable , paid amount , total balance
              $paymentsTotal = DB::select("SELECT student_fee.total_fee as amount_payable FROM payments INNER JOIN student_fee ON payments.student_fee_id = student_fee.id WHERE payments.student_fee_id = $student->id");
  
              $paymentsTotal['paid']  = $total_paid;
              $paymentsTotal['total_balance'] = $total_balance;
  
              // return response()->json($paymentsTotal);
               // get the amount payable , paid amount , total balance
              // $paymentsTotal = DB::select("SELECT student_fee.total_fee as amount_payable, 
              // SUM(payments.amount) as paid, (student_fee.total_fee - SUM(payments.amount)) as total_balance FROM payments INNER JOIN student_fee ON 
              // payments.student_fee_id = student_fee.id WHERE payments.student_fee_id = $student->id");
  
  
            return response()->json([$selected_payment, $student, $fee, $paymentsTotal, $total_fee]);
  
        }
    }

    public function parent_student_grade(Student $student)
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
            
            return response()->json([$student_grades, $core_values]);
        }
    }

    public function show_payment_modes()
    {
        if(request()->ajax())
        {
            $payment_modes = PaymentMode::all();
            return response()->json($payment_modes);
        }
    }
}
