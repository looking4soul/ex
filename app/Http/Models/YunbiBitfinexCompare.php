<?php

namespace App\Http\Models;

class YunbiBitfinexCompare extends YunbiCompare
{
    protected function mapCoinKey($yunbiCoinKey)
    {
        $map = [
            "btccny" => "btcusd",
            "ethcny" => "ethbtc",
            "etccny" => "etcbtc",
            "zeccny" => "zecbtc",
        ];

        if (key_exists($yunbiCoinKey, $map)){
            return $map[$yunbiCoinKey];
        }
        return "";
    }
}