<?php

namespace App\Models;

use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = ['grade_level_id', 'description', 'amount'];

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function student()
    {
        return $this->belongsToMany(Fee::class)->withTimestamps();
    }

}
