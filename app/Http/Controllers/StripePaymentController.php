<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        if ($request->total < 55) {
            return redirect('cart')->with('low_payment_alert', 'Your payment must have over 54 TK');
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->total * 100,
            "currency" => "bdt",
            "source" => $request->stripeToken,
            "description" => "Payment from EOGAS."
        ]);

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
            // Insert into Order List table
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
        // Session::flash('success', 'Payment successful!');

        // return back();
    }
}
