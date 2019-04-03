<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:4'
        ]);

        $emlpoye_data =array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($emlpoye_data)){
            return redirect('/login/successlogin');
        }
        else{
            return back()->with('error','Wrong login details');
        }

        return 'ss';
    }

    public function successlogin(){

        return view('/basic');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
