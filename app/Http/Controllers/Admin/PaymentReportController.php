<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PaymentReportController extends Controller
{
    public function index() 
    {
        if(request()->ajax())
        {
            $payments = DB::select("SELECT student_fee.status, payments.student_fee_id as enrolment_id , payments.id as payment_id , payments.amount, payments.official_receipt, payments.remarks, payments.created_at, students.id as student_id, students.first_name , students.last_name FROM payments INNER JOIN student_fee ON payments.student_fee_id = student_fee.id 
            INNER JOIN students ON student_fee.student_id = students.id ORDER BY payments.student_fee_id ASC;");

            return DataTables::of($payments)->toJson();
        //     ->addIndexColumn()
        //     ->addColumn('actions', function($row) {
        //      $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showPayment" onclick="showPayment('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
        //      $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editPayment" onclick="editPayment('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
        //      $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deletePayment" onclick="deletePayment('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';

        //      return $btn;
        //  })

        //   ->rawColumns(['actions'])
        //   ->make(true);

        }
         
        return view('payment.report.index');
    }

    // public function html()
    // {
    //     return $this->builder()
    //                 ->columns($this->getColumns())
    //                 ->parameters([
    //                     'buttons' => ['export'],
    //                     // 'buttons' => ['copy', 'csv', 'excel', 'pdf', 'print']
    //                 ]);
    // }
}
