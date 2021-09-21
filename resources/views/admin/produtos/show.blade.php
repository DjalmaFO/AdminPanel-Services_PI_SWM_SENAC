<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <title>Geek Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <main class="container my-4">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
        @endif
        <div class="row">
            <img src="{{ asset('storage/'.$produto->img_produto)}}" alt="Imagem do produto {{$produto->nm_produto}}">
            <div class="col-6 text-center">
                <h2>{{$produto->nm_produto}}</h2>
                <p>{{ $produto->desc_produto }}</p>
                <span class="h4 d-block">R$ {{$produto->vl_produto}}</span>
                <span class="h4 d-block">{{$produto->qtd_produto}}</span>
                <button class="btn btn-primary">Adicionar no Carrinho</button>
            </div>
        </div>
    </main>
</body>
</html>
