@extends('layouts.app')

@section('content')
    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <label class="label">Электронная почта</label>
            <div class="control">
                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Электронная почта">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="label">Пароль</label>
            <div class="control">
                <input id="email" id="password" type="password" class="input @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Пароль">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    Запомнить меня
                </label>
            </div>
        </div>

        <button class="button is-primary"><strong>Войти</strong></button>
    </form>
@endsection
