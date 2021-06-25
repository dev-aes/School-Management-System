<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials) && Gate::allows('admin')) {
            $request->session()->regenerate();
            $this->isOnline($user);
            return redirect(route('home.index'));
        }

        if(Auth::attempt($credentials) && Gate::allows('parent')) {
            $request->session()->regenerate();
            $this->isOnline($user);
            return redirect(route('parent.dashboard'));
        }

        if(Auth::attempt($credentials) && Gate::allows('student')) {
            $request->session()->regenerate();
            $this->isOnline($user);
            return redirect(route('student.dashboard'));
        }

        if(Auth::attempt($credentials) && Gate::allows('teacher')) {
            $request->session()->regenerate();
            $this->isOnline($user);
            return redirect(route('teacher.dashboard'));
        }
    }

    public function isOnline($user)
    {
         User::where('id', $user->id)->update(['status' => 1]);
    }
}
