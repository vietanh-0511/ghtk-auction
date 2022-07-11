<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Product;

use App\Supports\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    private $createBidAction;

    public function __construct(CreateBidAction $createBidAction,
    BidRepository $bidRepository
    ) {
        parent::__construct($createBidAction);
        $this->createBidAction = $createBidAction;
        $this-
    }

    public function store(BidRequest $request) {
        $request->validate();
       // $createBidAction = app()->make(CreateBidAction::class);
        try {
            $bid = $this->createBidAction->handle($request->toArray());
        } catch(CreateBidException $e) {
            return Responder::fail($e->getMessage());
        } catch(Exception $e) {
            return Responder::fail('Lỗi chung');
        }

        return Responder::success($bid, 'Thành công');

    }
    public function bidView($id)
    {
        $bidProductInfo = Product::where('products.id', $id)
            ->join('auctions', 'auctions.id', '=', 'products.auction_id')
            ->first();
        return view('user.bid', ['info' => $bidProductInfo]);
    }

    public function placeBid(BidRequest $request, $id)
    {
        $request->validated();
        // $validated = $request->validate([
        //     'bid' => ['required', 'min:0'],
        // ]);
        $userId = Auth::user()->id;
        $price = $request->input('bid');
        Bid::create([
            'price' => $price,
            'user_id' => $userId,
            'product_id' => $id,
        ]);

        $bidProductInfo = Product::where('products.id', $id)
            ->join('auctions', 'auctions.id', '=', 'products.auction_id')
            ->first();
        return view('user.bid', ['info' => $bidProductInfo]);
    }
}
