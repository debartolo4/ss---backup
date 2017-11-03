@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container" align="center" >
                            <?php
                                use Illuminate\Support\Facades\Auth;
                                $user = Auth::user();
                                $type = $user->type;
                            ?>
                            @if($type == 1)
                                <h1 style="color:dodgerblue">Benvenuto Admin!</h1>
                            @elseif($type == 2)
                                <h1 style="color:dodgerblue">Benvenuto Responsabile Aziendale!</h1>
                            @elseif($type == 3)
                                <h1 style="color:dodgerblue">Benvenuto Dipendente!</h1>
                            @endif
                                <h2>{{ Auth::user()->name }} {{Auth::user()->surname}}</h2>
                                <span>Cosa desideri fare?</span>
                                <h4></h4>
                                <div align="center">
                                    <a class="btn btn-primary" href="/admin/dashboard" role="button">DashBoard</a>
                                </div>
                                <div align="center">
                                    <a class="btn btn-primary" href="/admin/customers/addCustomer" role="button">Inserisci una nuova azienda cliente</a>
                                </div>
                                <div align="center">
                                    <a class="btn btn-primary" href="/admin/corpManagers/addCorpManager" role="button">Inserisci un responsabile aziendale</a>
                                </div>
                                <div align="center">
                                    <a class="btn btn-primary" href="/admin/employees/addEmployee" role="button">Inserisci un dipendente</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection