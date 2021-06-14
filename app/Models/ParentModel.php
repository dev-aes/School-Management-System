<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentModel extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = ['name', 'email', 'contact', 'facebook'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'parent_student', 'parent_id', 'student_id');
    }
}
