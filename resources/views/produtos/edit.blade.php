@extends('layout.app')
@section('title', 'Adicionar um Produto')
@section('content')
    <h1 class="mb-3">Editar um Produto - {{$produto->titulo}}</h1>
    <form method="POST" action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method"  value="PUT">
        {{ csrf_field() }}

        @include('produtos._form')

        <div class="input-group mb-3">
            <label for="imgproduto">Imagem</label>
            <input class="form-control-file" type="file" id="imgproduto" name="imgproduto">
        </div>

        <br />

        <button type="submit" class="btn btn-primary">Alterar Produto</button>
    </form>

@endsection