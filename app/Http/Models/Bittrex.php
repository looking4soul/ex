<?php

namespace App\Http\Models;

class Bittrex
{

    public function getTickers()
    {
        $apiTickers = $this->getApiTickets();

        $btcUsd = $apiTickers["USDT-BTC"]["result"]["Last"];
        unset($apiTickers["USDT-BTC"]);

        $adaptedTickers = array_map(function($v) use($btcUsd){
            $result = $v["result"];
            $adapted = [
                "price-usd" => round($result["Last"] * $btcUsd, 4),
            ];
            return $adapted;

        }, $apiTickers);

        $adaptedTickers["USDT-BTC"] = ["price-usd" => $btcUsd];

        return $adaptedTickers;
    }

    protected function getApiTickets()
    {
        $markets = [
            "USDT-BTC",
            "BTC-ETH",
            "BTC-DGD",
            "BTC-BTS",
            "BTC-SC",
            "BTC-ETC",
            "BTC-1ST",
            "BTC-REP",
            "BTC-ANS",
            "BTC-ZEC",
            "BTC-GNT",
        ];

        $bittrexApi = new BittrexApi();

        $rst = [];
        foreach ($markets as $market){
            $rst[$market] = json_decode($bittrexApi->getTicker($market), true);
        }

        return $rst;
    }
}