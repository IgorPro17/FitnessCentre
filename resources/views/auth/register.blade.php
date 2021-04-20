@extends('layouts.app')

@section('content')
    <form class="box" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="field">
            <label class="label">Имя</label>
            <div class="control">
                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Имя">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="label">Электронная почта</label>
            <div class="control">
                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" placeholder="Электронная почта">

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
                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" placeholder="Пароль">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="label">Подтвердите пароль</label>
            <div class="control">
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Подтвердите пароль">
            </div>
        </div>

        <button class="button is-primary"><strong>Зарегистрироваться</strong></button>
    </form>
@endsection
