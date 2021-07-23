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

  
    public function getCreatedAtAttribute($value) {
        return date('m-d-y h:iA', strtotime($value));
    }

    public function getUpdatedAtAttribute($value) {
        return date('m-d-y h:iA', strtotime($value));
    }
}
