<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    protected function redirectTo(){
        $user = auth()->user();
        if($user->role=='candidate')
            return '/';
        else if($user->role=='employer')
            return '/employers/'.$user->id.'/dashboard';    
        else if($user->role=='receptionist')
            return '/reception/'.$user->id.'/dashboard';
        else if($user->role=='accountant')
            return '/accounts/'.$user->id.'/dashboard';    
        else if($user->role=='immigration counsellor')
            return '/immigrations/'.$user->id.'/dashboard';
        else if($user->role=='local jobs counsellor')
            return '/locals/'.$user->id.'/dashboard';
        else if($user->role=='overseas jobs counsellor')
            return '/overseas/'.$user->id.'/dashboard';
        else if($user->role=='admin')
            return '/admins/'.$user->id.'/dashboard';
        else if($user->role=='doctor')
            return '/doctors/'.$user->id.'/dashboard';

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
