@extends('layout.app')
@section('title', 'Lista de Produtos')
@section('content')
    <h1>Produtos</h1>

    <div class="row" >
        <div class="col-md-12">
            <form method="POST" action="{{ route('produtos.buscar') }}">
                {{ csrf_field() }}

                <div class="input-group col-md-10">
                    <input class="form-control" type="text" name="buscar" id="buscar"
                           placeholder="Procurar Produto no site..." value=" @if(isset($buscaInput)) {{$buscaInput}} @endif">

                    <div class="input-group-addon col-md-2">
                        <button class="btn btn-outline-secondary">Buscar</button>
                    </div>

                </div>
            </form>

        </div>

    </div>

    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-4">
                <h4 class="text-center"><a href="{{route('produtos.show', $produto->id)}}">{{ $produto->titulo }}</a>
                </h4>

                @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
                    <img src="{{ url('img/produtos/'.md5($produto->id).'.jpg') }}" alt="Imagem Produto"
                         class="img-fluid img-thumbnail">
                @endif

                <div class="mb-3">
                    <form method="POST" action="{{ route('produtos.destroy', $produto->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <a class="btn btn-primary" href="{{route('produtos.edit', $produto->id)}}">Editar</a>

                        <button class="btn btn-danger">Excluir</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
@endsection