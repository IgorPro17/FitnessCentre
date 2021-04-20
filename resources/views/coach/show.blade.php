@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">Тренерский состав (Тренер: {{ $coach->name }})</h3>
        <a class="button is-warning" href="{{ route('coach.index') }}">Назад</a><br><br>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Имя тренера: {{ $coach->name }}</span>
                        <p>Описание: {{ $coach->description }}</p>
                        <p>Ссылка на аватар: {{ $coach->avatar }}</p>
                        <p>Создано: {{ $coach->created_at->format('d.m.y H:i:s') }}</p>
                        <p>Обновлено: {{ $coach->updated_at->format('d.m.y H:i:s') }}</p>
                    </div>
                    <div class="card-action">
                        <form method="POST" action="{{route('coach.destroy', $coach)}}">
                            <a class="button is-success" href="{{route('coach.edit', $coach)}}">Редактировать</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="button is-danger" type="submit" name="action">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
