@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">ID:{{$site->id}} - {{$site->name}}</div>

                    {!!Form::open(['class' => 'form-horizontal', 'action' => ['SiteController@show', $site->id], 'method' => 'GET'])!!}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$site->name}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Descrizione</label>
                            <div class="col-md-6">
                                <textarea class="form-control">{{$site->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Indirizzo</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$site->address}},{{$site->num}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Città</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$site->city}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Provincia</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$site->province}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Azienda di riferimento</label>
                            <div class="col-md-6">
                                <?php
                                use App\Customer;
                                $customer = Customer::find($site->client_id);
                                ?>
                                <span class="form-control label-primary" style="color:white">{{$customer->name}}</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a type="button" href="/admin/sites" class="btn btn-default">
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