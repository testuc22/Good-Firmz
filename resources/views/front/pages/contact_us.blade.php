@extends('front.layouts.default')
@section('title')
B2B-Seeker - Contact Us
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Contact Us</h2>
	</div>
</div>
<div class="get-in-touch">
	<div class="container">
		<h2>Get in Touch</h2>
		<div class="row justify-content-lg-center">
			<div class="col-lg-8">
				@if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
				<form method="POST" action="{{route('send-contactus-enquiry')}}">
					<div class="contact-us-form">
						<div class="row">
							{{@csrf_field()}}

							<div class="col-md-6">
								<input type="text" placeholder="Name*" name="name" value="{{old('name')}}">
								<input type="email" placeholder="Email*"  name="email" value="{{old('email')}}">
								<input type="text" placeholder="Phone*"  name="phone_number" value="{{old('phone_number')}}">
							</div>
							<div class="col-md-6">
								<textarea placeholder="Message*" name="message">{{old('message')}}</textarea>
								<input class="btn-submit" type="submit" value="submit">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="address-bar">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="address-bar-content">
						<span class="address-bar-icon"><i class="fa fa-envelope" aria-hidden="true"></i> </span>
						<h5>Email</h5>
						<a href="mailto:">contact@b2bseeker.com</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="address-bar-content second-child">
						<span class="address-bar-icon"><i class="fa fa-envelope" aria-hidden="true"></i> </span>
						<h5>Support</h5>
						<a href="mailto:">support@b2bseeker.com</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="address-bar-content">
						<span class="address-bar-icon"><i class="fa fa-map-marker" aria-hidden="true"></i> </span>
						<h5>Address</h5>
						<p>Ludhiana, Punjab</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="address-bar-content socila-icon">
						<h5>Follow us on</h5>
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection