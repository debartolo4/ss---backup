@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifica sito</div>

                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => ['SiteController@update', $site->id], 'method' => 'PUT'])!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$site->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descrizione</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" required autofocus>{{$site->description}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Indirizzo</label>

                            <div class="address col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$site->address}}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                <input id="num" type="text" class="form-control" name="num" value="{{$site->num}}" required autofocus>
                                @if ($errors->has('num'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Città</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{$site->city}}" required>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                            <label for="province" class="col-md-4 control-label">Provincia</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control" name="province" value="{{$site->province}}" required>

                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_id" class="col-md-4 control-label">Azienda di riferimento</label>

                            <div class="col-md-6">
                                <select id="client_id" class="form-control" name="client_id">
                                    <?php
                                        use App\Customer;
                                        $customers = Customer::all();
                                        $selected = Customer::find($site->client_id);
                                    ?>
                                    @foreach($customers as $customer)
                                        @if ($customer->id == $selected->id)
                                            <option selected="selected" value="{{$selected->id}}">{{$selected->name}}</option>
                                        @else
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="button" href="/admin/sites" class="btn btn-default">
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