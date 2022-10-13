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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>

    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<style>
    body {
        font-family: -apple-system;
    }

    .header-title {
        background-color: black;
        border-radius: 5px;
    }

    .header-title h1 {
        text-align: center;
        letter-spacing: 5px;
        text-transform: uppercase;
        font-weight: bolder;
        font-size: 15px;
        padding: 15px;
        color: white;
    }

    .employee-title {
        display: flex;
        flex-flow: row;

    }

    .employee-title h1 {
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-weight: bolder;
    }

    .employee-title h2 {
        font-size: 15px;
        text-transform: uppercase;
        font-weight: bolder;
        margin-left: 15px;
        color: gray;
    }

    table {
        border: solid 1px black
    }

    table thead {
        background-color: black;
        padding: 5px;
    }

    table thead tr th {
        color: white;
        border-right: solid 2px white;
        width: 100px;
    }

    table tbody tr td {
        text-align: center;
        padding-bottom: 10px;
        border-right: solid 2px black;
    }

    .pdf-title {
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .pdf-title h1 {
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .result-price {
        text-align: center;
        text-transform: uppercase;
    }

    .result-price h1 {
        position: relative;
        top: 50px;
    }

    .result-price h1 span {
        letter-spacing: 5px;
        border-bottom: double 2px black;

    }
</style>

<section>

    <div class="header-title">
        <h1>
            JoyWood
        </h1>
    </div>

    <div>
        <div class="employee-title">
            <h1>
                zamestnanec
            </h1>

            <h2>
                {{ $user->first_name }} {{ $user->last_name }}
            </h2>
            {{-- <h2>
                JoyWood
            </h2>
            <h2>
                Brigádník
            </h2> --}}
        </div>

        <div>
            <div class="pdf-title">
                <h1>
                    Výpis práce
                </h1>

                <h3>
                    za {{ $month }}. mesic {{ $year }}
                </h3>
            </div>

            <table>
                <thead>
                    <tr class="text-center">
                        <th>Datum</th>
                        <th>Projekt</th>
                        <th>Prace</th>
                        <th>Hodiny</th>
                        <th>kc / h</th>
                        <th>Vydelek</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($works_for_month as $work_for_month)
                    <tr>
                        <td>{{ $work_for_month->date }}</td>
                        <td>{{ $work_for_month->project_name }}</td>
                        <td>{{ $work_for_month->job }}</td>

                        <td>{{ $work_for_month->hours }}</td>
                        <td>{{ $work_for_month->money_per_hour }},-</td>
                        <td>{{ $work_for_month->hours*$work_for_month->money_per_hour }},-</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="result-price">
                <h1>
                    celkem = <span>{{ $last_month_earns }}</span>,-
                </h1>
            </div>

        </div>
    </div>
</section>

</body>


</html>

