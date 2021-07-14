<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMode extends Model
{
    use HasFactory;

    protected $fillable = ['title','account_number', 'status'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
