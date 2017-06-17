<?php

namespace App\Http\Controllers;
use App\Http\Models\YunbiApi;

class IndexController extends Controller
{
    public function index()
    {
        $yunbiData = (new YunbiApi())->tickers();

        return view("data", ["yunbi" => $yunbiData]);
    }   
}