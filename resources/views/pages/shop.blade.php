@extends('layouts.frontend_master')

@section('main_content')

@include('layouts.nav_menu')

	<!-- Home -->

	<div class="shop_banner" id="overlay">
		<h2>Our Shop</h2>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                                @foreach (App\Models\Category::all() as $category)
								<li><a href="#">{{ $category->category_name }}</a></li>
                                @endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->
                    <h5 class="text-primary">Total {{ App\Models\Product::all()->count() }} products</h5>
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-4 mb-5">
							<div class="card">
								<img src="{{ asset('uploads/product') }}/{{ $product->image1 }}" class="card-img-top p-2" style="height: 200px" alt="...">
								<div class="card-body">
								  <h4 class="card-title"><a href="{{ 'product/single' }}/{{ $product->id }}">{{ $product->product_name }}</a></h4>
								  <p class="text-primary"><b>৳{{ $product->selling_price }}</b></p>
								  <p class="card-text mb-3">{{ Str::limit($product->details, 50);
								}}</p>
								  <form action={{ url("cart/post") }} method="post" enctype="multipart/form-data">
									@csrf		
												<textarea style="display: none" name="pro_name">{{ $product->product_name }}</textarea>
												<input type="hidden" name="pro_id" value={{ $product->id }} />
												<input type="hidden" name="product_price" value={{ $product->selling_price }} />
												
												<input type="hidden" name="product_image" value={{ $product->image1 }} />
												
											
											<input type="hidden" name="quantity" type="text" value="1">
									
											<input type="submit" class="btn btn-primary btn-block" value="Add To Cart" />
								</form>
								</div>
							  </div>
						</div>
                        @endforeach
                    </div>

					{{ $products->links() }}
					

				</div>
			</div>
		</div>
	</div>
@endsection