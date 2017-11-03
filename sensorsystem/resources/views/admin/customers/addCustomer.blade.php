@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Inserisci una nuova azienda cliente</div>
                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => 'CustomerController@store', 'method' => 'POST'])!!}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('partita_IVA') ? ' has-error' : '' }}">
                                <label for="partita_IVA" class="col-md-4 control-label">Partita IVA</label>

                                <div class="col-md-6">
                                    <input id="partita_IVA" type="text" class="form-control" name="partita_IVA" value="{{ old('partita_IVA') }}" required autofocus>

                                    @if ($errors->has('partita_IVA'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('partita_IVA') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a type="button" href="/admin/utenti" class="btn btn-default">
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