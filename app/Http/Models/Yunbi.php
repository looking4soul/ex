<?php

namespace App\Http\Models;

class Yunbi
{
    protected $tickersApiDataArray = null;


    public function getTickers()
    {
        $rate = (new Rate())->getRate();

        $apiDataArray = $this->getTickersApiDataArray();

        return array_map(function($v) use ($rate){
            $adapted = [];
            $adapted["at"] = $v["at"];

            $ticker = $v["ticker"];

            $adapted["price-cny"] = $ticker["last"];
            $adapted["price-usd"] = round($ticker["last"] / $rate, 4);
            $adapted["volume-coin"] = $ticker["vol"];
            $adapted["volume-usd"] = round($ticker["vol"] * $ticker["last"] / $rate, 4);

            return $adapted;
        }, $apiDataArray);
    }

    public function getCoinKeys()
    {
        $apiDataArray = $this->getTickersApiDataArray();
        return array_keys($apiDataArray);
    }

    protected function getTickersApiDataArray()
    {
        if (empty($this->tickersApiDataArray)){
            $this->tickersApiDataArray = json_decode((new YunbiApi())->tickers(), true);
        }
        return $this->tickersApiDataArray;
    }
}