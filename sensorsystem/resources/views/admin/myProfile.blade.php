@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Il mio Profilo</div>

                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => ['MyProfileController@update', $currentUser->id], 'method' => 'PUT'])!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$currentUser->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Cognome</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$currentUser->surname}}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Indirizzo</label>

                            <div class="address col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$currentUser->address}}" required autofocus>
                                <input id="num" type="text" class="form-control" name="num" value="{{$currentUser->num}}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{$currentUser->tel}}" required>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('CF') ? ' has-error' : '' }}">
                            <label for="CF" class="col-md-4 control-label">CF</label>

                            <div class="col-md-6">
                                <input id="CF" type="CF" class="form-control" name="CF" value="{{$currentUser->CF}}" required>

                                @if ($errors->has('CF'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CF') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$currentUser->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{$currentUser->username}}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <?php
                        use App\Customer;
                        use App\Usertype;
                        $customer = Customer::find($currentUser->client_id);
                        $usertype = Usertype::find($currentUser->type);
                        ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ruolo</label>
                            <div class="col-md-6">
                                <span class="form-control label-default" style="color:white">{{$usertype->type}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Azienda di appartenenza</label>
                            <div class="col-md-6">
                                <span class="form-control label-default" style="color:white">{{$customer->name}}</span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{$currentUser->passsword}}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Conferma Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="button" href="/admin" class="btn btn-default">
                                    Indietro
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Applica modifiche
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
