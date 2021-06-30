<?php

namespace App\Models;

use App\Models\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';
    protected $fillable = ['title'];

    public function descriptions()
    {
        return $this->hasMany(Description::class, 'values_id', 'id');
    }
}
