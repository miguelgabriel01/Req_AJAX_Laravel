<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {

        //Verifica se existe uma sessão e redireciona o usuario para a view de dashboard
        if (Auth::check() === true) {
            //dd(Auth::user());
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function showFormLogin()
    {
        return view('admin.formLogin');
    }

    public function login(Request $request)
    {
        //var_dump($request->all());

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            //return redirect()->back()->withInput()->withErrors(['O Email informadoé ibnvalido']);

            $login['success'] = false; //false pq o usuario n conseguiu fazer o login
            $login['message'] = "O Email informado não é valido!";
            echo json_encode($login); //converte a variavel em json
            return;
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            //return redirect()->route('admin');

            $login['success'] = true; //true pq o usuario conseguiu fazer o login
            //$login['message'] = "O Email informado não é valido!";//não tem msg pq o controller vai apenas fazer o redirecionamento
            echo json_encode($login); //converte a variavel em json
            return;
        }

        //return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']);
        //back() volta uma url atras
        $login['success'] = false; //false pq o usuario n conseguiu se logar
        $login['message'] = "Os dados informados não conferem!";
        echo json_encode($login); //converte a variavel em json
        return;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
