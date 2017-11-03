@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Inserisci un nuova tipo</div>
                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => 'TypeController@store', 'method' => 'POST'])!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="brand" class="col-md-4 control-label">Tipo</label>

                            <div class="address col-md-6">
                                <input id="type" type="text" class="form-control col-md-4" name="type" value="{{ old('type') }}" required autofocus>
                                <input id="code" type="text" class="form-control col-md-2" placeholder="Codice" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="button" href="/admin/sensors/installableSensors" class="btn btn-default">
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