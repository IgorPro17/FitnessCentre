@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">Прайс-лист</h3>
        @if (Route::has('login'))
            @if (Auth::check() && Auth::user()->role == true)
                <a class="button is-primary" href="{{ route('price.create') }}">Создать</a><br><br>
            @endif
        @endif
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Название</th>
                    <th style="max-width: 300px">Описание</th>
                    <th>Цена</th>
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->role == true)
                            <th></th>
                        @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>
                            @if (Route::has('login'))
                                @if (Auth::check() && Auth::user()->role == true)
                                    <a href="{{ route('price.show', $price) }}">{{ $price->name }}</a>
                                @else
                                    {{ $price->name }}
                                @endif
                            @endif
                        </td>
                        <td style="max-width: 300px">{{ $price->description }}</td>
                        <td>{{ $price->price }}</td>
                        @if (Route::has('login'))
                            @if (Auth::check() && Auth::user()->role == true)
                                <td>
                                    <form method="POST" action="{{ route('price.destroy', $price) }}">
                                        <a href="{{ route('price.edit', $price) }}" class="button is-success">Редактировать</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="button is-danger" type="submit" name="action">Удалить</button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
        </table><br><br>
    </div>
@endsection
