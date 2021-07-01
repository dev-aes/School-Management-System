<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory, LogsActivity;

     protected $guarded = [];


    //protected static $logAttributes = ['name', 'description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'description'])
        ->setDescriptionForEvent(fn(string $eventName) =>  auth()->user()->name." has {$eventName} subject")
        ->useLogName('subject');
        // Chain fluent methods for configuration options
    }

    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->test = $this->name;
    // }

     //subject has many teacher
     public function teacher()
     {
         return $this->belongsToMany(Teacher::class);
     }

     public function grade_level()
     {
         return $this->belongsToMany(GradeLevel::class);
     }

    // public function getCreatedAtAttribute($value) {
    //     //return Carbon::parse($value)->format('m-d-Y h:iA');
    //     return Carbon::parse($value)->diffForHumans();
    // }

    // public function getUpdatedAtAttribute($value) {
    //     //return Carbon::parse($value)->format('m-d-Y h:iA');
    //     return Carbon::parse($value)->diffForHumans();
    // }

   
}
