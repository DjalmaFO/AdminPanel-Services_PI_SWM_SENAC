@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center">
        <h1 class="text-center">Edição de Produto</h1>
    </div>
    <form method="POST" action="{{ Route('adm.produto.update', $produto->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center mt-3">
            <img class="col-lg-3 col-md-4 col-sm-6 col-xs-8" src="{{ asset('storage/' . $produto->img_produto) }}"
            alt="Imagem do produto {{ $produto->nm_produto }}">
        </div>
        <div class="form-group">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_produto" class="form-control" value="{{ $produto->nm_produto }}">
        </div>
        <div class="form-group">
            <span class="form-label">Descrição</span>
            <textarea class="form-control" name="desc_produto">{{ $produto->desc_produto }}</textarea>
        </div>
        <div class="form-group">
            <span class="form-label">Preço</span>
            <input type="number" min="0.00" max="1000.00" name="vl_produto" step="0.01" value="{{ $produto->vl_produto }}"
                class="form-control">
        </div>
        <div class="form-group">
            <span class="form-label">Quantidade</span>
            <input type="number" min="1" max="1000" name="qtd_produto" step="1" class="form-control"
                value="{{ $produto->qtd_produto }}">
        </div>
        <label for="id_categoria">Categoria</label>
        <select name="id_categoria" id="id_categoria" class="form-control">
            <option selected value="{{ $categoria->id }}">{{ $categoria->nm_categoria }}</option>
            @foreach ($categorias as $c)
                <option value="{{ $c->id }}">{{ $c->nm_categoria }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="img_produto" class="form-label">Alterar Imagem Produto</span>
                <input type="file" id="img_produto" name="img_produto" placeholder="Inserir imagem do produto"
                    class="form-control-file">
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success btn-md">Salvar</button>
            <a href="{{ route('adm.produtos.index') }}" class="btn btn-warning btn-md">Cancelar</a>
        </div>
    </form>
@endsection
