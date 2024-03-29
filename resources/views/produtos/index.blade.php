@extends('layout.app')
@section('title', 'Lista de Produtos')
@section('content')

    <div class="row" >
        <div class="col-md-12">
                <form method="POST" action="{{ route('produtos.buscar') }}">
                    {{ csrf_field() }}

                    <div class="input-group col-md-12">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="buscar" id="buscar"
                                   value=" @if(isset($buscaInput)) {{$buscaInput}} @else Digite para pesquisar os produto no site... @endif">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-sm btn-default">Buscar</button>
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


                @guest
                    <p class="text-info" ><a href="{{ route('login') }}">Faça o Login para ver as opções.</a></p>
                @else
                <div class="mb-3">
                    <form method="POST" action="{{ route('produtos.destroy', $produto->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <a class="btn btn-primary" href="{{route('produtos.edit', $produto->id)}}">Editar</a>

                        <button class="btn btn-danger">Excluir</button>
                    </form>

                </div>
                @endguest
            </div>
        @endforeach
    </div>
    {{ $produtos->appends($_GET)->links() }}
@endsection
