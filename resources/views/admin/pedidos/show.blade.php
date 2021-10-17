@extends('layouts.dash')
@section('corpo-dash')
    {{-- <div class="row justify-content-center mt-3">
        <img class="col-lg-3 col-md-4 col-sm-6 col-xs-8" src="{{ asset('storage/' . $produto->img_produto) }}"
            alt="Imagem do produto {{ $produto->nm_produto }}">
    </div> --}}
    @foreach ($pedido as $p)
    <div class="row justify-content-center mt-3">
        <div class="justify-content-start">
            <h2>{{ `Pedido de ${$p->cliente} - ${$p->email_cliente}` }}</h2>
            <span class="h4 d-block">R$ {{ $p->valor_total }}</span>
            <span class="h4 d-block">Status: {{ $p->status }}</span>
            <span class="h4 d-block">ObServações:</span>
            <p>
                {{ $p->observacao }}
            </p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 px1">
            <a href="#" class="btn btn-warning btn-md px-3">Alterar</a>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 px-1">
            <a href="#" class="btn btn-danger btn-md px-3">Cancelar</a>
        </div>
    </div>
    @endforeach
@endsection
