<?php

namespace App\Http\Models;

class BittrexApi
{
    const HOST = "https://bittrex.com/api/v1.1/";

    protected $httpClient;

    function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client(["base_uri" => self::HOST]);
    }

    public function getMarkets()
    {
        return (string)($this->httpClient->get("public/getmarkets")->getBody());
    }

    public function getTicker($market)
    {
        return (string)($this->httpClient->get("public/getticker?market=$market")->getBody());
    }
}