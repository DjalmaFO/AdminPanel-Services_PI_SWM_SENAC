
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar produtos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body >
    @include('admin.layouts.menu')
    <main  class="container my-4">
        <h1>Editar produto</h1>
        <form method="POST" action="{{Route('adm.produto.update', $produto->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row text-center">
                <img src="{{ asset('storage/'.$produto->img_produto)}}" alt="Imagem do produto {{$produto->nm_produto}}">
            </div>
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
            <label for="id_categoria">Categoria</label>
                <select name="id_categoria" id="id_categoria">
                    <option selected="{{$categoria->id}}">{{$categoria->nm_categoria}}</option>
                    @foreach ($categorias as $c)
                        <option value="{{$c->id}}">{{$c->nm_categoria}}</option>
                    @endforeach
                </select>
            <div class="row">
                <label for="img_produto" class="form-label">Alterar Imagem Produto</span>
                <input type="file" id="img_produto" name="img_produto" placeholder="Inserir imagem do produto" class="form-control-file">
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-success btn-md">Salvar</button>
                <a href="{{route('adm.produtos.index')}}" class="btn btn-warning btn-md">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>
