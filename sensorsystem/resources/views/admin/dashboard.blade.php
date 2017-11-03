@extends('layouts.app_admin')

@section('content')
    <?php
    use App\TransmissionData;
    use App\Transmission;
    use App\Customer;
    use App\Site;
    $customers = Customer::orderBy('id','asc')->paginate(1);
    $sites = Site::all();
    $transmissions = Transmission::all();
    $datas = TransmissionData::all();
    $flag = false;
    $flag_site = false;
    ?>
    {!! Form::open(['action' => 'DashboardController@load', 'method' => 'GET']) !!}
    <form onload="this.form.submit()" method="GET">
        <div class="col-md-12">
            <div class="container col-lg-4" style="display: inline-block">
                <div>
                    <div class="panel panel-default" style="height: 545px">
                        <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Eccezioni rilevate</h4></div>
                        <div class="panel-body" style="text-align: center; height: 475px ; overflow-y: auto">
                            @foreach($datas as $data)
                                <?php
                                $customer = \App\Customer::find($data->client_id);
                                $site = \App\Site::find($data->site_id);
                                $sensor = \App\Sensor::find($data->sensor_id);
                                $sensorType = \App\SensorType::find($data->type_id);
                                $sensorBrand = \App\SensorBrand::find($data->brand_id);
                                ?>
                                @if($data->error_id != null)
                                    <div class="panel-heading" style="background-color: #1f648b; color: white">ID:{{$customer->id}} - {{$customer->name}}</div>
                                    <div class="panel-heading" style="background-color: lightblue; color: midnightblue">ID:{{$site->id}} - {{$site->name}} - {{$site->address}},{{$site->num}} - {{$site->city}} ({{$site->province}})</div>
                                    <div class="panel-heading" >ID: {{$sensor->id_string}} - {{$sensorType->type}} - {{$sensorBrand->brand}}</div>
                                    <div class="panel-body" style="background-color: lightpink; color: darkred">{{\App\Error::find($data->error_id)->error}}</div>
                                    <div class="panel-title"><h3></h3></div>
                                @elseif($data->val > $sensor->maxV)
                                    <div class="panel-heading" style="background-color: #1f648b; color: white">ID:{{$customer->id}} - {{$customer->name}}</div>
                                    <div class="panel-heading" style="background-color: lightblue; color: midnightblue">ID:{{$site->id}} - {{$site->name}} - {{$site->address}},{{$site->num}} - {{$site->city}} ({{$site->province}})</div>
                                    <div class="panel-heading" >ID: {{$sensor->id_string}} - {{$sensorType->type}} - {{$sensorBrand->brand}}</div>
                                    <div class="panel-title" style="color:darkblue">Valore massimo ammissibile: {{$sensor->maxV}}</div>
                                    <div class="panel-title" style="color:red">Valore rilevato: {{$data->val}}</div>
                                    <div class="panel-body" style="background-color: lightpink; color: darkred">Attenzione! Valore oltre il limite!</div>
                                    <div class="panel-title"><h3></h3></div>
                                @elseif($data->val < $sensor->minV)
                                    <div class="panel-heading" style="background-color: #1f648b; color: white">ID:{{$customer->id}} - {{$customer->name}}</div>
                                    <div class="panel-heading" style="background-color: lightblue; color: midnightblue">ID:{{$site->id}} - {{$site->name}} - {{$site->address}},{{$site->num}} - {{$site->city}} ({{$site->province}})</div>
                                    <div class="panel-heading" >ID: {{$sensor->id_string}} - {{$sensorType->type}} - {{$sensorBrand->brand}}</div>
                                    <div class="panel-title" style="color:darkblue">Valore minimo ammissibile: {{$sensor->minV}}</div>
                                    <div class="panel-title" style="color:red">Valore rilevato: {{$data->val}}</div>
                                    <div class="panel-body" style="background-color: lightpink; color: darkred">Attenzione! Valore al di sotto dell limite!</div>
                                    <div class="panel-title"><h3></h3></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="display: inline-block">
                <div class="panel panel-default" style="height: 545px">
                    <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Dashboard</h4></div>
                    <div class="panel-body">
                        @foreach($customers as $customer)
                            <div class="panel-heading clearfix" style="background-color: steelblue; color: white">
                                ID:{{$customer->id}} - {{$customer->name}}
                            </div>
                            <div class="panel-body" style="height: 350px ; overflow-y: auto ;">
                                @foreach($sites as $site)
                                    @if(($site->client_id == $customer->id))
                                        <?php
                                        $flag_site = true;
                                        ?>
                                        <div class="panel-heading clearfix" style="background-color: lightblue; color: darkblue">
                                            ID:{{$site->id}} - {{$site->name}} - {{$site->address}},{{$site->num}} - {{$site->city}} ({{$site->province}})
                                        </div>
                                        <div class="panel-body">
                                            @foreach ($datas as $data)
                                                @if($data->site_id == $site->id)
                                                    <?php
                                                    $flag = true;
                                                    ?>
                                                    <div style="text-script: bold; background-color: lightgray; border-color: darkblue; color: darkblue"><b>Rilevazione n° {{$data->id_trans}}</b></div>
                                                    <div style="color: darkblue; border-color: darkblue">{{\App\Transmission::find($data->id_trans)->trans_string}}</div>
                                                    <table class = "table">
                                                        <tr>
                                                            <th>Tipo</th>
                                                            <th>Marca</th>
                                                            <th>Data</th>
                                                            <th>Ora</th>
                                                            <th>Valore rilevato</th>
                                                            <th>Messaggio</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{\App\SensorType::find($data->type_id)->type}}</td>
                                                            <td>{{\App\SensorBrand::find($data->brand_id)->brand}}</td>
                                                            <td>{{$data->date}}</td>
                                                            <td>{{$data->time}}</td>
                                                            @if ($data->val > \App\Sensor::find($data->sensor_id)->maxV || $data->val < \App\Sensor::find($data->sensor_id)->minV)
                                                                <td style="color: red">{{$data->val}}</td>
                                                            @else
                                                                <td style="color: green">{{$data->val}}</td>
                                                            @endif
                                                            @if ($data->message == 'Err')
                                                                <td style="color: red">{{$data->message}}</td>
                                                            @else
                                                                <td style="color: green">{{$data->message}}</td>
                                                        @endif
                                                    </table>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                                @if($flag == false && $flag_site == true)
                                    <div class="panel-body">
                                        Non vi sono ancora rilevazioni.
                                    </div>
                                @elseif($flag == false && $flag_site == false)
                                    <div class="panel-body">
                                        Non vi sono siti.
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div style="position: absolute; bottom: 5px; margin-left: 40%">
                            {{$customers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {!! Form::close() !!}
@endsection