<?php

namespace App\Http\Models;

class Poloniex
{
    public function getTickers()
    {
        $apiTickers = $this->getApiTickers();

        $btcUsd = $apiTickers["USDT_BTC"]["last"];
        unset($apiTickers["USDT_BTC"]);

        $adaptedTickers = array_map(function($v) use($btcUsd){
            $adapted = [
                "price-usd" => round($v["last"] * $btcUsd, 4),
            ];
            return $adapted;

        }, $apiTickers);

        $adaptedTickers["USDT_BTC"] = ["price-usd" => $btcUsd];

        return $adaptedTickers;
    }

    protected function getApiTickers()
    {
        $pairs = [
            "USDT_BTC",
            "BTC_ETH",
            "BTC_ETC",
            "BTC_ZEC",
            "BTC_SC",
            "BTC_BTS",
            "BTC_GNT",
            "BTC_REP",
        ];

        return (new PoloniexApi("", ""))->get_tickers($pairs);
    }
}