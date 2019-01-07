<div class="form-group mb-3">
    <label for="sku">SKU</label>
    <input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o Código do Produto..." value="@if(isset($produto->sku)) {{ $produto->sku }} @endif">
</div>

<div class="form-group mb-3">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o Nome do Produto..." value="@if(isset($produto->titulo)) {{ $produto->titulo }} @endif">
</div>

<div class="form-group mb-3">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto...">@if(isset($produto->descricao)) {{ $produto->descricao }} @endif</textarea>
</div>

<label for="preco">Preço</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">R$</span>
    </div>
    <input type="text" step=".01" class="form-control" id="preco" name="preco" placeholder="0,00"  value="@if(isset($produto->preco)) {{ $produto->preco }} @endif" />
</div>

<br />