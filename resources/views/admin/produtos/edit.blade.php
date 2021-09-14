
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar produtos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h1>Editar produto</h1>
    <form method="POST" action="{{Route('adm.produto.update', $produto->id)}}">
        @csrf
        <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_produto" class="form-control" value="{{$produto->nm_produto}}">
        </div>
        <div class="row">
            <span class="form-label">Descrição</span>
            <textarea class="form-control" name="desc_produto">{{$produto->desc_produto}}</textarea>
        </div>
        <div class="row">
            <span class="form-label">Preço</span>
            <input type="number" min="0.00" max="1000.00" name="vl_produto" step="0.01" value="{{$produto->vl_produto}}" class="form-control">
        </div>
        <div class="row">
            <span class="form-label">Quantidade</span>
            <input type="number" min="0" max="1000" name="vl_produto" step="0.01" class="form-control" value="{{$produto->qtd_produto}}">
        </div>
        <div class="row"> 
            <span class="form-label">Categoria</span>
            <input type="text" name="id_categoria" class="form-control">
        </div>
        <div class="row mt-4">
            <button type="submit" class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
    <ul>

    </ul>
</body>
</html>


<h2>Edição do produto - {{$produto->nm_produto}}</h2>
@foreach ($categorias as $categoria)
    <p>{{$categoria->nm_categoria}}</p>
@endforeach