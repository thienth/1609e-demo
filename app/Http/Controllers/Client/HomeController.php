<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	/**
	*	generate login form
	* @auth ThienTh
	* @date 2017-04-10
	* @return view
	*/
    public function login(){
    	return view("login");
    }

    /**
	*	check username/password login
	* @auth ThienTh
	* @date 2017-04-10
	* @return view/redirect
	*/
    public function postLogin(Request $request){
		// Laravel auth library to check user infor
    	if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
    		// dd(Auth::user()->id);
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        }else{
        	return view("login", ["msg" => 'wrong username/password']);
        }
    }
}
