<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectPath()
    {
        if (Gate::allows('admin')) {
            return route('home.index');
        }

        if (Gate::allows('registrar')) {
            return route('home.index');
        }

        if (Gate::allows('cashier')) {
            return route('home.index');
        }

        if (Gate::allows('student')) {
            return route('student.dashboard');
        }

        if (Gate::allows('parent')) {
            return route('parent.dashboard');
        }

        if (Gate::allows('teacher')) {
            return route('teacher.dashboard');
        }
       
    }
}
