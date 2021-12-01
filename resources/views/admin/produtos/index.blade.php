@extends('layouts.dash')
@section('corpo-dash')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success')}}
        </div>
    @endif

     <div class="row justify-content-center">
        <h1 class="text-center">Produtos</h1>
    </div>
    <div class="row justify-content-end mb-3">
        <a href="{{ Route('adm.produto.create')}}" class="btn btn-sm btn-primary">Novo Produto</a>
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
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nm_produto}}</td>
                        <td>{{$produto->desc_produto}}</td>
                        <td>{{$produto->vl_produto}}</td>
                        <td>{{$produto->qtd_produto}}</td>

                        <td class="row">
                            <a href="{{ Route('adm.produto.show', $produto->id) }}" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{ Route('adm.produto.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('adm.produto.destroy', $produto->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$produtos->links()}}

        <p>
            {{$produtos->count()}} de {{ sizeOf(DB::select('select * from produtos')) }} produtos(s).
        </p>
    </div>
@endsection

