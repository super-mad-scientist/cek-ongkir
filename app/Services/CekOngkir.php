<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class CekOngkir {
    private $api_key;
    private static $instance;

    public function __construct(){
        $this->api_key = config('services.rajaongkir.key');
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CekOngkir();
        }
        return self::$instance;
    }

    public function getRajaOngkirCost($origin, $destination, $weight){
        $courier = ['jne', 'tiki', 'pos']; //available courier in rajaongkir free api

        $result = null;
        foreach($courier as $c){
            $response = Http::withHeaders([
                'key' => $this->api_key
            ])
            ->acceptJson()
            ->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $c
            ]);

            if(json_decode($response->body())->rajaongkir->status->code == 200){
                $json = json_decode($response->body())->rajaongkir->results;
            
                if($result == null)
                    $result = $json;
                else
                    $result = array_merge($result, $json);
            }

        }

        return $result;
    }

}