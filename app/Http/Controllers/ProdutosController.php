<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produtos::all();

        return view('produtos.index', compact('produtos'));
    }

    public function show($id){

        $produto = Produtos::find($id);
        return view('produtos.show', compact('produto'));

    }
}
