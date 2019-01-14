<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $request){

        $dados = $request->all();

        if (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])){
            return redirect()->route('produtos.index');
        }else{
            return redirect('login/index');
        }



    }
}
