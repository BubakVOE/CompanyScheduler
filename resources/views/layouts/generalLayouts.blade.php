<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'JoyWood') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('other/boostrap.min.css') }}">
    <script src="{{ asset('other/bootstrap.bundle.min.js') }}"></script>
    <link href="{{ asset('other/vue@3') }}">
    <script src="{{ asset('other/chart.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/27cb10a11c.js"></script>




    <style>
        .active {
            font-weight: bolder;
            border-left: solid 2px red;
        }

        li:hover {
            font-weight: bolder;
            border-left: solid 2px red;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px-3">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars fa-2x"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav ps-3">
                <a class="navbar-brand" href="{{ route('dashboard-index') }}">
                    JoyWood
                </a>
            </ul>

            <ul class="navbar-nav ps-3">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Home
                </a>
            </ul>
            @endauth

            <ul class="navbar-nav ms-auto ps-3">
                @guest
                    <a href="/login" class="navbar-brand">
                        Login
                    </a>
                @endguest

                @auth
                    <a href="{{ route('logout') }}" class="navbar-brand"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('layout')
</body>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(element) {
            return new bootstrap.Tooltip(element);
        });
    });


</script>



</html>
