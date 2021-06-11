<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ShippingController extends Controller
{
    private $apiKey;
    private $origin;
    private $weight;
    private $destination;

    public function getCities(Request $request)
    {
        $provinceId = $request->province;
        $cities = [];

        if (!empty($provinceId)) {
            $cities = City::where('province_id', $provinceId)->get();
        }

        return new CityResource($cities);
    }

    public function getPrices(Request $request)
    {
        $destination = $request->cityId;
        $apiKey = config('rajaongkir.api_key');
        $origin = config('rajaongkir.city_source');

        $this->apiKey = $apiKey;
        $this->origin = $origin;
        $this->weight = 2;
        $this->destination = $destination;

        $jne = $this->_sendRajaOngkirRequest('jne');
        $pos = $this->_sendRajaOngkirRequest('pos');
        $tiki = $this->_sendRajaOngkirRequest('tiki');

        $couriers = [
            'jne' => $jne,
            'pos' => $pos,
            'tiki' => $tiki
        ];

        return response()
            ->json(['data' => $couriers]);
    }

    private function _sendRajaOngkirRequest($courier = 'jne')
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/cost',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'key='. $this->apiKey .'&origin=62&destination='. $this->destination .'&weight='. $this->weight .'&courier=' . $courier,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $result = curl_exec($curl);
        $result = json_decode($result);

        if (isset($result->rajaongkir)) {
            $data = $result->rajaongkir;

            $status = $data->status;
            if ($status->code == 200) {
                return $data->results;
            }

            return NULL;
        }
        curl_close($curl);

        return NULL;
    }
}
