<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = "/admin/index";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
    *   generate login form
    * @auth ThienTh
    * @date 2017-04-10
    * @return view
    */
    public function login(){
        return view("login");
    }

    /**
    *   check username/password login
    * @auth ThienTh
    * @date 2017-04-10
    * @return view/redirect
    */
    public function postLogin(Request $request){
        // Laravel auth library to check user infor
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return view("login", ["msg" => 'wrong username/password']);
        }
    }

    /**
    *   check username/password login
    * @auth ThienTh
    * @date 2017-04-10
    * @return view/redirect
    */
    public function logout(Request $request){
        Auth::logout();
        return redirect(route('homepage'));     
    }
}
