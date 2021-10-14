@extends('layouts.dash')
@section('corpo-dash')
    <h1>Editar Categoria</h1>
    <form method="POST" action="{{Route('categoria.update', $categoria->id)}}">
        @csrf
        <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_categoria" class="form-control" value="{{ $categoria->nm_categoria }}">
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success btn-md">Salvar</button>
        </div>
    </form>
@endsection
