@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center mt-3">
        <div class="text-center">
            <h2>{{ 'Pedido de ' . $pedido['cliente'] . ' - ' . $pedido['email_cliente'] }}</h2>
            <span class="h4 d-block">R$ {{ $pedido['valor_total'] }}</span>
            <span class="h4 d-block">Status: {{ $pedido['status'] }}</span>
            <span class="h4 d-block">ObServações:</span>
            <p>
                {{ $pedido['observacao'] }}
            </p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="px-1">
            <a href="{{ route('adm.pedidos.edit', $pedido['id_pedido']) }}" class="btn btn-warning btn-sm">Alterar</a>
        </div>
        <div class="px-1">
            <a href="#" class="btn btn-danger btn-sm">Cancelar</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido['produtos'] as $produto)
                    <tr>
                        <td>{{ $produto['id_produto'] }}</td>
                        <td>{{ $produto['nm_produto'] }}</td>
                        <td>{{ $produto['desc_produto'] }}</td>
                        <td>{{ $produto['vl_produto'] }}</td>
                        <td>{{ $produto['qtd_produto'] }}</td>
                        <td>{{ $produto['vl_total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
