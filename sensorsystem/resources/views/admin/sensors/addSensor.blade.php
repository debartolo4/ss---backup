@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Installa un sensore</div>

                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => 'SensorController@store', 'method' => 'POST'])!!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="type_id" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select id="type_id" class="form-control" name="type_id">
                                    <?php
                                    use App\Customer;$types = \App\SensorType::all();
                                    ?>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="brand_id" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select id="brand_id" class="form-control" name="brand_id">
                                    <?php
                                    $brands = \App\SensorBrand::all();
                                    ?>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="coordinates" class="col-md-4 control-label">Coordinate</label>

                            <div class="address col-md-6">
                                <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitudine" value="{{ old('longitude') }}" required autofocus>
                                <input id="latitude" type="text" class="form-control" name="latitude" placeholder="Latitudine" value="{{ old('latitude') }}" required autofocus>
                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('minV') ? ' has-error' : '' }}{{ $errors->has('maxV') ? ' has-error' : '' }}">
                            <label for="range" class="col-md-4 control-label">Range valori</label>

                            <div class="address col-md-6">
                                <input id="minV" type="text" class="form-control" name="minV" placeholder="Valore minimo" value="{{ old('minV') }}" required autofocus>
                                <input id="maxV" type="text" class="form-control" name="maxV" placeholder="Valore massimo" value="{{ old('maxV') }}" required autofocus>
                                @if ($errors->has('minV'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('minV') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('maxV'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('maxV') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_id" class="col-md-4 control-label">Sito di installazione</label>

                            <div class="col-md-6">
                                <select id="site_id" class="form-control" name="site_id">
                                    <?php
                                    $sites = \App\Site::all();
                                    ?>
                                    @foreach($sites as $site)
                                            <option value="{{$site->id}}">{{Customer::find($site->client_id)->name}} | {{$site->name}} - {{$site->address}},{{$site->num}} {{$site->city}} ({{$site->province}}) </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="button" href="/admin/sensors" class="btn btn-default">
                                    Annulla
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Installa
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection