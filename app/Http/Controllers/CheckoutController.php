<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('is_admin');
    }

    public function checkout()
    {
        $cart_length = Cart::where('ip_address', request()->ip())->count();
        if ($cart_length < 1) {
            return back()->with('empty_cart_alert', 'Your cart is empty!');
        }
        return view('pages.checkout');
    }
}
