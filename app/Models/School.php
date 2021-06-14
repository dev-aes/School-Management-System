<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCreatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
        return Carbon::parse($value)->diffForHumans();
    }
}
