<?php

namespace App\Models;

use App\Models\User;
use App\Models\PaymentMode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }
}
