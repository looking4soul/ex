<?php

namespace App\Http\Models;

class RateApi
{
    public function getRate()
    {
        $uri = "http://api.k780.com:88/?app=finance.rate&scur=USD&tcur=CNY&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4";
        return (string)(new \GuzzleHttp\Client())->get($uri)->getBody();
    }
}

