<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script>
        function remover(route){
            if(confirm('Você deseja remover este produto?'))
                window.location = route;
        }
    </script>
</head>
<body class="container mt-5">
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success')}}
        </div>
    @endif
    <h1>Lista de Produtos</h1>
    <a href="{{ Route('adm.produto.create')}}" class="btn btn-lg btn-primary">Criar Produto</a>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nm_produto}}</td>
                        <td>{{$produto->desc_produto}}</td>
                        <td>{{$produto->vl_produto}}</td>
                        <td>{{$produto->qtd_produto}}</td>

                        <td>
                            <a href="{{ Route('adm.produto.show', $produto->id) }}" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{ Route('adm.produto.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" onclick="remover('{{ Route('adm.produto.destroy', $produto->id) }}');" class="btn btn-sm btn-danger">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

