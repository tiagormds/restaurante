<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){

        $credenciais = [
            'email' => $request['email'],
            'password'  => $request['password']
        ];

        if (Auth::attempt($credenciais)){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->back()->with('msgerror', 'Usuário os senha inválidos');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('status', 'Deslogado com sucesso!');
    }
}
