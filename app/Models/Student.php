<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Section;
use App\Models\ParentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    //student has many fee

    public function fee()
    {
        return $this->belongsToMany(Fee::class)->withTimestamps();

    }

    public function parents()
    {
        return $this->belongsToMany(ParentModel::class, 'parent_student','student_id', 'parent_id');
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
