@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">{{ isset($coach) ? 'Редактирование информации о тренере ' . $coach->name : 'Создать запись о тренере' }}</h3>

        <a class="button is-warning" href="{{ route('coach.index') }}">Назад</a><br><br>
        <form method="POST" @if (isset($coach)) action="{{ route('coach.update', $coach) }}"
            @else
                                    action="{{ route('coach.store') }}" @endif>
            {{ isset($coach) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="row">
                <label class="label">Название</label>
                <input name="name" value="{{ old('name', isset($coach) ? $coach->name : null) }}" type="text"
                    class="input" placeholder="Название" aria-label="name" id="name">
            </div>
            @if ($errors->has('name'))
                <span class="is-danger">{{ $errors->first('name') }}</span>
            @endif
            <div class="row">
                <label class="label">Описание</label>
                <input name="description" value="{{ old('description', isset($coach) ? $coach->description : null) }}"
                    type="text" class="input" placeholder="Описание" aria-label="description" id="description">
            </div>
            @if ($errors->has('description'))
                <span class="is-danger">{{ $errors->first('description') }}</span>
            @endif
            <div class="row">
                <label class="label">Ссылка на аватар</label>
                <input name="avatar" value="{{ old('coach', isset($coach) ? $coach->avatar : null) }}" type="text"
                    class="input" placeholder="Ссылка на аватар" aria-label="avatar" id="avatar"><br><br>
            </div>
            @if ($errors->has('avatar'))
                <span class="is-danger">{{ $errors->first('avatar') }}</span><br><br>
            @endif
            <div class="row">
                <button class="button is-success" type="submit"
                    name="action">{{ isset($coach) ? 'Сохранить изменения' : 'Создать' }}</button>
            </div>
        </form>
    </div>
@endsection
