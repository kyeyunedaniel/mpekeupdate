<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ResultRequest;
use App\Models\predictions;
use Illuminate\Http\Request;

class ForecastingController extends Controller
{
    public function index(Request $request) {
        $ramal = 0;
        $akurasi = 0;
        $persen=0;
        return view('admin.predict', [
            'ramal'=> $ramal,
            'akurasi' => $akurasi,
            'persen'=>$persen
        ]);
    }

    public function result(ResultRequest $request) {
        $data = $request->all();
        $alpha = $request->input('alpha');
        $beta = $request->input('beta');
        $ramal_selanjutnya = array();
        $level_holt = array();
        $trend_holt = array();
        $mapeData = 0;
        $data = predictions::orderBy('date', 'asc')->get();
        $jumTot = 1;
        for ($i=1; $i<count($data); $i++) { 
            switch ($i) {
                case 1:
                    $level_holt[$i] = $data[$i]['close'];
                    $trend_holt[$i] = $data[$i]['close']-$data[0]['close'];
                    $ramal_selanjutnya[$i+1] = $level_holt[$i] + $trend_holt[$i];
                    break;
                
                default:
                    $level_holt[$i] = $alpha * $data[$i]['close'] + (1-$alpha) * ($level_holt[$i-1]+$trend_holt[$i-1]);
                    $trend_holt[$i] = $beta * ($level_holt[$i]-$level_holt[$i-1]) + (1-$beta)* $trend_holt[$i-1];
                    $ramal_selanjutnya[$i+1] = $level_holt[$i] + $trend_holt[$i];
                    break;
            }

            if($i<count($data)-1) {
                $jumTot++;
                $error = $ramal_selanjutnya[$i+1] - $data[$i+1]['close'];
                $mape = (abs($error)/$data[$i+1]['close']);
                $mapeData = $mapeData + $mape;
            }
        }

        $ramal = $ramal_selanjutnya[$i];
        $akurasi = $mapeData/$jumTot * 100;
        $persen = 100-$akurasi;

         $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);

        return view('admin.predict',compact('forecast','current'), [
            'ramal'=> $ramal,
            'akurasi' => $akurasi,
            'persen'=>$persen
        ]);
    }

}
