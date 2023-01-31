<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addorder(Request $request)
    {
        if ($request->payment == 1) {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'billing_address' => $request->billing_address,
                'phone' => $request->phone,
                'post_code' => $request->post_code,
                'city' => $request->city,
                'payment' => $request->payment,
                'note' => $request->note,
                'amount' => $request->amount,
                'created_at' => Carbon::now(),
            ]);


            foreach (Cart::where('ip_address', request()->ip())->get() as $cart) {
                OrderList::insert([
                    'order_id' => $order_id,
                    'user_id' => Auth::id(),
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->product_quantity,
                    'created_at' => Carbon::now(),
                ]);
                Product::find($cart->product_id)->decrement('quantity', $cart->product_quantity);
                Cart::find($cart->id)->delete();
            }
            return redirect('/')->with('order_complete_alert', 'We Received Your order Successfully!');
        } else {
            return view('stripe', [
                'req_all' => $request->all(),
            ]);
        }
    }
}
