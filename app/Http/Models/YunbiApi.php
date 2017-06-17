<?php

namespace App\Http\Models;


class YunbiApi 
{
    const HOST = "https://yunbi.com/api/v2/";

    public function tickers()
    {
        $path = "tickers.json";

        $response = (new \GuzzleHttp\Client(["base_uri" => self::HOST]))->get($path);

        return (string)$response->getBody();
    }
}