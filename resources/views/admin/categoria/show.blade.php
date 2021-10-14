@extends('layouts.dash')
@section('corpo-dash')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="text-center">
            <h2>{{ $categoria->nm_categoria }}</h2>
            <span class="h4 d-block">Categoria: {{ $categoria->nm_categoria }}</span>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div>
            <a href="{{ route('categoria.index') }}" class="btn btn-primary btn-md px-3">Voltar</a>
        </div>
        <div>
            <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-warning btn-md px-3">Editar</a>
        </div>
    </div>
    <div class="mt-4">
    </div>
@endsection
