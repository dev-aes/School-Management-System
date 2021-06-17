<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Section;
use App\Models\Student;
use App\Models\ParentModel;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['first_name', 'last_name', 'email'])
        ->setDescriptionForEvent(fn(string $eventName) =>  auth()->user()->name." has {$eventName} student")
        ->useLogName('student');
        // Chain fluent methods for configuration options
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    //student has many teacher
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    //student has many fee

    public function fee()
    {
        return $this->belongsToMany(Fee::class)->withTimestamps();

    }

    public function parents()
    {
        return $this->belongsToMany(ParentModel::class, 'parent_student', 'parent_id', 'student_id');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }   

    public function getCreatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
        return Carbon::parse($value)->diffForHumans();
    }
}
