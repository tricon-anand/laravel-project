<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeController extends Controller
{
    private function sampleTrades(): array
    {
        $raw = [
            ['id' => 1, 'symbol' => 'RELIANCE', 'side' => 'BUY',  'qty' => 10, 'entry' => 2900, 'exit' => 2950],
            ['id' => 2, 'symbol' => 'TCS',      'side' => 'SELL', 'qty' => 5,  'entry' => 4100, 'exit' => 4150],
            ['id' => 3, 'symbol' => 'INFY',     'side' => 'BUY',  'qty' => 20, 'entry' => 1800, 'exit' => 1780],
        ];

        return array_map(function ($t) {
            $diff = $t['side'] === 'BUY' ? $t['exit'] - $t['entry'] : $t['entry'] - $t['exit'];
            $t['pnl'] = $diff * $t['qty'];
            return $t;
        }, $raw);
    }

    public function index() {
        return view('trades.index', ['trades' => $this->sampleTrades()]);
    }

    public function show($id) {
        $trade = collect($this->sampleTrades())->firstWhere('id', (int) $id);

        if (! $trade) {
            abort(404);
        }

        return view('trades.show', ['trade' => $trade]);
    }
}
