<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <title>Geek Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    @include('admin.layouts.menu')
    <main  class="container mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
        @endif
        <div class="row text-center">
            <img src="{{ asset('storage/'.$produto->img_produto)}}" alt="Imagem do produto {{$produto->nm_produto}}">
        </div>
        <div class="row text-center">
            <div class="text-center">
                <h2>{{$categoria->nm_categoria}}</h2>
                <span class="h4 d-block">Categoria: {{$categoria->nm_categoria}}</span>
            </div>
            <div class="text-center mt-4">
                <a href="{{route('adm.categoria.index')}}" class="btn btn-primary btn-md">Voltar</a>
            </div>
        </div>
        <div class="mt-4">
        </div>
    </main>
</body>
</html>
