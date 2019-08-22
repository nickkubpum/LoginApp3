<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use DB;

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
    // protected $redirectTo = 'http://epayroll.cgd.go.th/CGDQTN/Ent/AssessmentFillServlet?frmCde=20160001&act=UPDMEM';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $loginType = request()->input('username');
        $this->username = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' ;
        request()->merge([$this->username => $loginType]);

        // //insert data log
        // $ip = request()->input('ip');
        // // $event = request()->input('event');
        // $event = "Login";
        // $data=array('ip'=>$ip,"event"=>$event);
        // DB::table('log_event')->insert($data);
        // //

        return property_exists($this, 'username') ? $this->username : 'email';
    }

}
