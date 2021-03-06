<?php

namespace App\Http\Controllers\Admin;

use App\Models\Value;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ValuesController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Value::all())
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm editValues" onclick="editValues('.$row->id.')"><i class="fas fa-edit"></i> Edit</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-secondary btn-sm " onclick="assign_description('.$row->id.')"><i class="fas fa-plus-circle"></i> Statement</a> |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-secondary btn-sm deleteValues" onclick="crud_delete(\' '.'a.deleteValues'.' \' , \'values.destroy\', \' '.'Values Deleted'.' \' , \' '.'.valuesDT'.' \' )"><i class="fas fa-trash"></i> Delete</a>';

                    return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('values.index');
    }


    // creating description for values 
    public function create()
    {
        if(request()->ajax())
        {
            $value = Value::where('id', request('id'))->first();

            return response()->json($value);
        }
    }

    public function store()
    {
        if(request()->ajax())
        {
             // get the requested roles ( Array )

             $values = explode(',',request('title'));

             foreach($values as $value):
 
                 $check_value = Value::where('title', $value)->first();
 
                 if($check_value):
 
                    return $this->danger();
 
                 endif;
 
               $val =  Value::create(['title' => $value]); // get individual values for activity_log

               $this->log_activity($val,'created','Values',$val->title);

 
             endforeach;
             
             return $this->success();
 
        }
    }

    public function store_description()
    {
        if(request()->ajax())
        {
            $data = request()->validate([
                'values_id' => 'required|integer',
                'description' => 'required|string'
            ]);

          $description = Description::create([
                                    'values_id' => $data['values_id'],
                                    'description' => $data['description']
            ]);

            $values = Value::where('id', $data['values_id'])->first();

            $this->log_activity($description,'assigned','description to values', $values->title);

            return $this->success();
        }
    }

    public function edit(Value $value)
    {
        if(request()->ajax())
        {

            $values_description = Value::with('descriptions')->where('id', $value->id)->first();

            return response()->json($values_description);
        }
    }

    public function update(Value $value)
    {
        if(request()->ajax())
        {
            $value->update(['title' => request('title')]);

            $this->log_activity($value,'updated','Values',$value->title);


            return $this->success();
        }
    }

    public function values_description_destroy(Description $description)
    {
        if(request()->ajax())
        {
            $this->log_activity($description,'deleted','Description', $description->description);

            $description->delete();
            return $this->success();
        }
    }

    public function destroy(Value $value)
    {
        if(request()->ajax())
        {
            $this->log_activity($value,'deleted','Values',$value->title);

            $value->delete();

            return $this->success();
        }
    }
}
