@extends('layouts.frontend_master')

@section('main_content')

@include('layouts.nav_menu')
<!-- Cart -->

<div class="cart_section" style="min-height:600px">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    @if (session('empty_cart_alert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('empty_cart_alert') }}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    @if (session('low_payment_alert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('low_payment_alert') }}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <div class="cart_title">Shopping Cart</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @php
                                $subtotal = 0;
                                $discount_amount = 0;
                                $flag = 0;
                            @endphp
                            @foreach (App\Models\Cart::where('ip_address', request()->ip())->get() as $cart)
                            <li class="cart_item clearfix mb-4">
                                <div class="cart_item_image"><img src="{{ asset('uploads/product') }}/{{ $cart->product_image }}" style="widht:50px" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text"><a href="{{ url('product/single') }}/{{ $cart->product_id }}">{{ $cart->product_name }}</a> <small>(Available {{ App\Models\Product::find($cart->product_id)->quantity }})</small></div>
                                        
                                            @if (App\Models\Product::find($cart->product_id)->quantity < $cart->product_quantity)
                                            <small class="text-danger">You have to decrese your product quantity</small>
                                            @php
                                                $flag++
                                            @endphp        
                                            @endif
                                        
                                    </div>
                                    
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">{{ $cart->product_quantity }}</div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Unit Price</div>
                                        <div class="cart_item_text">
                                            {{ $cart->product_price }}
                                        </div>
                                        
                                    </div>

                                    
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">
                                            ৳ {{ $cart->product_price * $cart->product_quantity }}
                                            </div>

                                        @php
                                            $subtotal = $subtotal + $cart->product_price * $cart->product_quantity
                                            
                                        @endphp
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <div class="cart_item_text">
                                            <a href="{{ url('cart/delete/') }}/{{ $cart->id }}" class="btn btn-danger btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    
                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">৳ {{ $subtotal }}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <a href="{{ url('shop') }}" type="button" class="button cart_button_checkout">Continue Shopping</a>
                        @if ($flag == 0)
                        <a href="{{ url('checkout') }}" type="button" class="button cart_button_checkout">Proceed to Checkout</a>                    
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection