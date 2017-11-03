@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">ID:{{$sensor->id_string}}</div>

                    {!!Form::open(['class' => 'form-horizontal', 'action' => ['SensorController@show', $sensor->id], 'method' => 'GET'])!!}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo</label>
                            <div class="col-md-6">
                                <span class="form-control">{{\App\SensorType::find($sensor->type_id)->type}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Marca</label>
                            <div class="col-md-6">
                                <span class="form-control">{{\App\SensorBrand::find($sensor->brand_id)->brand}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Coordinate</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$sensor->coordinates}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Range valori</label>
                            <div class="col-md-6">
                                <span class="form-control">{{$sensor->minV}} - {{$sensor->maxV}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Di proprietà di</label>
                            <div class="col-md-6">
                                <span class="form-control label-primary" style="color:white">{{\App\Customer::find(\App\Site::find($sensor->site_id)->client_id)->name}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Sito</label>
                            <div class="col-md-6">
                                <span class="form-control" style="background-color: lightblue ; color:darkblue">{{\App\Site::find($sensor->site_id)->name}} - {{\App\Site::find($sensor->site_id)->address}},{{\App\Site::find($sensor->site_id)->num}} {{\App\Site::find($sensor->site_id)->city}} ({{\App\Site::find($sensor->site_id)->province}})</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a type="button" href="/admin/sensors" class="btn btn-default">
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