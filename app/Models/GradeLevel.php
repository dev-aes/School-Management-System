<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradeLevel extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function subject()
    {
        //return $this->hasMany(Subject::class);
        return $this->belongsToMany(Subject::class);
    }

  
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
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
