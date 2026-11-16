<?php
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/trades', [TradeController::class, 'index']);
Route::get('/trades/{trade}', [TradeController::class, 'show']);
Route::view('/aboutus', 'aboutus');
