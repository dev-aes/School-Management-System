<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use HasFactory, Notifiable, LogsActivity;
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

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['name', 'email'])
    //     ->setDescriptionForEvent(fn(string $eventName) =>  auth()->user()->name." has {$eventName} user")
    //     ->useLogName('user');
    // Chain fluent methods for configuration options
    // }

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

    public function hasRole($role) {
        if($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
