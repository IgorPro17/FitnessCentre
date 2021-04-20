@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">Тренерский состав</h3>
        @if (Route::has('login'))
            @if (Auth::check() && Auth::user()->role == true)
                <a class="button is-primary" href="{{ route('coach.create') }}">Создать</a><br><br>
            @endif
        @endif
        @foreach ($coachs as $coach)
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="{{isset($coach->avatar) ? $coach->avatar : "https://stekloinstrument.ru/image/avatarka.png"}}" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>
                                    @if (Route::has('login'))
                                        @if (Auth::check() && Auth::user()->role == true)
                                            <a href="{{ route('coach.show', $coach) }}">{{ $coach->name }}</a>
                                        @else
                                            {{ $coach->name }}
                                        @endif
                                    @endif
                                </strong>
                                <br>
                                {{ $coach->description }}
                                @if (Route::has('login'))
                                    @if (Auth::check() && Auth::user()->role == true)
                                        <form method="POST" action="{{ route('coach.destroy', $coach) }}">
                                            <a href="{{ route('coach.edit', $coach) }}"
                                                class="button is-success">Редактировать</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="button is-danger" type="submit" name="action">Удалить</button>
                                        </form>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection
