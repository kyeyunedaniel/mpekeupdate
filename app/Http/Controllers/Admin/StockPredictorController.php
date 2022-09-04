<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Process\Process;

class StockPredictorController extends Controller
{
    /**
     * Get Stock Prediction Data
     * 
     * @param \Illuminate\Http\Request $request
     * @return JSON
     */
    public function getData(Request $request)
    {
        $data = $this->getJsonFromPython($request->tickerSymbol, $request->days);

        $data = $this->roundJsonNumbersByHundredth($data);

        $data = $this->getChartJson($data, $request->tickerSymbol);
        
        return Response::json($data); 
    }

    /**
     * Get the data from Python Script.
     * 
     * @param String    $ticker_symbol
     * @param int       $days
     * @return JSON
     */
    private function getJsonFromPython($ticker_symbol, int $days)
    {
        $process = new Process(["/bin/python3", "/var/www/stockpredictor/public/python/Stockpredictor.py", $ticker_symbol, $days, "LR"]);
        $process->mustRun();

        // If fails, then the ticker symbol is incorrect
        if (!$process->isSuccessful()) {
            return "The Ticker Symbol is invalid, you must use the NYSE";
        }

        return json_decode(strstr($process->getOutput(), '{'));
    }

    /**
     * Round up the numbers in the JSON to the nearest hundredth
     * 
     * @param JSON      $json_data
     * @return JSON
     */
    private function roundJsonNumbersByHundredth($json_data)
    {
        foreach ($json_data as $key => $value) {
            if ($key !== 'confidence') {
                $json_data->$key = round($value, 2);
            }
        }

        return $json_data;
    }

    /**
     * Gets a JSON object for ChartJs
     * 
     * @param JSON      $json_data
     * @param String    $ticker_symbol
     * @return JSON
     */
    private function getChartJson($json_data, $ticker_symbol)
    {
        $labels = $this->getChartJsLabelData($json_data, 1);
        $raw_data = $this->getChartJsLabelData($json_data, 0);

        $datasets = $this->getChartJsDataset($ticker_symbol, $raw_data);

        $json = [
            "labels" => $labels,
            "datasets" => [$datasets]
        ];

        return json_encode($json);
    }

    /**
     * Retrieve label or data from JSON without "confidence"
     * 
     * @param JSON      $json_data
     * @param Boolean   $choice
     * 
     * @return Array
     */
    private function getChartJsLabelData($json_data, bool $choice)
    {
        $data = [];

        foreach ($json_data as $key => $value) {
            if ($key !== "confidence" && $choice) {
                $data[] = $key;
            }

            if ($key !== "confidence" && !$choice) {
                $data[] = $value;
            }
        }

        return $data;
    }

    /**
     * Retrieve Dataset for Chartjs
     * 
     * @param String    $ticker_symbol
     * @param Array     $raw_data
     * 
     * @return JSON
     */
    private function getChartJsDataset($ticker_symbol, $raw_data)
    {
        $datasets = [
            "label" => $ticker_symbol . " Predictions",
            "fillColor" => "rgba(220,220,220,0.2)",
            "strokeColor" => "rgba(220,220,220,1)",
            "pointColor" => "rgba(220,220,220,1)",
            "pointStrokeColor" => "#FFF",
            "pointHighlightFill" => "#FFF",
            "pointHighlightStroke" => "rgba(220,220,220,1)",
            "data" => $raw_data
        ];

        return $datasets;
    }
}
 