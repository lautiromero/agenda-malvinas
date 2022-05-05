<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class WeatherComponent extends Component
{
    protected $data;
    protected $url = "https://api.openweathermap.org/data/2.5/weather";
    protected $appId = "0226d8e0aef8c5f60788badc259789bd";

    protected $cities = array(
        //nombre para mostrar, latitud, longitud
        array("Ushuaia", -54.8, -68.3),
        array("Islas Malvinas", -51.7, -57.85),
        array("Antártida", -77.6, 168.2)
    );

    public function getCities()
    {
        return $this->cities;
    }

    private function getData()
    {
        $data = array();

        $cities = $this->getCities();

        foreach ($cities as $city) {

            $response = Http::get($this->url, [
                'lat' => $city[1],
                'lon' => $city[2],
                'appid' => $this->appId
            ]);

            //convertimos el body de la respuesta en un array
            $body = json_decode($response->body(), true);

            //
            $name = $city[0];  

            $temp = $body['main']['temp'];

            //pasamos temperatura de kelvin a celcius
            $temp = round($temp - 273.15, 1);

            $icon = $body['weather'][0]['icon'];

            $data[] = array('name' => $name, 'temp' => $temp, 'icon' => $icon );
        }

        return $data;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.weather-component', compact('data'));
    }
}
