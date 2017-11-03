<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Site;
use App\Sensor;
use \App\Transmission;
use \App\TransmissionData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function load()
    {
        $transmissions = Transmission::all();


        foreach ($transmissions as $transmission) {

            $trans_data = DB::table('transmission_data')->where('id_trans', $transmission->id)->first();

            if($trans_data == null){

                $type = (DB::table('sensor_types')->where('code', (substr($transmission->trans_string, 0, 3)))->first())->id;

                if (substr($transmission->trans_string, 13, 8) == 0) {
                    $data = new TransmissionData();

                    $type = DB::table('sensor_types')->where('code', (substr($transmission->trans_string, 0, 3)))->first();
                    $brand = DB::table('sensor_brands')->where('code', (substr($transmission->trans_string, 4, 3)))->first();

                    $sensor = Sensor::find(intval(substr($transmission->trans_string, 8, 4)));
                    $site = Site::find($sensor->site_id);
                    $client = Customer::find($site->client_id);

                    $data->id_trans = $transmission->id;
                    $data->type_id = $type->id;
                    $data->brand_id = $brand->id;
                    $data->sensor_id = $sensor->id;
                    $data->date = null;
                    $data->time = null;
                    $data->val = null;
                    $data->message = substr($transmission->trans_string, 30, strlen($transmission->trans_string));
                    $data->site_id = $site->id;
                    $data->client_id = $client->id;
                    $data->error_id = substr($transmission->trans_string, 13, 17);

                    $data->save();

                } else {

                    // Per i rilevatori di corrente elettrica la stringa di trasmissione è del tipo:
                    // TyTyTy-BBB-IIII-DDDDDDDDVVVVVTTTTMessage

                    if ($type == 5) {
                        $data = new TransmissionData();

                        $type = DB::table('sensor_types')->where('code', (substr($transmission->trans_string, 0, 3)))->first();
                        $brand = DB::table('sensor_brands')->where('code', (substr($transmission->trans_string, 4, 3)))->first();

                        $sensor = Sensor::find(intval(substr($transmission->trans_string, 8, 4)));
                        $site = Site::find($sensor->site_id);
                        $client = Customer::find($site->client_id);

                        $data->id_trans = $transmission->id;
                        $data->type_id = $type->id;
                        $data->brand_id = $brand->id;
                        $data->sensor_id = $sensor->id;
                        $data->date = substr($transmission->trans_string, 13, 4) . '-' . substr($transmission->trans_string, 17, 2) . '-' . substr($transmission->trans_string, 19, 2);
                        $data->time = substr($transmission->trans_string, 26, 2) . ':' . substr($transmission->trans_string, 28, 2);
                        $data->val = intval(substr($transmission->trans_string, 21, 5));
                        $data->message = substr($transmission->trans_string, 30, strlen($transmission->trans_string));
                        $data->site_id = $site->id;
                        $data->client_id = $client->id;

                        $data->save();

                    } elseif ($type == 2 || $type == 4) {

                        // Per i rilevatori di capacità e di gas la stringa di trasmissione è del tipo:
                        // TyTyTy-BBB-IIII-VVVVVVDDDDDDDDTTTTMessage

                        $data = new TransmissionData();

                        $type = DB::table('sensor_types')->where('code', (substr($transmission->trans_string, 0, 3)))->first();
                        $brand = DB::table('sensor_brands')->where('code', (substr($transmission->trans_string, 4, 3)))->first();

                        $sensor = Sensor::find(intval(substr($transmission->trans_string, 8, 4)));
                        $site = Site::find($sensor->site_id);
                        $client = Customer::find($site->client_id);

                        $data->id_trans = $transmission->id;
                        $data->type_id = $type->id;
                        $data->brand_id = $brand->id;
                        $data->sensor_id = $sensor->id;
                        $data->date = substr($transmission->trans_string, 19, 4) . '-' . substr($transmission->trans_string, 23, 2) . '-' . substr($transmission->trans_string, 25, 2);
                        $data->time = substr($transmission->trans_string, 27, 2) . ':' . substr($transmission->trans_string, 29, 2);
                        $data->val = intval(substr($transmission->trans_string, 13, 6));
                        $data->message = substr($transmission->trans_string, 31, strlen($transmission->trans_string));
                        $data->site_id = $site->id;
                        $data->client_id = $client->id;

                        $data->save();

                    } else {

                        // Per tutti gli altri rilevatori la stringa trasmessa è del tipo:
                        // TyTyTy-BBB-IIII-DDDDDDDDTTTTVVVMessage

                        $data = new TransmissionData();

                        $type = DB::table('sensor_types')->where('code', (substr($transmission->trans_string, 0, 3)))->first();
                        $brand = DB::table('sensor_brands')->where('code', (substr($transmission->trans_string, 4, 3)))->first();

                        $sensor = Sensor::find(intval(substr($transmission->trans_string, 8, 4)));
                        $site = Site::find($sensor->site_id);
                        $client = Customer::find($site->client_id);

                        $data->id_trans = $transmission->id;
                        $data->type_id = $type->id;
                        $data->brand_id = $brand->id;
                        $data->sensor_id = $sensor->id;
                        $data->date = substr($transmission->trans_string, 13, 4) . '-' . substr($transmission->trans_string, 17, 2) . '-' . substr($transmission->trans_string, 19, 2);
                        $data->time = substr($transmission->trans_string, 21, 2) . ':' . substr($transmission->trans_string, 23, 2);
                        $data->val = intval(substr($transmission->trans_string, 25, 3));
                        $data->message = substr($transmission->trans_string, 28, strlen($transmission->trans_string));
                        $data->site_id = $site->id;
                        $data->client_id = $client->id;

                        $data->save();

                    }
                }

            }

        }

        return view('admin.dashboard');
    }

}
