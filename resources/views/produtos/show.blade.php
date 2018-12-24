<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos - {{ $produto->titulo }}</title>
</head>
<body>
<h1>Produtos - {{ $produto->titulo }}</h1>

<ul>
    <li>SKU: {{ $produto->sku }}</li>
    <li>Preço: {{ $produto->preco }}</li>
    <li>Adicionado em: {{ $produto->create_at}}</li>
</ul>

<p>{{ $produto->descricao }}</p>
<a href="javascript:history.go(-1)">Voltar</a>

</body>
</html>