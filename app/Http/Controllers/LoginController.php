<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function create(){

        return view('login');
    }

    public function loginpost(Request $request){

     $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
    		return redirect()->route('features.index');
    	}
    	return false;
    }
}
