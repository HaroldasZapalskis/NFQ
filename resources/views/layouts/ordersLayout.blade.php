<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'NFQ Akademija Haroldas Zapalskis')}}</title>
    </head>
    <body>
        <div>
            @include('includes.navbar')
            <div class="container" style="padding-top: 55px; max-width: 1150px;">
                @include('includes.messeges')
                @yield('content')
            </div>
        </div>
    </body>
</html>
