@extends('layout.app')
@section('title', 'Adicionar um Produto')
@section('content')
    <h1 class="mb-3">Adicionar um novo Produto</h1>
    <form method="POST" action="{{ route('produtos.store') }}">
        {{ csrf_field() }}

        @include('produtos._form')

        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>

@endsection