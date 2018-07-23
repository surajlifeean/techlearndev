<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userlogout');
    }
    public function userlogout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
    public function username()
    {
    return 'username';
    }
    public function existsusername(){

        $username=$_REQUEST['username'];
        $user=User::select('username')->where('username','=',$username)->first();
        if(is_null($user)){
            echo '0';
        }
        else{
            echo '1';
        }

    }
    public function existsunamensid(){

        $username=$_REQUEST['username'];
        $sid=$_REQUEST['sid'];
        $user=User::select('username')
        ->where([
                ['username','=',$username],
                ['id','=',$sid]
            ])->first();
        if(is_null($user)){
            echo '0';
        }
        else{
            echo '1';
        }

    }
        public function existsemail(){

        $username=$_REQUEST['username'];
        $user=User::select('email')->where('email','=',$username)->first();
        if(is_null($user)){
            echo '0';
        }
        else{
            echo '1';
        }

    }

}
