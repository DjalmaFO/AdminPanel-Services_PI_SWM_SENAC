@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center">
        <h1 class="text-center">Cadastro de Produto</h1>
    </div>
    <div class="row justify-content-center">
        <form method="POST" class="col-lg-8 col-sm-10 col-xs-12" action="{{ Route('adm.produto.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Nome</label>
                <input type="text" name="nm_produto" class="form-control">
            </div>
            <div class="form-group">
                <span class="form-label">Descrição</span>
                <textarea class="form-control" name="desc_produto"></textarea>
            </div>
            <div class="form-group">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="1000.00" name="vl_produto" step="0.01" class="form-control">
            </div>
            <div class="form-group">
                <span class="form-label">Quantidade</span>
                <input type="text" name="qtd_produto" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="id_categoria">Categoria</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    @foreach ($categorias as $c)
                        <option value="{{ $c->id }}">{{ $c->nm_categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="img_produto" class="form-label">Imagem Produto</span>
                    <input type="file" id="img_produto" name="img_produto" placeholder="Inserir imagem do produto"
                        class="form-control-file">
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-success btn-md">Salvar</button>
                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-md">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
