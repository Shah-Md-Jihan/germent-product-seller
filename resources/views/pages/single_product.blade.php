@extends('layouts.frontend_master')

@section('main_content')

@include('layouts.nav_menu')

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset('uploads/product') }}/{{ $product_info->image1 }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_name">{{ $product_info->product_name }}</div>
                    @if (session('out_of_stock_error'))
                        <p class="text-danger">{{ session('out_of_stock_error') }}</p>
                    @endif
                    <p>Available: @if ($product_info->quantity < 0)
                        {{ '0' }}
                        @else
                        {{ $product_info->quantity }}
                    @endif</p>
                    <div class="product_text"><p>{{ $product_info->details }}</p></div>
                    <div class="order_info d-flex flex-row">
                        @if ($product_info->quantity <= 0)
                            <div class="alert alert-danger">
                                <strong>Out of Stock</strong>
                            </div>
                        @else
                        
                        <form action={{ url("cart/post") }} method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    
                                        
                                        <textarea style="display: none" name="pro_name">{{ $product_info->product_name }}</textarea>
                                        <input type="hidden" name="pro_id" value={{ $product_info->id }} />
                                        <input type="hidden" name="product_price" value={{ $product_info->selling_price }} />
                                        
                                        <input type="hidden" name="product_image" value={{ $product_info->image1 }} />
                                        
                                    
                                    <input id="quantity_input" name="quantity" type="text" pattern="[0-9]*" value="1">
                                    
                                
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <!-- Product Color -->
                                

                            </div>

                            <div class="product_price">৳ {{ $product_info->selling_price }}</div>
                            <div class="button_container">
                                <input type="submit" class="button cart_button" value="Add to Cart" />
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                            
                        </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection