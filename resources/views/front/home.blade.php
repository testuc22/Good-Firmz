@extends('front.layouts.default')
@section('title')
Good Firmz - Home Page
@endsection
@section('content')
@if($data['banner'])
<section class="banner" @if(isset($data['banner']) && $data['banner']!="") style="background:url({{asset('public/images/'.$data['banner']) }}) no-repeat scroll center center / cover" @endif>
	<div class="container">
		<div class="row justify-content-lg-center">
			<div class="col-lg-8">
				<h2>{{$data['banner_text']}}</h2>
				<form class="banner-form" method="GET" action="{{route('search')}}">
					<div class="row">
						<div class="col-md-5">
							<div class="search-item">
							<input type="text" autocomplete="off"  placeholder="Search by business or keyword" name="keyword">			
							<span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="select-section">
								<input type="Location" placeholder="Location" id="locationInput" autocomplete="off" name="location">	
								<span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="col-md-3">
							 <input class="btn-search" type="submit" value="Search">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endif

@if(!empty($categories))
<div class="popular-categories">
	<div class="container">
		<h2>Popular Categories</h2>	
		<div class="popular-categories-row">
			@foreach($categories as $cat)		
			<div class="popular-categories-item ">
				<a href="#">
					@if($cat->image)
						<img src="{{ asset('public/category_images/'.$cat->image) }}">
					@else
						<img src="{{asset('front/images/popular-img1.png')}}">
					@endif
				</a>
				<h4>{{$cat->name}}</h4>
				{{-- <p>115 Rertaurants</p> --}}
			</div>	
			@endforeach	
		</div>
		<a class="btn-categories" href="{{route('all-categories')}}">View All categories</a>
	</div>
</div>
@endif

@if(!empty($sellers))
<div class="featured-listing">
	<div class="container">
		<h2>Featured Listing</h2>
		<div class="row">
			@foreach($sellers as $seller)
			<div class="col-lg-6">
				@include('front.seller.block_seller_details')
			</div>
			@endforeach
		</div>
		<a class="btn-categories btn-listing" href="{{route('all-listings')}}">View All Listing</a>
	</div>
</div>
@endif
<div class="how-it-works">
	<div class="container">
		<h2>How It Works</h2>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="enquiry-section">					
					<div class="image-section">
						<img src="{{asset('front/images/it-work1.png')}}">
						<h3>1</h3>
					</div>
				
					<div class="image-content">
						<h4>Search Business</h4>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
					</div>						
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="enquiry-section">
					<ul>
						<li>
							<div class="image-section">
								<img src="{{asset('front/images/it-work2.png')}}">
								<h3>2</h3>
							</div>
						</li>
						<li>
							<div class="image-content">
								<h4>Search Business</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="enquiry-section">
					<ul>
						<li>
							<div class="image-section">
								<img src="{{asset('front/images/it-work3.png')}}">
								<h3>3</h3>
							</div>
						</li>
						<li>
							<div class="image-content">
								<h4>Search Business</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
