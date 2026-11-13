@extends('layout.app')
@section('content')
 <h1>{{ $trade['symbol'] }} ({{ $trade['side'] }})</h1>
<p>Qty: {{ $trade['qty'] }}</p>
<p>Entry: {{ $trade['entry'] }} | Exit: {{ $trade['exit'] }}</p>
<p>P&amp;L: {{ $trade['pnl'] }}</p>
<a href="/trades">Back to all trades</a>
@endsection