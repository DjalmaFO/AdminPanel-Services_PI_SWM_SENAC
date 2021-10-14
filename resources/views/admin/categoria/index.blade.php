@extends('layouts.dash')
@section('corpo-dash')
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success')}}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error')}}
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
                <th class="text-center">ID</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $cat)
                <tr>
                    <td class="text-center">{{$cat->id}}</td>
                    <td class="text-center">{{$cat->nm_categoria}}  </td>
                    <td class="text-center">
                        {{-- <a href="{{ route('categoria.show', $cat->id) }}}" class="btn btn-sm btn-success">Visualizar</a> --}}
                        <form action="{{ route('categoria.destroy', $cat->id) }}" method="post">
                            <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
