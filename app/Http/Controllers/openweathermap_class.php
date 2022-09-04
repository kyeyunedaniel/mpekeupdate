<?php

class weatherApp
{
    const URI = 'https://api.openweathermap.org/data/2.5/';
    private $api_key;
    private $data;

    /**
     * Sets api key
     * @param string $api_key
     * @return string
     * @throws Exception
     */
    public function __construct($api_key)
    {
        if (!isset($api_key) or trim($api_key) == '') {
            throw new Exception("You must provide an API key!");
        }
        return $this->api_key = $api_key;
    }

    /**
     * GET api call
     * @param string $url
     * @param array $params
     * @return string
     * @throws Exception
     */
    private function apiCall($url, $params = array())
    {
        $data = null;
        $url = (self::URI . $url);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if (!empty($params)) {
            $url = ($url . '?appid=' . $this->api_key . '&' . str_replace('%2C', ',', http_build_query($params, null)));
        } else {
            throw new Exception('params was empty');
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        $response = curl_exec($curl);
        $responseInfo = curl_getinfo($curl);
        switch ($responseInfo['http_code']) {
            case 0:
                throw new Exception('Timeout reached when calling ' . $url);
                break;
            case 200:
                $data = $response;
                break;
            case 401:
                throw new Exception('Unauthorized request to ' . $url . ': ' . json_decode($response)->message);
                break;
            case 404;
                $data = null;
                break;
            default:
                throw new Exception('Connect to API failed with response: ' . $responseInfo['http_code']);
                break;
        }
        $this->data = $data;
        return $data;
    }

    /**
     * Generates a call with parameters
     * @param string $base
     * @param array $params
     * @return string
     */
    public function generateCall($base, $params)
    {
        return $this->apiCall($base, $params);
    }

    /**
     * Access values from current data
     */
    public function readCurrentData()
    {
        $data = json_decode($this->data, true);
        $temp = $data['main']['temp'];
        $max_temp = $data['main']['temp_max'];
        $min_temp = $data['main']['temp_min'];
        $pressure = $data['main']['pressure'];
        $humidity = $data['main']['humidity'];
        $wind_speed = $data['wind']['speed'];
        $wind_direction = $data['wind']['deg'];
        $call_id = $data['sys']['id'];
        $clouds = $data['clouds']['all'];
        $main = $data['weather'][0]['main'];
        $desc = $data['weather'][0]['description'];
        $icon = $data['weather'][0]['icon'];
        if (isset($data['rain']['3h'])) {
            $rain3h = $data['rain']['3h'];
        } else {
            $rain3h = 0;
        }
    }

    /**
     * Access values from forecast data
     */
    public function readForecastData()
    {
        $data = json_decode($this->data, true);
        foreach ($data['list'] as $val) {
            $main = $val['main'];
            $temp = $main['temp'];
            $date = $val['dt_txt'];
            $pressure = $main['pressure'];
            $humidity = $main['humidity'];
            $wind_speed = $val['wind']['speed'];
            $wind_direction = $val['wind']['deg'];
            $clouds = $val['clouds']['all'];
            $weather = $val['weather'][0];
            $main = $weather['main'];
            $icon = $weather['icon'];
        }
    }
}

//USAGE

$call = new weatherApp("APIKEYHERE");//New api call
$current = $call->generateCall('weather', ["zip" => "3000,au", "units" => "metric"]);//Calls current data
$forecast = $call->generateCall('forecast', ["zip" => "3000,au", "units" => "metric"]);//Calls forecast data