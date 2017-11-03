<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'SensorSystem')}}</title>
    </head>
</html>
<main role="main">
    <div class="container text-right col-lg-5 col-lg-offset-7">
        <div class="jumbotron">
            <div>
                <h1>Benvenuto in SensorSystem!</h1>
                <p>Accedi con un account già registrato o registra un nuovo account con privilegi da admin.</p>
                <p>
                    <a class="btn btn-primary" href="/login" role="button">Login</a>
                    <a class="btn btn-primary" style="background-color: lightseagreen" href="/register" role="button">Registra un Admin</a>
                </p>
            </div>
        </div>
    </div>
</main>