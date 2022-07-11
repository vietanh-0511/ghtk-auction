<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//list autions
Route::get('/auction', [AuctionController::class, 'auctionList']);

//store autions
Route::post('/store_auction', [AuctionController::class, 'store']);

//store autions
Route::post('/store_product', [ProductController::class, 'store']);

//auction products list
Route::get('/auction_products/{id}', [ProductController::class, 'auctionProductsList']);

//place bid
Route::get('/bid_view/{id}', [BidController::class, 'bidView']);
Route::post('/place_bid/{id}', [BidController::class, 'placeBid']);
