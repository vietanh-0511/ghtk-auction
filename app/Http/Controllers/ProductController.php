<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Product::all();
        return response()->json([
            'result' => 'list Product',
            'data' => $a
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        $productName = $request->input('product_name');
        $userId = Auth::user()->id;
        $price = $request->input('price');
        $description = $request->input('description');
        $auctionId = $request->input('auction');
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/img'), $filename);
            $file = $filename;
        }
        return Product::create([
            'product_name' => $productName,
            'price' => $price,
            'description' => $description,
            'image' => $file,
            'user_id' => $userId,
            'auction_id' => $auctionId,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Product::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::where('id', $id)->delete();
    }

    public function auctionProductsList($id)
    {
        $auctionProducts = Product::where([
            ['products.auction_id', $id],
            ['products.name_active', ProductStatus::Actived]
        ])
            ->get();

        return view('user.auction_products', ['auctionProducts' => $auctionProducts]);
    }
}
