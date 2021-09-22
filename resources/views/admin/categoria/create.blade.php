<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar Categoria</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h1>Cadastrar Categoria</h1>
    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_categoria" class="form-control">
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success btn-md">Salvar</button>
        </div>
    </form>
</body>
</html>