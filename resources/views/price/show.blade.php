@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">Прайс-лист (Услуга: {{ $price->name }})</h3>
        <a class="button is-warning" href="{{ route('price.index') }}">Назад</a><br><br>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Название услуги: {{ $price->name }}</span>
                        <p>Описание: {{ $price->description }}</p>
                        <p>Цена: {{ $price->price }}</p>
                        <p>Создано: {{ $price->created_at->format('d.m.y H:i:s') }}</p>
                        <p>Обновлено: {{ $price->updated_at->format('d.m.y H:i:s') }}</p>
                    </div>
                    <div class="card-action">
                        <form method="POST" action="{{route('price.destroy', $price)}}">
                            <a class="button is-success" href="{{route('price.edit', $price)}}">Редактировать</a>
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
