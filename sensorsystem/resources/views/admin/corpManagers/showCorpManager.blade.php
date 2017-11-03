@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">ID:{{$corpManager->id}} - {{$corpManager->name}} {{$corpManager->surname}}</div>

                    {!!Form::open(['class' => 'form-horizontal', 'action' => ['CorpmanagerController@show', $corpManager->id], 'method' => 'GET'])!!}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->name}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cognome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->surname}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Indirizzo</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->address}},{{$corpManager->num}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Codice Fiscale</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->CF}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Telefono</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->tel}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$corpManager->email}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ruolo</label>
                            <div class="col-md-6">
                                <span class="form-control label-primary" style="color:white">Responsabile Aziendale</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Azienda di appartenenza</label>
                            <div class="col-md-6">
                                <?php
                                use App\Customer;
                                $customer = Customer::find($corpManager->client_id);
                                ?>
                                <span class="form-control label-primary" style="color:white">{{$customer->name}}</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a type="button" href="/admin/utenti" class="btn btn-default">
                                Indietro
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection