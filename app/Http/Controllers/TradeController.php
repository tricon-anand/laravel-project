<?php

namespace App\Http\Controllers;
use App\Models\Trade;

class TradeController extends Controller
{

    public function index() {
        return view('trades.index', ['trades' => Trade::with('user')->latest('traded_on')->get()]);
    }

    public function show(Trade $trade) {

        return view('trades.show', ['trade' => $trade]);
    }
}
