<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    public $appendingUser = 0;
    public $isAdmin = 1;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    protected function redirectTo()
    {
        if (Auth::user()->isAdmin == $this->isAdmin) {
                return 'home';
        }
        if (Auth::user()->appendingUser == $this->appendingUser) {
                
                return '/logout';
        }
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
