@extends('layout.app')
@section('title', 'Adicionar um Produto')
@section('content')

    <link href="{{ asset('css/telaLogin.css') }}" rel="stylesheet">

    <div style="text-align: center">
        <h2><strong>Login - Sistema de Compras </strong></h2>
    </div>

    <div class="col-md-12">
        <!-- Start form -->
        <form action="{{ route('login.auth') }}" method="post">
            {{ csrf_field() }}
            <div class="row col-md-8">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Enter email">
            </div>
            <div class="row col-md-8">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="row col-md-8">
                <button type="submit" class="btn btn-primary">Acessar</button>
            </div>
        </form>


        <!-- End form -->
    </div>
@endsection
