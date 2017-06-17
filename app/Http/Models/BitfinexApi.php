<?php
namespace App\Http\Models;

class BitfinexApi
{
    const HOST = "https://api.bitfinex.com/v1/";

    protected $httpClient;

    function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client(["base_uri" => self::HOST]);
    }

    public function getTicker($symbol)
    {
        return (string)($this->httpClient->get("pubticker/$symbol")->getBody());
    }
}