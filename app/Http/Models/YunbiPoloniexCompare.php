<?php

namespace App\Http\Models;

class YunbiPoloniexCompare extends YunbiCompare
{
    protected function mapCoinKey($yunbiCoinKey)
    {
        $map = [
            "btccny" => "USDT_BTC",
            "ethcny" => "BTC_ETH",
            "btscny" => "BTC_BTS",
            "sccny"  => "BTC_SC",
            "etccny" => "BTC_ETC",
            "repcny" => "BTC_REP",
            "zeccny" => "BTC_ZEC",
            "gntcny" => "BTC_GNT",
        ];

        if (key_exists($yunbiCoinKey, $map)){
            return $map[$yunbiCoinKey];
        }
        return "";
    }
}