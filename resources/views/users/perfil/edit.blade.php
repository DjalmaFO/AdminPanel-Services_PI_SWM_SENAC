@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center">
        <h1 class="text-center">Edição de Perfil</h1>
    </div>
    <form method="POST" action="{{ route('update.perfil') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center mt-3">
            <img class="col-lg-2 col-md-2 col-sm-3 col-xs-4"
            @if (sizeOf($info) > 0)
            src="{{ asset('storage/' . $info->img_user) }}"

            @else
                src="#"
            @endif
            alt="Imagem do usuário {{ $user->name }}">
        </div>
        <div class="form-group">
            <span class="form-label">Nome</span>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <span class="form-label">Sobrenome</span>
            <input type="text" name="sobrenome" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->sobrenome }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">CEP</span>
            <input type="text" name="cep" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->cep }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">Endereço</span>
            <input type="text" name="endereco" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->endereco }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">Numero</span>
            <input type="text" name="numero" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->numero }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">Complemento</span>
            <input type="text" name="complemento" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->complemento }}"
            @endif>
        </div>
        <div class="form-group">
            <span class="form-label">Bairro</span>
            <input type="text" name="bairro" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->bairro }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">Cidade</span>
            <input type="text" name="cidade" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->cidade }}"
            @endif
            >
        </div>
        <div class="form-group">
            <span class="form-label">Estado</span>
            <input type="text" name="estado" class="form-control"
            @if (sizeOf($info) > 0)
                value="{{ $info->estado }}"
            @endif>
        </div>
        <div class="form-group">
            <label for="img_user" class="form-label">Alterar Imagem Usuário</span>
                <input type="file" id="img_user" name="img_user" placeholder="Inserir imagem do usuário"
                    class="form-control-file">
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success btn-md">Salvar</button>
            <a href="{{ route('perfil') }}" class="btn btn-warning btn-md">Cancelar</a>
        </div>
    </form>
@endsection
