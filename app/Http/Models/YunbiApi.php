<?php

namespace App\Http\Models;


class YunbiApi 
{
    const HOST = "https://yunbi.com";

    public function tickers()
    {
        $path = "/api/v2/tickers.json";

        $response = (new \Guzzle\Http\Client(self::HOST))->get($path);

        var_dump($response->getStatusCode());
        var_dump($response->getResponseBody());

        return (string)$response->getResponseBody();
    }
}