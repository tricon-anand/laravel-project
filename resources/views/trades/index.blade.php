@extends('layout.app')
@section('title', "All Trade")
@section('content')
 <h1>Trades</h1>
    <table>
        <tr><th>Symbol</th><th>Side</th><th>Qty</th><th>Entry</th><th>Exit</th><th>P&amp;L</th></tr>
        @foreach ($trades as $trade)
            <tr>
                <td><a href="/trades/{{ $trade['id'] }}">{{ $trade['symbol'] }}</a></td>
                <td>{{ $trade['side'] }}</td>
                <td>{{ $trade['qty'] }}</td>
                <td>{{ $trade['entry'] }}</td>
                <td>{{ $trade['exit'] }}</td>
                <td class="{{ $trade['pnl'] >= 0 ? 'profit' : 'loss' }}">{{ $trade['pnl'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection