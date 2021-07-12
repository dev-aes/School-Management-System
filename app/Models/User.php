<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'parent_id',
        'teacher_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getCreatedAtAttribute($value) {
        //return Carbon::parse($value)->format('m-d-Y h:iA');
         //return Carbon::parse($value)->diffForHumans();
    // }

    // public function getUpdatedAtAttribute($value) {
         //return Carbon::parse($value)->format('m-d-Y h:iA');
        // return Carbon::parse($value)->diffForHumans();
    // }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->hasMany(Payment::class);
    }

    public function hasRole($role) {
        if($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
