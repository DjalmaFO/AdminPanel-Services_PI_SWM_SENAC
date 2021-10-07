@extends('layouts.layout_login')
@section('corpo')
      @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    <div class="row px-3">
        <div class="row justify-content-center">
            <img src="{{asset('img/geek-logo.jpg')}}" alt="logo geek style" class="col-lg-3 col-md-4 col-sm-6 col-xs-8">
        </div>
        @if($errors->any())
        <div class="row fs-5 text-danger justify-content-center mt-3 mb-3">
            {{ implode('', $errors->all(':message')) }}
        </div>
        @endif
        <div class="row justify-content-center">
            <form method="POST" class="col-lg-4 col-md-4 col-sm-6 col-xs-8" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="email" value="{{ __('Email') }}">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="password" value="{{ __('Password') }}">Senha</label>
                <input class="form-control" id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar') }}</span>
                </label>
            </div>

            <div class="row justify-content-end mt-4 px-1">
                {{-- @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 col-6 " href="{{ route('register') }}">
                        {{ __('Não sou cadastrado') }}
                    </a>
                @endif --}}

                <x-jet-button class="btn-md btn-primary btn px-3 col-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        </div>
    </div>
@endsection
