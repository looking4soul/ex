<?php

namespace App\Http\Models;

class Bitfinex
{

    public function getTickers()
    {
        $apiTickers = $this->getApiTickets();

        $btcUsd = $apiTickers["btcusd"]["last_price"];
        unset($apiTickers["btcusd"]);

        $adaptedTickers = array_map(function($v) use($btcUsd){
            $adapted = [
                "price-usd" => round($v["last_price"] * $btcUsd, 4),
            ];
            return $adapted;

        }, $apiTickers);

        $adaptedTickers["btcusd"] = ["price-usd" => $btcUsd];

        return $adaptedTickers;
    }

    protected function getApiTickets()
    {
        $markets = [
            "btcusd",
            "ethbtc",
            "etcbtc",
            "zecbtc",
        ];

        $api = new BitfinexApi();

        $rst = [];
        foreach ($markets as $market){
            $rst[$market] = json_decode($api->getTicker($market), true);
        }

        return $rst;
    }
}