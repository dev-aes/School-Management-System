<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function section()
    {
        return $this->belongsToMany(Section::class);
    }


    //teacher has many subject
    public function subject()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    
    // student has many subject
    // public function student()
    // {
    //     return $this->belongsToMany(Student::class)->withTimestamps();
    // }


    // public function getCreatedAtAttribute($value) {
    //     //return Carbon::parse($value)->format('m-d-Y h:iA');
    //     return Carbon::parse($value)->diffForHumans();
    // }

    // public function getUpdatedAtAttribute($value) {
    //     //return Carbon::parse($value)->format('m-d-Y h:iA');
    //     return Carbon::parse($value)->diffForHumans();
    // }
}
