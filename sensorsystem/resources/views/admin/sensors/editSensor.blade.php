@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifica sensore installato</div>

                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => ['SensorController@update', $sensor->id], 'method' => 'PUT'])!!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="type_id" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select id="type_id" class="form-control" name="type_id">
                                    <?php
                                    use App\SensorType;
                                    $types = SensorType::all();
                                    $selectedType = SensorType::find($sensor->type_id)
                                    ?>
                                    @foreach($types as $type)
                                        @if ($type->id == $selectedType->id)
                                            <option selected="selectedType" value="{{$selectedType->id}}">{{$selectedType->type}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="brand_id" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select id="brand_id" class="form-control" name="brand_id">
                                    <?php
                                    use App\SensorBrand;
                                    $brands = SensorBrand::all();
                                    $selectedBrand = SensorBrand::find($sensor->brand_id)
                                    ?>
                                    @foreach($brands as $brand)
                                        @if ($brand->id == $selectedBrand->id)
                                            <option selected="selectedBrand" value="{{$selectedBrand->id}}">{{$selectedBrand->brand}}</option>
                                        @else
                                            <option value="{{$brand->id}}">{{$brand->brand}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="coordinates" class="col-md-4 control-label">Coordinate</label>

                            <div class="address col-md-6">
                                <?php
                                $longitude = substr($sensor->coordinates,0,6);
                                $latitude = substr($sensor->coordinates,7,13);
                                ?>
                                <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitudine" value="{{$longitude}}" required autofocus>
                                <input id="latitude" type="text" class="form-control" name="latitude" placeholder="Latitudine" value="{{$latitude}}" required autofocus>
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
                                <input id="minV" type="text" class="form-control" name="minV" placeholder="Valore minimo" value="{{$sensor->minV}}" required autofocus>
                                <input id="maxV" type="text" class="form-control" name="maxV" placeholder="Valore massimo" value="{{$sensor->maxV}}" required autofocus>
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
                                    use App\Site;
                                    use App\Customer;
                                    $sites = Site::all();
                                    $selectedSite = Site::find($sensor->site_id)
                                    ?>
                                    @foreach($sites as $site)
                                        @if ($site->id == $selectedSite->id)
                                            <option selected="selectedSite" value="{{$selectedSite->id}}">{{\App\Customer::find($selectedSite->client_id)->name}} | {{$selectedSite->name}} - {{$selectedSite->address}},{{$selectedSite->num}} {{$selectedSite->city}} ({{$selectedSite->province}})</option>
                                        @else
                                            <option value="{{$site->id}}">{{Customer::find($site->client_id)->name}} | {{$site->name}} - {{$site->address}},{{$site->num}} {{$site->city}} ({{$site->province}}) </option>
                                        @endif
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
                                    Conferma
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