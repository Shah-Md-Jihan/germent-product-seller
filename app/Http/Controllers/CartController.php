<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart', [
            'carts' => Cart::latest()->get()
        ]);
    }

    public function addtocart(Request $request)
    {
        if (Cart::where('product_id', $request->pro_id)->where('ip_address', request()->ip())->exists()) {
            Cart::where('product_id', $request->pro_id)->where('ip_address', request()->ip())->increment('product_quantity', $request->quantity);
        } else {
            Cart::insert([
                'product_id' => $request->pro_id,
                'ip_address' => request()->ip(),
                'product_name' => $request->pro_name,
                'product_price' => $request->product_price,
                'product_quantity' => $request->quantity,
                'product_image' => $request->product_image,
                'created_at' => Carbon::now(),
            ]);
        }


        return back();
    }
}
