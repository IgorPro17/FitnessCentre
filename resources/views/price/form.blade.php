@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title is-3">{{ isset($price) ? 'Редактирование прайс-листа ' . $price->name : 'Создать элемент прайс-листа' }}</h3>

        <a class="button is-warning" href="{{ route('price.index') }}">Назад</a><br><br>
        <form method="POST" @if (isset($price)) action="{{ route('price.update', $price) }}"
            @else
                                    action="{{ route('price.store') }}" @endif>
            {{ isset($price) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="row">
                <label class="label">Название</label>
                <input name="name" value="{{ old('name', isset($price) ? $price->name : null) }}" type="text"
                    class="input" placeholder="Название" aria-label="name" id="name">
            </div>
            @if ($errors->has('name'))
                <span class="is-danger">{{ $errors->first('name') }}</span>
            @endif
            <div class="row">
                <label class="label">Описание</label>
                <input name="description" value="{{ old('description', isset($price) ? $price->description : null) }}"
                    type="text" class="input" placeholder="Описание" aria-label="description" id="description">
            </div>
            @if ($errors->has('description'))
                <span class="is-danger">{{ $errors->first('description') }}</span>
            @endif
            <div class="row">
                <label class="label">Цена</label>
                <input name="price" value="{{ old('price', isset($price) ? $price->price : null) }}" type="text"
                    class="input" placeholder="Цена" aria-label="price" id="price"><br><br>
            </div>
            @if ($errors->has('price'))
                <span class="is-danger">{{ $errors->first('price') }}</span><br><br>
            @endif
            <div class="row">
                <button class="button is-success" type="submit"
                    name="action">{{ isset($price) ? 'Сохранить изменения' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection
