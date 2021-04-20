@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="columns">
            <div class="column">
                <h1 class="title">Контакты</h1>
                <h2 class="subtitle">Обратная связь:</h2>
                <div>8 800 123 4567</div>
                <div>+7 (123) 456-78-90</div>
                <div>fitnesscentre@mail.com</div><br>
                <h2 class="subtitle">Адрес:</h2>
                <div>Россия, г. Киров, Октябрьский проспект, 54</div><br>
                <h2 class="subtitle">Режим работы:</h2>
                <div>Пн.-Пт.: 07:00 до 23:00</div>
                <div>Сб.-Вс.: 08:00 до 22:00</div>
            </div>
            <div class="column">
                <figure class="image">
                    <img class="is-rounded"
                        src="https://s0.rbk.ru/v6_top_pics/media/img/2/82/755586211300822.png">
                </figure>
            </div>
        </div>
    </div>
@endsection
