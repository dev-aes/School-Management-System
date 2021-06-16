<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentModeController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            if(request()->ajax()) {
                return DataTables::of(PaymentMode::all())
                    ->addIndexColumn()
                    ->addColumn('actions', function($row) {
                        // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="edit btn btn-secondary btn-sm showGradeLevel" onclick="showGradeLevel('.$row->id.')"><i class="fas fa-eye"></i> View</a> |';
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editPaymentMode" onclick="editPaymentMode('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deletePaymentMode" onclick="deletePaymentMode('.$row->id.')"><i class="fas fa-trash"></i> Delete</a>';
    
                        return $btn;
               })
               ->rawColumns(['actions'])
               ->make(true);
            }
        }

        return view('payment_mode.index');
    }

    public function store()
    {
        if(request()->ajax())
        {
            // payment modes
            $pm = request('title');

            //extract payment modes
           $payment_modes = explode(',', $pm);

           // loop payment modes and get individual payment mode
            foreach($payment_modes as $payment_mode):

                // store each payment mode
                PaymentMode::create(['title' => $payment_mode ]);

            endforeach;
         
            return response()->json('success');
        }
    }

    public function edit(PaymentMode $payment_mode)
    {
        if(request()->ajax())
        {
            return response()->json($payment_mode);
        }
    }

    public function update(PaymentMode $payment_mode)
    {
        if(request()->ajax())
        {
            $payment_mode->update(['title' => request('title')]);
            return response()->json('success');
        }
    }

    public function destroy(PaymentMode $payment_mode)
    {
        if(request()->ajax())
        {
            $payment_mode->delete();
            return response()->json('success');
        }
    }
}
