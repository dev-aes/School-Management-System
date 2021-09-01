<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use BadMethodCallException;
use Spatie\Activitylog\Models\Activity;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $student_id;
    protected $parent_id;

    public function success() {
       
        return response()->json('success');
    }

    public function danger() {
        return response()->json('error');
    }

    public function all() {
        return response()->json(request()->all());
    }

    public function res($response) {
        return response()->json($response);
    }

    public function log_activity($model, $event, $model_name, $model_property_name = '', $opt = 'a', $parent_id = '', $student_id = '' )
    {
        $this->student_id = $student_id;
        $this->parent_id = $parent_id;

        $a = $this->student_id;
        $b = $this->parent_id;

        $user = auth()->user();
        activity()
        ->causedBy($user)
        ->performedOn($model)
        ->withProperties(['name', 'description'])
        ->tap(function(Activity $activity) {

            $a = $this->student_id;
            $b = $this->parent_id;
    
            $activity->parent_id = $b;
            $activity->student_id = $a;
         })
        ->log("$user->name has $event $opt $model_name - $model_property_name");
        
        
    }

}
