<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Teacher;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class GradeLevel extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'description'])
        ->setDescriptionForEvent(fn(string $eventName) =>  auth()->user()->name." has {$eventName} grade level")
        ->useLogName('gradelevel');
        // Chain fluent methods for configuration options
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
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
