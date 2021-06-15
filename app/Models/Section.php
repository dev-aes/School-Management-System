<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
