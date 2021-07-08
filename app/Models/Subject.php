<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

     protected $guarded = [];
     protected $table = 'subjects';


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
