@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">ID:{{$employee->id}} - {{$employee->name}} {{$employee->surname}}</div>

                    {!!Form::open(['class' => 'form-horizontal', 'action' => ['EmployeeController@show', $employee->id], 'method' => 'GET'])!!}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->name}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cognome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->surname}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Indirizzo</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->address}},{{$employee->num}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Codice Fiscale</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->CF}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Telefono</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->tel}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$employee->email}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ruolo</label>
                            <div class="col-md-6">
                                <span class="form-control label-primary" style="color:white">Dipendente</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Azienda di appartenenza</label>
                            <div class="col-md-6">
                                <?php
                                use App\Customer;
                                $customer = Customer::find($employee->client_id);
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
    </div>
@endsection