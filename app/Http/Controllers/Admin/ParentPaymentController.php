<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\ParentModel;
use App\Models\ParentPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class ParentPaymentController extends Controller
{
    public function index() 
    {
        $parent_payment_request = DB::table('parent_payments')
                                  ->join('parents', 'parent_id', '=', 'parents.id')
                                  ->join('students', 'student_id', '=', 'students.id')
                                  ->select('parent_payments.*', 'parents.name', 'students.first_name', 'students.last_name')
                                  ->where('status', 'pending')
                                  ->get();

        if(request()->ajax()) 
        {
                return DataTables::of($parent_payment_request)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class=" btn btn-primary btn-sm update " data-val="approved" id="approve"><i class="fas fa-check-circle"></i> Approve</a> |';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class=" btn btn-danger btn-sm update " data-val="declined"  id="decline"><i class="far fa-times-circle"></i> Decline </a>';
                
                        return $btn;
                    })
                    ->rawColumns(['actions'])
                    ->make(true);

        }

        return view('parent_payment.index');
    }

    public function get_payment_approved_payment_request()
    {

        
        $parent_approved_payment_request = DB::table('parent_payments')
                                    ->join('parents', 'parent_id', '=', 'parents.id')
                                    ->join('students', 'student_id', '=', 'students.id')
                                    ->select('parent_payments.*', 'parents.name', 'students.first_name', 'students.last_name')
                                    ->where('status', 'approved')
                                    ->get();

        if(request()->ajax())
        {
             return DataTables::of($parent_approved_payment_request)
                    ->make(true);
        }

        return view('parent_payment.index');

    }

    public function get_payment_declined_payment_request()
    {

        $parent_declined_payment_request = DB::table('parent_payments')
                                    ->join('parents', 'parent_id', '=', 'parents.id')
                                    ->join('students', 'student_id', '=', 'students.id')
                                    ->select('parent_payments.*', 'parents.name', 'students.first_name', 'students.last_name')
                                    ->where('status', 'declined')
                                    ->get();

        if(request()->ajax())
        {
            return DataTables::of($parent_declined_payment_request)
            ->make(true);
        }
    }

    public function edit(ParentModel $parent , Student $student)
    {

        //when the admin click one of the notifications it will navigate to its specific info
        // after navigation update the notification count (decrement) and the parent_payment status to 1 (true)

        // get the parent payment by parent and student_id where seen = false
        $get_parent_payment = ParentPayment::where('parent_id', $parent->id)->where('student_id', $student->id)->where('seen', '0')->first();

        if(!is_null($get_parent_payment))
        {
                // update the parent payment seen property to true 
                $get_parent_payment->update(['seen' => 1]);
        }

        $parent_payment_request = DB::table('parent_payments')
                                    ->join('students', 'student_id', '=', 'students.id')
                                    ->join('parents', 'parent_id', '=', 'parents.id')
                                    ->select('parent_payments.*','students.first_name', 'students.last_name', 'parents.name')
                                    ->where('parent_id', $parent->id)
                                    ->where('student_id', $student->id)
                                    ->where('status', 'pending')
                                    ->first();
                            
        if(!is_null($parent_payment_request))
        {
            return view('parent_payment.edit', compact('parent_payment_request'));
        }

        return redirect(route('parent_payment_request.index'));
    }

    public function update(ParentModel $parent, Student $student)
    {
        


        $latest_pending_payment =   ParentPayment::where('parent_id', $parent->id)
                                                    ->where('student_id', $student->id)
                                                    ->where('status', 'pending')
                                                    ->first();

                                    $latest_pending_payment->update(['status' => request('remark')]);

        $remarks = request('remark');
        $transaction_no = mt_rand(123456,999999);
        // $num = "09162646505";
        // $num = "09951460049";
        // $num = "09659312003";
        $num = "09760872122";


        // $message = nl2br("Admin has $remarks your payment request \n Reference No: $transaction_no \n Questions? Feel free to email as at school@email.com ");
          
        // $message .= "Reference No: $transaction_no ";
        // $message .= "Questions? Feel free to email as at school@email.com ";
        //$message = "Admin has $remarks your payment request. Reference No: $transaction_no";

        $message = " Admin has $remarks your payment request.Reference No. 00993281.";

        $apicode = "TR-EONBO872122_3B6T3";
        $pw = "d8y7b2]aa]";



        $this->itexmo($num,$message,$apicode,$pw);
        return response()->json('success');

    }

    public function admin_update(ParentPayment $parent_payment)
    {
        if(request()->ajax())
        {
            $parent_payment->update(['status' => request('remark')]);

            $remarks = request('remark');
            $transaction_no = mt_rand(123456,999999);

           
            // $num = "09162646505"; // sir jess
           // $num = "09951460049"; // eric
            // $num = "09659312003";
              // $message .= "Reference No: $transaction_no ";
            // $message .= "Questions? Feel free to email as at school@email.com ";
            $num = "09760872122";

            //$message = nl2br("Admin has $remarks your payment request \n Reference No: $transaction_no \n Questions? Feel free to email as at school@email.com ");
            
            $message = " Admin has $remarks your payment request.Reference No. 00993281.";


            $apicode = "TR-EONBO872122_3B6T3";
            $pw = "d8y7b2]aa]";
      
            $this->itexmo($num,$message,$apicode,$pw);

            return response()->json('success');
        }
    }

    public function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
    }
}
