<?php
namespace App\Http\Models;

abstract class YunbiCompare
{
    public function compare($yunbi, $x)
    {
        $rst = [];
        foreach ($yunbi as $k => $v){
            $xKey = $this->mapCoinKey($k);
            if (!empty($xKey)){
                $rst[$k] = $this->compareOne($v, $x[$xKey]);
            }

        }

        return $rst;
    }

    protected function compareOne($yunbiOne, $xOne)
    {
        $yunbiOnePriceUsd = $yunbiOne["price-usd"];
        $xOnePriceUsd     = $xOne["price-usd"];


        if ($xOnePriceUsd == 0){
            $yunbiDeltaX = 0;
        }else{

            $yunbiDeltaX = round(
                (($yunbiOnePriceUsd - $xOnePriceUsd) / $xOnePriceUsd + 1) * 100,
                2
            );
        }

        if ($yunbiOnePriceUsd == 0){
            $xDeltaYunbi = 0;
        }else{
            $xDeltaYunbi = round(
                (($xOnePriceUsd - $yunbiOnePriceUsd) / $yunbiOnePriceUsd + 1) * 100,
                2
            );
        }

        return [
            "yunbi-price-usd" => $yunbiOnePriceUsd,
            "x-price-usd" => $xOnePriceUsd,
            "yunbi-delta-bittrex" => $yunbiDeltaX,
//            "x-delta-yunbi" => $xDeltaYunbi,
        ];
    }

    abstract protected function mapCoinKey($yunbiCoinKey);
}