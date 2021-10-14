@extends('layouts.dash')
@section('corpo-dash')
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success')}}
    </div>
@endif
<h1>Lista de Categorias</h1>
<div class="row mt-3 justify-content-end">
    <a href="{{route('categoria.create')}}" class="btn btn-sm btn-primary">Criar Categoria</a>
</div>
<div class="row mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nm_categoria}}  </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                        <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" onclick="remover(' {{ route('categoria.destroy', $cat->id )}} ');" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection