@extends('layouts.frontend_master')

@section('main_content')

@include('layouts.nav_menu')

	<!-- Home -->

	<div class="shop_banner" id="overlay">
		<h2>Contact Us</h2>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 m-auto">
                    <form>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" placeholder="Your Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                          <label>Message</label>
                          <textarea class="form-control" rows="8" placeholder="Your Message" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Message</button>
                      </form>
                </div>
			</div>
		</div>
	</div>
@endsection