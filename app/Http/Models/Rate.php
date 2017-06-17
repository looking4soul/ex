<?php

namespace App\Http\Models;

class Rate
{
    protected $rate = "6.8097";

    public function getRate()
    {
        if (empty($this->rate)){
            $response = (new RateApi())->getRate();
            $this->rate = json_decode($response, true)["result"]["rate"];
        }
        return $this->rate;

    }
}