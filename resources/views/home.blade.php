@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="title">Личный кабинет!</div>
        Здравствуйте {{ Auth::user()->name }} !<br><br>
        <a class="button is-link" href="{{ route('training.create') }}">Записаться на тренировку</a>
    </div>

    @if (Auth::check() && Auth::user()->role == true)
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Имя клиента</th>
                    <th>Название тренировки</th>
                    <th>Тренер</th>
                    <th>Время</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
    @endif

    @foreach ($trainings as $training)
        @if (Auth::check() && Auth::user()->role == false)
            <div class="box">
                Имя клиента: {{ $training->user }}<br>
                Название тренировки: {{ $training->pricelist }}<br>
                Тренер: {{ $training->coach }}<br>
                Время: {{ $training->time }}<br>
                Цена: {{ $training->price }}<br>
                <form method="POST" action="{{ route('training.destroy', $training->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="button is-danger" type="submit" name="action">Отменить запись</button>
                </form>
            </div>
        @else
            <tr>
                <td>{{ $training->user }}</td>
                <td>{{ $training->pricelist }}</td>
                <td>{{ $training->coach }}</td>
                <td>{{ $training->time }}</td>
                <td>{{ $training->price }}</td>
            </tr>
        @endif
    @endforeach

    @if (Auth::check() && Auth::user()->role == true)
        </tbody>
        </table>
    @endif
    <br><br>
@endsection
