@extends('layouts.frontend_master')

@section('main_content')

@include('layouts.nav_menu')
<!-- Cart -->

<div class="cart_section" style="min-height:600px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ url('add/order') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" name="customer_name" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Billing Address</label>
                      <input type="text" name="billing_address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Post/Zip Code</label>
                      <input type="text" name="post_code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">City</label>
                      <input type="text" name="city" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Payment</label><br>
                      
                      <div class="d-flex">
                        <div class="d-flex">Cash On Delivery <input class="ml-2"  name="payment" type="radio" value="1" checked></div>
                      <div class="d-flex ml-4">Credit Card<input class="ml-2" name="payment" type="radio" value="2"></div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="mb-3">
                        <label class="form-label">Order Note</label>
                        <textarea class="form-control" name="note" id="" rows="4" required></textarea>
                      </div>

                  
            </div>
            <div class="col-lg-4">
                <div class="cart_container">
                    <div class="cart_title">Order Summery</div>
                    <div class="cart_items m-0 pt-2">
                        <ul class="cart_list">
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach (App\Models\Cart::where('ip_address', request()->ip())->get() as $cart)
                            <li class="cart_item clearfix mb-4">
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $cart->product_name }}</div>
                                    </div>
                                    
                                    <div class="cart_item_quantity cart_info_col ml-5">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">{{ $cart->product_quantity }}</div>
                                    </div>
                                    
                                    <div class="cart_item_total cart_info_col ml-5">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">৳ {{ $cart->product_price * $cart->product_quantity }}</div>

                                        @php
                                            $subtotal = $subtotal + $cart->product_price * $cart->product_quantity
                                        @endphp
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
                        <input type="submit" value="Place Order" class="btn btn-danger btn-block" />
                        <input type="hidden" name="amount" value="{{ $subtotal }}">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection