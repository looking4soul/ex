<?php

namespace App\Http\Controllers;
use App\Http\Models\Bitfinex;
use App\Http\Models\Bittrex;
use App\Http\Models\Poloniex;
use App\Http\Models\Rate;
use App\Http\Models\Yunbi;
use App\Http\Models\YunbiBitfinexCompare;
use App\Http\Models\YunbiBittrexCompare;
use App\Http\Models\YunbiPoloniexCompare;

class IndexController extends Controller
{
    public function index()
    {
        $rate = (new Rate())->getRate();

        $yunbiData = (new Yunbi())->getTickers();

        $bittrexData = (new Bittrex())->getTickers();

        $yunbiBittrexCompare = (new YunbiBittrexCompare())->compare($yunbiData, $bittrexData);

        $poloniexData = (new Poloniex())->getTickers();

        $yunbiPoloniexCompare = (new YunbiPoloniexCompare())->compare($yunbiData, $poloniexData);

        $bitfinexData = (new Bitfinex())->getTickers();

        $yunbiBitfinexCompare = (new YunbiBitfinexCompare())->compare($yunbiData, $bitfinexData);

        return view("data", [
            "rate" => $rate,
            "yunbi" => $yunbiData,
            "bittrex" => $bittrexData,
            "yunbiBittrexCompare" => $yunbiBittrexCompare,
            "poloniex" => $poloniexData,
            "yunbiPoloniexCompare" => $yunbiPoloniexCompare,
            "bitfinex" => $bitfinexData,
            "yunbiBitfinexCompare" => $yunbiBitfinexCompare,
        ]);
    }   
}