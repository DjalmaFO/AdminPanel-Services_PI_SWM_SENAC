@extends('layouts.layout_login')
@section('corpo')
    <div class="row px-3">
        <div class="row justify-content-center">
            <img src="{{ asset('img/geek-logo.jpg') }}" alt="logo geek style" class="col-lg-3 col-md-4 col-sm-6 col-xs-8">
        </div>
        <div class="row justify-content-center">
            <form class="col-lg-4 col-md-4 col-sm-6 col-xs-8" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb-3">
                    <label class="input-group-text" for="name" value="{{ __('Name') }}"> Nome </label>
                    <input  id="name" class="form-control" type="text" name="name" :value="old('name')" required placeholder="Digite um nome de usuário"
                        autofocus autocomplete="name" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="email" value="{{ __('Email') }}" >Email</label>
                    <input class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Digite um email"
                        required />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="password" value="{{ __('Password') }}" >Senha</label>
                    <input id="password" class="form-control" type="password" name="password" required placeholder="Digite uma senha"
                        autocomplete="new-password" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="password_confirmation" value="{{ __('Confirm Password') }}">Senha</label>
                    <input id="password_confirmation" class="form-control" type="password" placeholder="Confirme a senha"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
                                            'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
                                        ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="row justify-content-end mt-4 px-1">
                    <a class="text-sm text-gray-600 hover:text-gray-900 col-6" href="{{ route('new.login') }}">
                        {{ __('Já é cadastrado?') }}
                    </a>

                    <x-jet-button class="btn-md btn-primary btn px-3 col-4">
                        {{ __('Registrar') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
@endsection
