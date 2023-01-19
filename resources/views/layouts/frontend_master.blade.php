<!DOCTYPE html>
<html lang="en">
<head>
<title>EOGAS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/bootstrap4/bootstrap.min.css">
<link href="{{ asset('frontend_assets') }}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/shop_responsive.css">

<style>
	.shop_banner{
		background-image: url('{{ asset('frontend_assets') }}/images/shop_background.png');
		background-size: cover;
		display: flex;
		align-items: center;
		justify-content: center;
		min-height: 250px;
	}

</style>
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend_assets') }}/images/phone.png" alt=""></div>+38 068 005 3570</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend_assets') }}/images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li>
									<li>
										<a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="{{ asset('frontend_assets') }}/images/user.svg" alt=""></div>
								<div><a href="{{ route('register') }}">Register</a></div>
								<div><a href="{{ route('login') }}">Sign in</a></div>
								{{-- @endif --}}
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-12">
					{{-- add_subcription_alert start --}}
					@if (session('add_subcription_alert'))
						<div class="alert alert-success">
							<strong>{{ session('add_subcription_alert') }}</strong>
						</div>
					@endif
					{{-- add_subcription_alert end --}}
				</div>
			</div>
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							
							<a href="{{ url('/') }}" >
								<img src="{{ asset('frontend_assets') }}/images/logo.png" style="width:150px" alt="">
								<span style="margin-left: 38px;font-size:18px; font-weight:bold;color:orangered">EOGAS</span>
							</a>
							
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('frontend_assets') }}/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="{{ asset('frontend_assets') }}/images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{ asset('frontend_assets') }}/images/cart.png" alt="">
										<div class="cart_count"><span>{{ App\Models\Cart::where('ip_address', request()->ip())->count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('cart') }}">Cart</a></div>
										@php
											App\Models\Cart::where('ip_address', request()->ip())->count();
										@endphp
										@php
											$subtotal=0;
										@endphp
										@foreach (App\Models\Cart::where('ip_address', request()->ip())->get() as $price)
											@php
												$subtotal = $subtotal + $price->product_price * $price->product_quantity
											@endphp
											
										@endforeach
										<div class="cart_price">৳ {{ $subtotal }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

@yield('main_content')

<!-- Newsletter -->

<div class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
          <div class="newsletter_title_container">
            <div class="newsletter_icon"><img src="{{ asset('frontend_assets') }}/images/send.png" alt=""></div>
            <div class="newsletter_title">Sign up for Newsletter</div>
            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
          </div>
          <div class="newsletter_content clearfix">
            <form action="{{ route('store.newslatter') }}" method="post" class="newsletter_form">
							@csrf
              <input type="text" name="email" class="newsletter_input" placeholder="Enter your email address">
							@error ('email')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
              <button class="newsletter_button" type="submit">Subscribe</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->

<footer class="footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 footer_col">
        <div class="footer_column footer_contact">
          <div class="logo_container">
			
            <div class="logo"><a href="#">EOGAS</a></div>
			
          </div>
          <div class="footer_title">Got Question? Call Us 24/7</div>
          <div class="footer_phone">+38 068 005 3570</div>
          <div class="footer_contact_text">
            <p>17 Princess Road, London</p>
            <p>Grester London NW18JR, UK</p>
          </div>
          <div class="footer_social">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#"><i class="fab fa-google"></i></a></li>
              <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-2 offset-lg-2">
        <div class="footer_column">
          <div class="footer_title">Find it Fast</div>
          <ul class="footer_list">
            <li><a href="#">Computers & Laptops</a></li>
            <li><a href="#">Cameras & Photos</a></li>
            <li><a href="#">Hardware</a></li>
            <li><a href="#">Smartphones & Tablets</a></li>
            <li><a href="#">TV & Audio</a></li>
          </ul>
          <div class="footer_subtitle">Gadgets</div>
          <ul class="footer_list">
            <li><a href="#">Car Electronics</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="footer_column">
          <ul class="footer_list footer_list_2">
            <li><a href="#">Video Games & Consoles</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Cameras & Photos</a></li>
            <li><a href="#">Hardware</a></li>
            <li><a href="#">Computers & Laptops</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="footer_column">
          <div class="footer_title">Customer Care</div>
          <ul class="footer_list">
            <li><a href="#">My Account</a></li>
            <li><a href="#">Order Tracking</a></li>
            <li><a href="#">Wish List</a></li>
            <li><a href="#">Customer Services</a></li>
            <li><a href="#">Returns / Exchange</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Product Support</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</footer>

<!-- Copyright -->

<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
          <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
          <div class="logos ml-sm-auto">
            <ul class="logos_list">
              <li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_1.png" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_2.png" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_3.png" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_4.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
	function myFunction() {
	var x = document.getElementById("categories");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
	}
</script>

	
<script src="{{ asset('frontend_assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontend_assets') }}/styles/bootstrap4/popper.js"></script>
<script src="{{ asset('frontend_assets') }}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/slick-1.8.0/slick.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/easing/easing.js"></script>
<script src="{{ asset('frontend_assets') }}/js/custom.js"></script>
<script src="{{ asset('frontend_assets') }}/js/cart_custom.js"></script>
<script src="{{ asset('frontend_assets') }}/js/product_custom.js"></script>
<script src="{{ asset('frontend_assets') }}js/shop_custom.js"></script>
<script src="{{ asset('frontend_assets') }}plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{ asset('frontend_assets') }}plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend_assets') }}plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

</body>

</html>
