@extends('layouts.app')

@section('content')
    <?php
            use Illuminate\Support\Facades\Auth;
            $name = Auth::user()->name;
            $surname = Auth::user()->surname;
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ciao {{$name}} {{$surname}}, benvenuto in SensorSystem!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <div>
                        <h1></h1>
                        <a class="btn btn-primary" href="/admin" role="button">Procedi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
