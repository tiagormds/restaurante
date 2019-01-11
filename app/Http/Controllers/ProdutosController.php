<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produtos::paginate(4);

        return view('produtos.index', compact('produtos'));
    }

    public function show($id){

        $produto = Produtos::find($id);
        return view('produtos.show', compact('produto'));

    }

    public function create(){
        return view('produtos.create');
    }

    public function store(Request $request){

        $mensagem = ([
            'sku.required' => 'O sku é obrigatório',
            'titulo.required' => 'O titulo é obrigatório',
            'descricao.required' => 'A descricao é obrigatório',
            'preco.required' => 'O preco é obrigatório',
            'descricao.min' => 'A descrição tem que conter no mínimo 10 caracteres.'

        ]);

        $this->validate($request, [
            'sku' => 'required|unique:produtos|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric',
        ], $mensagem);


        $produto = new Produtos();

        $produto->sku = $request->input('sku');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($produto->save()){
            return redirect()->route('produtos.create')->with('status', 'Produto Cadastrado com Sucesso!');
        }
    }

    public function edit($id){

        $produto = Produtos::find($id);
        return view('produtos.edit', compact('produto', 'id'));

    }

    public function update(Request $request, $id){

        $produto = Produtos::find($id);

        $mensagem = ([
            'sku.required' => 'O sku é obrigatório',
            'titulo.required' => 'O titulo é obrigatório',
            'descricao.required' => 'A descricao é obrigatório',
            'preco.required' => 'O preco é obrigatório',

        ]);

        $this->validate($request, [
            'sku' => 'required|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric',
        ], $mensagem);

        if($request->hasFile('imgproduto')){
            $imagem = $request->file('imgproduto');
            $nomeArquivo = md5($id).".".$imagem->getClientOriginalExtension();
            $request->file('imgproduto')->move(public_path('./img/produtos/'), $nomeArquivo);
        }

        $produto->sku = $request->get('sku');
        $produto->titulo = $request->get('titulo');
        $produto->descricao = $request->get('descricao');
        $produto->preco = $request->get('preco');

        if($produto->save()){
            return redirect('produtos/edit/'.$id)->with('status', 'Produto atualizado com Sucesso!');
        }
    }

    public function destroy($id){

        $produto = Produtos::find($id);

        if(file_exists("./img/produtos/".md5($id).".jpg")){
            unlink("./img/produtos/".md5($id).".jpg");
        }

        $produto->delete();

        return redirect()->back()->with('status', 'Produto excluído com sucesso!');
    }

    public function buscar(Request $request){

        $buscaInput = $request->input('buscar');

        $produtos = Produtos::where('titulo', 'LIKE', '%'.$buscaInput.'%')
                            ->orwhere('descricao', 'LIKE', '%'.$buscaInput.'%')
                            ->paginate(4);

        return view('produtos.index', compact('produtos', 'buscaInput'));
    }
}
