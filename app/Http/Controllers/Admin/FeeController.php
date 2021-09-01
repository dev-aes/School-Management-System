<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use Yajra\DataTables\Facades\DataTables;

class FeeController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(GradeLevel::all())
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                   
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="text-decoration-none editFee" onclick="editFee('.$row->id.')"><i class="fas fa-edit"></i> Edit</a>';

                    return $btn;
           })
           ->rawColumns(['actions'])
           ->make(true);
        }
        return view('fee.index');
    }

    public function create()
    {
        if(request()->ajax()) {

            
            return $this->res(GradeLevel::all()); // display all grade levels in fee form
        }
    }

    public function store(FeeRequest $request)
    {
        if(request()->ajax()) {

            $data = $request->validated();

        
            foreach (array_combine(request('fee_description'), request('fee_amount')) as $description => $amount):
            
                  $fee = DB::table('fees')
                       ->where('description', $description)
                       ->where('grade_level_id', $data['grade_level_id'])
                       ->get();

                       if(!$fee->count() > 0) 
                       {
                           $ay = get_latest_academic_year();
                            $inputs = ['grade_level_id' => $data['grade_level_id'],
                                    'description' => $description,
                                    'amount' => $amount,
                                    'academic_year_id' => $ay->id];

                            DB::table('fees')->insert($inputs);
                            // update the total sub fee in the grade_levels_table
                            DB::update("UPDATE grade_levels SET total_amount = total_amount + $amount WHERE id = $data[grade_level_id]");
                        }
                        else 
                        {
                            return $this->error();
                        }
            endforeach;
            
            return $this->success();

        }
    }

    public function displaySubFeeByGradeLevelID(GradeLevel $gradeLevel)
    {
        if(request()->ajax()) {
           $sub_fees = Fee::where('grade_level_id', $gradeLevel->id)->get();
           $total_fee = DB::select("Select sum(amount) as total FROM fees WHERE grade_level_id = $gradeLevel->id");

           return $this->res([$sub_fees, $total_fee]);
        }
    }

    public function destroy(Fee $fee) 
    {
        if(request()->ajax())
        {
            DB::update("UPDATE grade_levels SET total_amount = total_amount - $fee->amount WHERE id = $fee->grade_level_id");
            $fee->delete();

            return $this->success();
        }
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            return $this->res($id);
        }
    }


}
