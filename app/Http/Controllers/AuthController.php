<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){

        //Verifica se existe uma sessão e redireciona o usuario para a view de dashboard
        if(Auth::check() === true ){
            //dd(Auth::user());
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');

    }

    public function showFormLogin(){
        return view('admin.formLogin');
    }

    public function login(Request $request){
        var_dump($request->all());

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']);
        //back() volta uma url atras


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }
}
