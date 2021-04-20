<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".navbar-burger").click(function() {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });

    </script>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <strong>Фитнес-центр</strong>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/price">Прайс</a>
                <a class="navbar-item" href="/coach">Тренерский состав</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Больше</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/informations">О нас</a>
                        <a class="navbar-item" href="/contacts">Контакты</a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        @if (Route::has('login'))
                            @auth
                                <a class="button is-primary" href="{{ url('/home') }}">Личный кабинет</a>
                                <a class="button is-light" href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="button is-primary"><strong>Войти</strong></a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button is-light">Зарегистрироваться</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container is-fluid">
    <main class="relative flex items-top justify-center min-h-screen">
        <div class="container">
        @yield('content')
        </div>
    </main>
    </div>
</body>

<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h6 class="title is-6">О фитнес-центре</h6>
                <p>Посещение фитнес-залов сегодня — это не просто дань моде. Здоровье, красота и уверенность в себе остаются главными причинами занятий спортом. Более 25 видов групповых программ, персональные занятия с тренером, новейшие тренажеры от мировых производителей.</p>
            </div>
            <div class="column">
                <h6 class="title is-6">Ссылки</h6>
                <ul>
                    <li><a href="/informations">Информация</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    <li><a href="/price">Прайс-лист</a></li>
                    <li><a href="/coach">Тренерский состав</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</html>
