@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center mt-3">
        <div class="justify-content-start">
            <h2>{{ `Pedido de ${cliente} - ${email_cliente}` }}</h2>
            <span class="h4 d-block">R$ {{ $valor_total }}</span>
            <span class="h4 d-block">Status: {{ $status }}</span>
            <span class="h4 d-block">ObServações:</span>
            <p>
                {{ $observacao }}
            </p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="px-1">
            <a href="#" class="btn btn-warning btn-sm">Alterar</a>
        </div>
        <div class="px-1">
            <a href="#" class="btn btn-danger btn-sm">Cancelar</a>
        </div>
    </div>
@endsection
