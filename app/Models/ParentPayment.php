<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentPayment extends Model
{
    //use HasFactory, LogsActivity;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'parent_payments';


    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['parent_id', 'student_id'])
    //     ->setDescriptionForEvent(fn(string $eventName) =>  auth()->user()->name." has sent a payment")
    //     ->useLogName('parent');
    //     // Chain fluent methods for configuration options
    // }

    //  public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->parent_id = $this->parent_id;
    //     $activity->student_id = $this->student_id;
    // }

    
    public function getCreatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
        return Carbon::parse($value)->diffForHumans();
    }


    

  
}
