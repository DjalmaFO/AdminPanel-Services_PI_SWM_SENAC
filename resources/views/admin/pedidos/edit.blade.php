@extends('layouts.dash')
@section('corpo-dash')
    <h1>Alterar Pedido</h1>
    <form method="POST" action="{{ route('adm.pedidos.update', $pedido->id) }}">
        @csrf
        <div class="row">
            <span class="form-label">ID Pedido</span>
            <span type="text" name="nm_categoria" class="form-control">{{ $pedido->id }}</span>
        </div>
        <div class="row">
            <label for="id_categoria">Categoria</label>
            <select name="status" id="status">
                <option selected value="{{ $pedido->status }}">{{ $pedido->status }}</option>
                <option value="C">Cancelado</option>
                <option value="E">Entregue</option>
                <option value="N">Novo</option>
            </select>
        </div>
        <div class="row justify-content-center  mt-3">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-md">Salvar</button>
            </div>
            <div class="text-center">
                <a href="{{ route('adm.pedidos.index') }}" class="btn btn-warning btn-md">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
