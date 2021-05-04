@extends('layouts.app')

@section('content')
    <h4 class="title is-4">Запись на тренировку</h4>
    <form method="POST" action="{{ route('training.store') }}">
        @csrf
        <div class="field">
            <label class="label">Услуга:</label>
            <div class="select">
                <select name="price_id">
                    @foreach ($prices as $price)
                        <option value="{{ $price->id }}">{{ $price->name }} Цена: {{ $price->price }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('price_id'))
                <span class="is-danger">{{ $errors->first('price_id') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="label">Тренер:</label>
            <div class="select">
                <select name="coach_id">
                    @foreach ($coachs as $coach)
                        <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('coach_id'))
                <span class="is-danger">{{ $errors->first('coach_id') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="label">Дата и время:</label>
            <input name="time" type="datetime-local" min="07:00" max="23:00" step="3600000">
            @if ($errors->has('time'))
                <span class="is-danger">{{ $errors->first('time') }}</span>
            @endif
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit" name="action">Записаться</button>
            </div>
            <div class="control">
                <a class="button is-link is-light" href="/home">Отмена</a>
            </div>
        </div>
    </form>
@endsection
