<?php

namespace App\Http\Models;

class YunbiBittrexCompare extends YunbiCompare
{
    protected function mapCoinKey($yunbiCoinKey)
    {
        $map = [
            "btccny" => "USDT-BTC",
            "ethcny" => "BTC-ETH",
            "dgdcny" => "BTC-DGD",
            "btscny" => "BTC-BTS",
            "sccny"  => "BTC-SC",
            "etccny" => "BTC-ETC",
            "1stcny" => "BTC-1ST",
            "repcny" => "BTC-REP",
            "anscny" => "BTC-ANS",
            "zeccny" => "BTC-ZEC",
            "gntcny" => "BTC-GNT",
        ];

        if (key_exists($yunbiCoinKey, $map)){
            return $map[$yunbiCoinKey];
        }
        return "";
    }
}