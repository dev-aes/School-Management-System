<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\School;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\PaymentMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = DB::select("SELECT payments.id , payments.amount, students.first_name , students.last_name  FROM payments INNER JOIN student_fee ON payments.student_fee_id = student_fee.id 
            INNER JOIN students ON student_fee.student_id = students.id;");
            
            return DataTables::of($payments)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showPayment" 
            onclick="showPayment('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
            

            $latest_payment =  Payment::where('payment_type', '=', 'mo')->latest()->take(1)->first();
         
            if(!is_null($latest_payment))
            {
                if($row->id == $latest_payment->id)
                {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showPayment" 
                    onclick="showPayment('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editPayment" onclick="editPayment('.$row->id.')"> <i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deletePayment" onclick="deletePayment('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';
       
                }
                else
                {
                    $btn .= '  <button class="btn btn-sm btn-secondary" disabled> <i class="fas fa-trash"></i> Edit </button> |';
    
                    $btn .= '  <button class="btn btn-sm btn-secondary" disabled> <i class="fas fa-trash"></i> Delete </button>';
    
                }
            }
   
            return $btn;
           
         })
          ->rawColumns(['actions'])
          ->make(true);

         }
         
        return view('payment.index');

    }

    public function create()
    {
        if(request()->ajax())
        {
            $student_fee_id_with_student_name = DB::table('student_fee')
                                                ->join('students', 'student_fee.student_id', '=', 'students.id')
                                                ->select('student_fee.id', 'student_fee.status', 'student_fee.has_downpayment', 'students.first_name', 'students.last_name')
                                                // ->where('status', 'active')
                                                ->orderBy('status','ASC')
                                                ->get();
            $payment_modes = PaymentMode::where('status', 'active')->get();
            return response()->json([$student_fee_id_with_student_name, $payment_modes]);
        }
    }

    public function displayTotalBalanceByStudentID($id)
    {
        // SELECTING THE TOTAL BALANCE = TOTAL FEE - SUM OF PAYMENTS.AMOUNT
  
        // $student_balance = DB::select("SELECT sf.id, (sf.total_fee - SUM(p.amount)) as total_balance, s.first_name, s.last_name FROM student_fee sf INNER JOIN payments p ON sf.id = p.student_fee_id INNER JOIN students s ON sf.student_id = s.id WHERE  sf.id = $id");

        $student_balance = DB::table('student_fee')
                           ->join('payments', 'student_fee.id', '=', 'payments.student_fee_id')
                           ->join('students', 'student_fee.student_id', '=', 'students.id')
                           ->select('student_fee.id','student_fee.status', 'student_fee.has_downpayment','student_fee.monthly_payment', 'students.first_name', 'students.last_name', DB::raw("(student_fee.total_fee - SUM(payments.amount)) as total_balance"))
                           ->where('student_fee.id', $id)
                           ->first();

        $payment_ledger = DB::table('payment_ledger')
                          ->leftJoin('payments', 'payment_id' , '=', 'payments.id')
                          ->select(DB::raw("payment_ledger.payment_change , payment_ledger.month, payment_ledger.amount as amount , payment_ledger.balance as balance , payment_ledger.status , payments.amount as payment_amount , payments.remarks as payment_remark, payments.official_receipt as payment_official_receipt, payments.transaction_no as payment_transaction_no"))
                          ->where('payment_ledger.student_fee_id', $student_balance->id)
                          ->get();

        $monthly_payment = DB::table('payment_ledger')
                            ->where('status', 'unpaid')
                            ->where('student_fee_id', $student_balance->id )
                            ->first();

         // CHECK IF THERE IS ALREADY A PAYMENT ON A STUDENT FEE . IF ITS EMPTY / NULL THEN SELECT ONLY THE TOTAL BALANCE WITHOUT SUBTRACTING THE STUDENT PAYMENTS
        if(is_null($student_balance->total_balance))
        {
            $sb = DB::select("SELECT total_fee as total_balance FROM student_fee WHERE id = $id");
            return response()->json($sb);
        }
        else if($student_balance->total_balance == 0) 
        {
             return response()->json([$student_balance , $payment_ledger]);
        }

        else if(is_null($monthly_payment->amount))
        {
            $sb = DB::select("SELECT total_fee as total_balance FROM student_fee WHERE id = $id");
            return response()->json($sb);
        }
        
        else
        {
            return response()->json([$student_balance, $payment_ledger, $monthly_payment ]);
        }

    }

    public function store()
    {
        if(request()->ajax())
        {
       
           $transaction_no = mt_rand(123456,999999); // generate a transaction no.

            $data = request()->validate([
                'student_fee_id' => 'required',
                'amount' => 'required|int|min:50',
                'remarks' => 'required',
                'official_receipt' => 'required|unique:payments',
                'payment_type' => 'required',
                'payment_mode_id' => 'required'
            ]);

            $data['transaction_no'] = $transaction_no;
            $data['created_at'] = Carbon::now();

            $data['discounted_percentage'] = request('discounted_percentage') ?? ""; // ex 50 % / 0.5
            $data['discounted_cash'] = request('discounted_cash') ?? ""; // ex Php 500
            $data['discounted_amount'] = request('discounted_amount') ?? ""; // ex  Php 2500
            
            // check if the payment is a downpayment then update the student_fee table's downpayment to true else do the default insertion
            $check_if_student_fee_id_has_dp = DB::table('student_fee')
                                                  ->where('id', $data['student_fee_id'])->first();


            $get_all_payments = Payment::all();

            $recent_transaction_no = [];

            foreach($get_all_payments as $payment):

                    array_push($recent_transaction_no, $payment->transaction_no);

            endforeach;


            if(!in_array($transaction_no, $recent_transaction_no)) // check if the transaction no exist
            {
                //TODO DOWN PAYMENT
                if($data['payment_type'] == 'dp')
                {    
                    
                    // check if the student has already have a downpayment 
                        if($check_if_student_fee_id_has_dp->has_downpayment === 1)
                        {
                            return response()->json('error');
                        }
                        else
                        {
                            // insert
                             $recent_student_fee =   Payment::create($data); // latest inserted data ( Student Payment )
    
                             $get_student_by_student_fee_id = Student::where('id', $check_if_student_fee_id_has_dp->student_id)->first(); 
    
    
                            $this->log_activity($recent_student_fee,'added','Down Payment for student',$get_student_by_student_fee_id->first_name." ".$get_student_by_student_fee_id->last_name);
    
    
                             // after payment get the monthly fee of a student and populate it to the student_fee Table with a specific student_fee_id
                             $monthly_fee = DB::table('student_fee')
                                             ->select(DB::raw("(total_fee - downpayment) / months_no as monthly_payment"))
                                             ->where('id', $recent_student_fee->student_fee_id)
                                             ->first();
    
                             //update the student fee
                                 DB::table('student_fee')
                                 ->where('id', $data['student_fee_id'])
                                 ->update([
                                            'has_downpayment' => 1, 
                                            'downpayment' => $data['amount'], 
                                            'monthly_payment' => $monthly_fee->monthly_payment, 
                                            ]);
    
    
                             $months = School::all('months_no', 'date_started')->first();
    
                             // get the updated monthly payment
                             $mp = DB::table('student_fee')
                                 ->select(DB::raw("(total_fee - downpayment) / months_no as monthly_payment"))
                                 ->where('id', $recent_student_fee->student_fee_id)
                                 ->first();
    
                             // because refresh helper function wont work on eloquent ; use the querybuiler to update again the recent row
                             DB::table('student_fee')
                                 ->where('id', $data['student_fee_id'])
                                 ->update(['monthly_payment' => $mp->monthly_payment ]);
    
    
    
                             $date_started = $months->date_started; // get the date started (Starting date for a payment)
                             $months_no = $months->months_no; // get number of months by school
                
                             $monthly_payment = $mp->monthly_payment; // montly payment
    
    
                             // insert each payments by  Schools.months_no / Payment Schedule
                             for($i = 0; $i<$months_no; $i++)
                             {
                                 DB::table('payment_ledger')
                                     ->insert([
                                     'month'=> $date_started,
                                     'student_fee_id' => $recent_student_fee['student_fee_id'],
                                     'amount' => $monthly_payment,
                                     'balance' => $monthly_payment
                                     ]);
    
                                 //after inserting the recent values to payment_ledger ; increment the month by one month until the last index of the months_no inside for loop
                                $date_started = date("Y-m-d",strtotime("+1 month",strtotime($date_started)));
    
                             }
    
                             return response()->json('success');
                        }
                        
                } //TODO MONTHLY PAYMENT
                else if($data['payment_type'] == 'mo')
                {
                    $check_if_payment_has_dp = DB::table('student_fee')
                                               ->where('id', $data['student_fee_id'])
                                               ->first();
    
                    if(!$check_if_payment_has_dp->has_downpayment)
                    {
                        return response()->json('no downpayment');
                    }
                    // get the monthly payment by student_fee_id
                    $get_the_monthly_payment_or_balance = DB::table('payment_ledger')
                                                            ->select('amount', 'balance')
                                                            ->where('student_fee_id', $data['student_fee_id'])
                                                            ->where('status', 'unpaid')
                                                            ->first();
    
                    // check if the delivered amount is equal to the student's monthly payment / balance  do something ..
                    if($data['amount'] == $get_the_monthly_payment_or_balance->balance)
                    {
    
                        // insert payment
                         $recent_student_fee =   Payment::create($data); // latest inserted data ( Student Payment )
    
                         $get_student_by_student_fee_id = Student::where('id', $check_if_student_fee_id_has_dp->student_id)->first(); 
                         $this->log_activity($recent_student_fee,'added','Monthly Payment for student',$get_student_by_student_fee_id->first_name." ".$get_student_by_student_fee_id->last_name);
    
                        $update_payment_ledger = DB::table('payment_ledger')
                                                ->where('status', 'unpaid')
                                                ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                ->first();
                                                 
                                                //update
                                                 DB::table('payment_ledger')
                                                 ->where('id', $update_payment_ledger->id)
                                                 ->update([
                                                     'status' => 'paid',
                                                     'payment_id' => $recent_student_fee->id,
                                                     'created_at' => Carbon::now()
                                                     ]);
    
                        return response()->json('success');
                    }
    
                    // check if the delivered amount is less than to the student's monthly payment / balance  do something ..
                     if($data['amount'] < $get_the_monthly_payment_or_balance->balance)
                    {
                        /**  if the delivered amount is less than the monthly payment then subtract the delivered amount to the monthly payment and get the total change
                         * after getting the total change add it to the next payment_schedule 
                         */
    
    
                        // get the delivered amount then subtract it to the current amount/balance then get the total change so that it will be added to the next payment schedule
                        $get_the_change = DB::table('payment_ledger')
                                          ->select(DB::raw("(balance - $data[amount]) as total_change"), 'id')
                                          ->where('status', 'unpaid')
                                          ->where('student_fee_id', $data['student_fee_id'])
                                          ->first();
    
                        // insert  payment and get the last inserted data (Student Payment)
                        $recent_student_fee =   Payment::create($data); 
    
                        // update the latest unpaid row in the payment ledger 
                        $update_payment_ledger = DB::table('payment_ledger')
                                                ->where('status', 'unpaid')
                                                ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                ->first();
                                                
                                                //update
                                                 DB::table('payment_ledger')
                                                 ->where('id', $update_payment_ledger->id)
                                                 ->update([
                                                     'status' => 'paid',
                                                     'payment_id' => $recent_student_fee->id,
                                                     'created_at' => Carbon::now()
                                                     ]);
    
                        // after updating the recent row is now paid then select again a new unpaid record
    
                        // getting the latest unpaid record
                        $new_payment_ledger_record =  DB::table('payment_ledger')
                                                      ->where('status', 'unpaid')
                                                      ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                      ->first();
    
                        // update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                        DB::update("UPDATE payment_ledger 
                                    SET 
                                    balance = balance + $get_the_change->total_change 
                                    WHERE id = $new_payment_ledger_record->id");
                        
                        return response()->json('success');
    
                    }
                    
                    // check if the delivered amount is greather than the recent amount / balance (Monthly Payment)
                    if($data['amount'] > $get_the_monthly_payment_or_balance->balance)
                    {
    
                        $first_change = $data['amount'] - $get_the_monthly_payment_or_balance->balance;
    
                        $recent_student_fee =   Payment::create($data); 
    
                        $update_payment_ledger = DB::table('payment_ledger')
                                            ->where('status', 'unpaid')
                                            ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                            ->first();
                                            
                                            //update
                                            DB::table('payment_ledger')
                                            ->where('id', $update_payment_ledger->id)
                                            ->update([
                                                'payment_change' => $first_change,
                                                'status' => 'paid',
                                                'payment_id' => $recent_student_fee->id,
                                                'created_at' => Carbon::now()
                                                ]);
    
    
                        $new_payment_ledger_record =  DB::table('payment_ledger')
                                                            ->where('status', 'unpaid')
                                                            ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                            ->first();
    
    
                        $new_paid_payment_ledger_record = DB::table('payment_ledger')
                                                            ->where('status', 'paid')
                                                            ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                            ->latest('id')
                                                            ->first();
                                                            // getting the payment change of the latest payment
    
    
                        $id = $new_payment_ledger_record->id;
                        $change = $data['amount'] - $get_the_monthly_payment_or_balance->balance;
    
                        $created_at = Carbon::now();
                        
    
                        $payment_change = $new_paid_payment_ledger_record->payment_change; // paymentchange
    
                        while($change >= $new_payment_ledger_record->balance)
                        {
                            
                             //update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                                DB::update("UPDATE payment_ledger 
                                SET  
                                payment_id = $recent_student_fee->id ,
                                payment_change = $payment_change - balance,
                                status = 'paid',
                                created_at = '$created_at'
                                WHERE id = $id");
    
                                
                                $get_the_change_for_next_payment_sched = DB::table('payment_ledger')
                                ->select(DB::raw("($change) - balance as total_change"), 'id', 'payment_change')
                                ->where('status', "unpaid")
                                ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                ->first(); // 2000
    
                                $get_the_new_paid_record = DB::table('payment_ledger')
                                ->where('status', 'paid')
                                ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                ->latest('id')
                                ->first(); // updated payment change
    
                                $id ++;
    
                                $change = $get_the_change_for_next_payment_sched->total_change;
                                $payment_change = $get_the_new_paid_record->payment_change; // update the payment change
                        }
    
                                $next_payment_ledger_record =  DB::table('payment_ledger')
                                                                ->where('status', 'unpaid')
                                                                ->where('student_fee_id', $recent_student_fee->student_fee_id)
                                                                ->first();
    
                                                                //update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                                                                DB::update("UPDATE payment_ledger 
                                                                SET
                                                                balance = balance - $change
                                                                WHERE id = $next_payment_ledger_record->id");
                          return response()->json('success');
                    }
                }
            }

            return response()->json('error_transaction_no');

        }
    }

    public function show(Payment $payment)
    {
        if(request()->ajax())
        {
            // get the payment by payment id
           $selected_payment = DB::table('payments')
                      ->where('id', $payment->id)
                      ->first();


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
            // // get the amount payable , paid amount , total balance
            // $paymentsTotal = DB::select("SELECT student_fee.total_fee as amount_payable, 
            // SUM(payments.amount) as paid, (student_fee.total_fee - SUM(payments.amount)) as total_balance FROM payments INNER JOIN student_fee ON 
            // payments.student_fee_id = student_fee.id WHERE payments.student_fee_id = $student->id");


          return response()->json([$selected_payment, $student, $fee, $paymentsTotal, $total_fee]);


        }
    }

    public function edit(Payment $payment)
    {
        if(request()->ajax())
        {
            // $student = get the student info
            //$payment = get the selected payment row info
            $student = DB::table('students')
                       ->join('student_fee', 'students.id', '=', 'student_fee.student_id')
                       ->join('payments', 'student_fee.id', '=' , 'payments.student_fee_id')
                       ->select('students.first_name' , 'students.last_name')
                       ->where('student_fee.id', $payment->student_fee_id )
                       ->first();

            return response()->json([$payment, $student]);
        }
    }

    public function update(Payment $payment)
    {
        $data = request()->validate([
            'student_fee_id' => 'required',
            'amount' => 'required',
            'remarks' => 'required',
            'official_receipt' => 'required',
            'payment_type' => 'required',
            'payment_mode_id' => 'required'
            ]);

        $data['updated_at'] = Carbon::now(); // date
        $data['discounted_percentage'] = request('discounted_percentage'); // ex 50 % / 0.5
        $data['discounted_cash'] = request('discounted_cash'); // ex Php 500
        $data['discounted_amount'] = request('discounted_amount'); // ex  Php 2500

        if(request()->ajax())
        {
            if($data['payment_type'] == 'dp')
            {
                $payment->update($data);

                // after payment update the monthly fee of a student ; populate it to the student_fee Table with a specific student_fee_id
                $monthly_fee = DB::table('student_fee')
                ->select(DB::raw("(total_fee - downpayment) / months_no as monthly_payment"))
                ->where('id', $payment->student_fee_id)
                ->first();
  
                  //update the student fee
                  DB::table('student_fee')
                  ->where('id', $data['student_fee_id'])
                  ->update([
                          'has_downpayment' => 1, 
                          'downpayment' => $data['amount'], 
                          'monthly_payment' => $monthly_fee->monthly_payment, 
                          ]);
  
               return response()->json('success');
            }

            if($data['payment_type'] == 'mo')
            {

                // $payment->update($data);
                $get_monthly_payment = DB::table('payment_ledger')
                                        ->select('amount' , 'id', 'balance')
                                        ->where('status', 'unpaid')
                                        ->where('student_fee_id', $payment->student_fee_id)
                                        ->latest('id')
                                        ->first();


                if($data['amount'] < $get_monthly_payment->balance)
                {
                     // getting the latest unpaid record and revert it also to its usual montly payment
                        $next_monthly_payment = DB::table('payment_ledger')
                        ->where('status', 'unpaid')
                        ->where('student_fee_id', $payment->student_fee_id)
                        ->first();
                 
                        DB::table('payment_ledger')
                        ->where('id', $next_monthly_payment->id)
                        ->update([
                            'status' => 'unpaid',
                            'balance' => $get_monthly_payment->balance,
                            'payment_change' => 0
                            ]);


                        // getting all the payment_sched by payment_id
                        $select_payment_ledger_by_id =  DB::table('payment_ledger')
                                                        ->where('payment_id', $payment->id)
                                                        ->where('student_fee_id', $payment->student_fee_id)
                                                        ->get();

                        foreach($select_payment_ledger_by_id as $payment_ledger)
                        {
                                    // revert back all the payment by payment_id 
                                    DB::table('payment_ledger')
                                        ->where('id',$payment_ledger->id)
                                        ->update([
                                        'balance' => $get_monthly_payment->balance,
                                        'status' => 'unpaid',
                                        'payment_id' => null,
                                        'payment_change' =>0
                                        ]);
                        }

                        // after replenish do something ...

                        $change =  $get_monthly_payment->balance - $data['amount'] ;

                        $payment->update($data); // update the payment amount

                          // update the latest unpaid row in the payment ledger 
                        $update_payment_ledger = DB::table('payment_ledger')
                                                ->where('status', 'unpaid')
                                                ->where('student_fee_id', $payment->student_fee_id)
                                                ->first();
                        
                                                //update
                                                DB::table('payment_ledger')
                                                    ->where('id', $update_payment_ledger->id)
                                                    ->update([
                                                        'payment_id' => $payment->id,
                                                        'payment_change' => $change,
                                                        'status' => 'paid',
                                                        'payment_id' => $payment->id,
                                                        'created_at' => Carbon::now()
                                                        ]);

                          // after updating the recent row is now paid then select again a new unpaid record

                        // getting the latest unpaid record
                        $new_payment_ledger_record =  DB::table('payment_ledger')
                                                    ->where('status', 'unpaid')
                                                    ->where('student_fee_id', $payment->student_fee_id)
                                                    ->first();

                                                    // update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                                                    DB::update("UPDATE payment_ledger 
                                                    SET 
                                                    balance = balance + $change 
                                                    WHERE id = $new_payment_ledger_record->id");

                       return response()->json('success');

                }

                if($data['amount'] > $get_monthly_payment->balance )
                {

                    /**if the updated delivered amount is greather than the usual monthly payment (balance) then select all the recent payment_schedules by payment_id and revert its balance 
                    to the usual monthly amount (balance)
                     */ 

                    // getting the latest unpaid record and revert it also to its usual montly payment
                   $next_monthly_payment = DB::table('payment_ledger')
                                            ->where('status', 'unpaid')
                                            ->where('student_fee_id', $payment->student_fee_id)
                                            ->first();
                                          
                                            DB::table('payment_ledger')
                                            ->where('id', $next_monthly_payment->id)
                                            ->update([
                                                'status' => 'unpaid',
                                                'balance' => $get_monthly_payment->balance
                                                ]);


                   $select_payment_ledger_by_id =  DB::table('payment_ledger')
                                                    ->where('payment_id', $payment->id)
                                                    ->where('student_fee_id', $payment->student_fee_id)
                                                    ->get();

                    foreach($select_payment_ledger_by_id as $payment_ledger)
                    {
                        // revert back 
                            DB::table('payment_ledger')
                            ->where('id',$payment_ledger->id)
                            ->update([
                                'balance' => $get_monthly_payment->balance,
                                'status' => 'unpaid',
                                'payment_change' => 0,
                                'payment_id' => null
                                ]);
                    }

               
                   // update the recent payment to its new payment amount payment_table
                   $payment->update($data);

                   //getting the payment_change

                   $payment_change = $data['amount'] - $get_monthly_payment->balance;

                    $update_payment_ledger = DB::table('payment_ledger')
                    ->where('status', 'unpaid')
                    ->where('student_fee_id', $payment->student_fee_id)
                    ->first();
                    
                    //update
                    DB::table('payment_ledger')
                    ->where('id', $update_payment_ledger->id)
                    ->update([
                        'payment_change' => $payment_change,
                        'status' => 'paid',
                        'payment_id' => $payment->id,
                        'created_at' => Carbon::now()
                        ]);


                    $new_payment_ledger_record =  DB::table('payment_ledger')
                                                        ->where('status', 'unpaid')
                                                        ->where('student_fee_id', $payment->student_fee_id)
                                                        ->first();


                    $id = $new_payment_ledger_record->id;
                    $change = $data['amount'] - $get_monthly_payment->balance;

                    $created_at = Carbon::now();

                    while($change >= $new_payment_ledger_record->balance)
                    {
                        //update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                            DB::update("UPDATE payment_ledger 
                            SET  
                            payment_id = $payment->id ,
                            payment_change = $payment_change - balance,
                            status = 'paid',
                            created_at = '$created_at'
                            WHERE id = $id");

                            
                            $get_the_change_for_next_payment_sched = DB::table('payment_ledger')
                            ->select(DB::raw("($change) - balance as total_change"), 'id')
                            ->where('status', "unpaid")
                            ->where('student_fee_id', $payment->student_fee_id)
                            ->first(); // 2000

                            $get_the_new_paid_record = DB::table('payment_ledger')
                            ->where('status', 'paid')
                            ->where('student_fee_id', $payment->student_fee_id)
                            ->latest('id')
                            ->first(); // updated payment change

                            $id ++;

                            $change = $get_the_change_for_next_payment_sched->total_change;
                            $payment_change = $get_the_new_paid_record->payment_change;
                    }

                            $next_payment_ledger_record =  DB::table('payment_ledger')
                                                            ->where('status', 'unpaid')
                                                            ->where('student_fee_id', $payment->student_fee_id)
                                                            ->first();

                                                            //update the newly selected unpaid record ; update its amount / balance BY PAYMENT_LEDGER_ID
                                                            DB::update("UPDATE payment_ledger 
                                                            SET  
                                                            balance = balance - $change
                                                            WHERE id = $next_payment_ledger_record->id");

                    return response()->json('success');
                }

                if($data['amount'] == $get_monthly_payment->balance)
                {

                     // getting the latest unpaid record and revert it also to its usual montly payment
                     $next_monthly_payment = DB::table('payment_ledger')
                     ->where('status', 'unpaid')
                     ->where('student_fee_id', $payment->student_fee_id)
                     ->first();
              
                     DB::table('payment_ledger')
                     ->where('id', $next_monthly_payment->id)
                     ->update([
                         'status' => 'unpaid',
                         'balance' => $get_monthly_payment->balance,
                         'payment_change' => 0
                         ]);


                     // getting all the payment_sched by payment_id
                     $select_payment_ledger_by_id =  DB::table('payment_ledger')
                                                     ->where('payment_id', $payment->id)
                                                     ->where('student_fee_id', $payment->student_fee_id)
                                                     ->get();

                     foreach($select_payment_ledger_by_id as $payment_ledger)
                     {
                                 // revert back all the payment by payment_id 
                                 DB::table('payment_ledger')
                                     ->where('id',$payment_ledger->id)
                                     ->update([
                                     'balance' => $get_monthly_payment->balance,
                                     'status' => 'unpaid',
                                     'payment_id' => null,
                                     'payment_change' => 0
                                     ]);
                     }

                     // after replenish do something ...

                      // update payment
                       $payment->update($data);

                    $update_payment_ledger = DB::table('payment_ledger')
                                            ->where('status', 'unpaid')
                                            ->where('student_fee_id', $payment->student_fee_id)
                                            ->first();
                                             
                                            //update
                                             DB::table('payment_ledger')
                                             ->where('id', $update_payment_ledger->id)
                                             ->update([
                                                 'status' => 'paid',
                                                 'payment_id' => $payment->id,
                                                 'created_at' => Carbon::now()
                                                 ]);

                    return response()->json('success');
                }
            }
        }
    }


    public function destroy(Payment $payment)
    {


        if($payment->payment_type == 'dp')
        {

            //after deleting the downpayment update the student bill's downpayment back to 0 and 
            //revert back also the has_downpayment property to false (0)
            DB::table('student_fee')
            ->where('id', $payment->student_fee_id)
            ->update([
                'has_downpayment'  => 0,
                'downpayment' => 0
                ]);

            //after update get all the payment ledgers associated with payment->student_fee_id ; DELETE 
            DB::table('payment_ledger')
            ->where('student_fee_id', $payment->student_fee_id)
            ->delete();

            //todo activty log
            
            $student_fee = StudentFee::where('id', $payment->student_fee_id)->first();

            $student = Student::where('id', $student_fee->student_id)->first();

            $this->log_activity($payment,'deleted','Down Payment for student',$student->first_name." ".$student->last_name);


            // after updating and deleting of records ; delete payment record ( Monthly Payment )
            $payment->delete();

            return response()->json('success');
        }

        if($payment->payment_type == 'mo')
        {
            //   // get the last monthly payment for ex Php 1500
                $get_last_monthly_payment = DB::table('payment_ledger')
                                        ->select('amount' , 'id')
                                        ->where('status', 'unpaid')
                                        ->where('student_fee_id', $payment->student_fee_id)
                                        ->latest('id')
                                        ->first();

                // get the latest unpaid monthly payment
                $get_monthly_payment = DB::table('payment_ledger')
                                        ->select('amount' , 'id', 'payment_change')
                                        ->where('status', 'unpaid')
                                        ->where('student_fee_id', $payment->student_fee_id)
                                        ->first();
                // after getting ; revert back to its usual monthly payment
                                        DB::table('payment_ledger')
                                            ->where('id', $get_monthly_payment->id)
                                            ->update([
                                                'payment_change' => 0,
                                                'amount' => $get_last_monthly_payment->amount,
                                                'balance' => $get_last_monthly_payment->amount
                                                ]);

     
              // get all the recent monthly payment by payment id where status = PAID
              $get_the_recent_monthly_payment_by_payment_id =  DB::table('payment_ledger')
                                                               ->where('status', 'paid')
                                                               ->where('student_fee_id', $payment->student_fee_id)
                                                               ->where('payment_id', $payment->id)
                                                               ->get();
            
              foreach($get_the_recent_monthly_payment_by_payment_id as $key => $monthly_payment_by_payment_id)
              {
                 
                  DB::table('payment_ledger')
                  ->where('id', $monthly_payment_by_payment_id->id)
                  ->update([
                      'payment_change' => 0,
                      'status' => 'unpaid',
                      'payment_id'  => null
                      ]);
              }

            //todo activty log

              $student_fee = StudentFee::where('id', $payment->student_fee_id)->first();

              $student = Student::where('id', $student_fee->student_id)->first();
  
              $this->log_activity($payment,'deleted','Monthly Payment for student',$student->first_name." ".$student->last_name);
  

              $payment->delete(); // delete payment by payment-ID



               return response()->json('success');

        }
    }
}
