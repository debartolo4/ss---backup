@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">ID:{{$customer->id}} - {{$customer->name}}</div>

                    {!!Form::open(['class' => 'form-horizontal', 'action' => ['CustomerController@show', $customer->id], 'method' => 'GET'])!!}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$customer->name}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Partita IVA</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$customer->partita_IVA}}</span>
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