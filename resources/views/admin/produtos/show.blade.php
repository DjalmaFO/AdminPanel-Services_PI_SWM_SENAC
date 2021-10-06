@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center mt-3">
        <img class="col-lg-3 col-md-4 col-sm-6 col-xs-8" src="{{ asset('storage/' . $produto->img_produto) }}"
            alt="Imagem do produto {{ $produto->nm_produto }}">
    </div>
    <div class="row justify-content-center mt-3">
        <div class="justify-content-start">
            <h2>{{ $produto->nm_produto }}</h2>
            <span class="h4 d-block">R$ {{ $produto->vl_produto }}</span>
            <span class="h4 d-block">Unidades: {{ $produto->qtd_produto }}</span>
            <span class="h4 d-block">Categoria: {{ $categoria->nm_categoria }}</span>
            <span class="h4 d-block">Descrição</span>
            <p>
                {{$produto->desc_produto}}
            </p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 px-1">
            <a href="{{ route('adm.produtos.index') }}" class="btn btn-primary btn-md px-3">Voltar</a>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 px1">
            <a href="{{ Route('adm.produto.edit', $produto->id) }}" class="btn btn-warning btn-md px-3">Editar</a>
        </div>
    </div>
@endsection
