@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center">
        <h1 class="text-h4 text-center">
            Relação de pedidos
        </h1>
    </div>
    @if (empty($pedidos))
        <div class="row justify-content-center">
            <h2>Sem pedidos</h2>
        </div>
    @else
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Observações</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nome }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->status }}</td>
                            <td>{{ $p->observacao }}</td>

                            <td>
                                <a href="{{route('adm.pedidos.show', $p->id)}}" class="btn btn-sm btn-success">Detalhar</a>
                                <a href="{{route('adm.pedidos.edit', $p->id)}}" class="btn btn-sm btn-warning">Alterar</a>
                                <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
