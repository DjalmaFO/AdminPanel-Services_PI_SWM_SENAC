@extends('layouts.dash')
@section('corpo-dash')
    <h1>Editar Categoria</h1>
    <form method="POST" action="{{route('categoria.update', $categoria->id)}}">
        @csrf
        <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_categoria" class="form-control" value="{{ $categoria->nm_categoria }}">
        </div>
        <div class="row justify-content-center  mt-3">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-md">Salvar</button>
            </div>
            <div class="text-center">
                <a href="{{route('categoria.index')}}"  class="btn btn-warning btn-md">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
