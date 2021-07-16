<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AcademicYearController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(AcademicYear::all())
            ->addIndexColumn()
            ->addColumn('actions',function($row) {

                $get_active_ay = AcademicYear::where('status', 1)->first();

                if($get_active_ay->id == $row->id)
                {
                    $btn = ' <a href="javascript:void(0)" class="text-decoration-none text-danger" id="ay_disabled"><i class="fas fa-trash"></i> Delete</a>';
                }
                else
                {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-decoration-none text-danger deleteAccademicYear" onclick="crud_delete(\' '.'a.deleteAccademicYear'.' \' , \'academic_year.destroy\', \' '.'Academic Year Deleted'.' \' , \' '.'.academic_year_DT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

                }
         
                return $btn;
            })
           ->rawColumns(['actions'])
           ->make(true);
        }

        return view('academic_year.index');
    }

    public function store()
    {
        if(request()->ajax())
        {
            $ay = request('academic_year');

           $academic_years = explode(',', $ay);


           foreach($academic_years as $academic_year):

            AcademicYear::create(['academic_year' => $academic_year ]);

           endforeach;
         
            return response()->json('success');
        }
    }

    public function destroy(AcademicYear $academic_year)
    {
        if(request()->ajax())
        {
            $academic_year->delete();

            return response()->json('success');
        }
    }
    public function update(AcademicYear $academic_year)
    {
        if(request()->ajax())
        {   
            // activate only the selected academic Year
            $academic_year->update(['status' => 1]);
            
            $unselected_ay = AcademicYear::where('id', '!=', $academic_year->id)->get();

            foreach($unselected_ay as $ay):
                // deactivate the unselected academic year
                $ay->update(['status' => 0]);

            endforeach;

            return response()->json('success');
        }
    }

    public  static function getAcademicYear(){
        return DB::table('academic_years')->where('status',1)->first();

        //Get the objects of AY
        //$ay = AcademicYearController::getAcademicYear();
    }

}
