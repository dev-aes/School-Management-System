<?php

namespace App\Models;

use App\Models\Value;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Description extends Model
{
    use HasFactory;

    protected $fillable = ['values_id', 'description'];

    public function value()
    {
        return $this->belongsTo(Value::class, 'values_id');
    }
}
