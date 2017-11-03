@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifica dipendente</div>

                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => ['EmployeeController@update', $employee->id], 'method' => 'PUT'])!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$employee->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$employee->surname}}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="address col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$employee->address}}" required autofocus>
                                <input id="num" type="text" class="form-control" name="num" value="{{$employee->num}}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Telephone Number</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{$employee->tel}}" required>

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
                                <input id="CF" type="CF" class="form-control" name="CF" value="{{$employee->CF}}" required>

                                @if ($errors->has('CF'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CF') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$employee->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Ruolo</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type">
                                    <?php
                                        use App\Usertype;
                                        $usertypes = Usertype::all();
                                        $selected = Usertype::find($employee->type);
                                    ?>
                                    @foreach($usertypes as $usertype)
                                        @if($usertype->id != 1)
                                            @if ($usertype->id == $selected->id)
                                                <option selected="selected" value="{{$selected->id}}">{{$selected->type}}</option>
                                            @else
                                                <option value="{{$usertype->id}}">{{$usertype->type}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_id" class="col-md-4 control-label">Azienda di appartenenza</label>

                            <div class="col-md-6">
                                <select id="client_id" class="form-control" name="client_id">
                                    <?php
                                        use App\Customer;
                                        $customers = Customer::all();
                                        $selected = Customer::find($employee->client_id);
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
                                <a type="button" href="/admin/utenti" class="btn btn-default">
                                    Annulla
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Registra
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