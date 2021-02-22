@extends('front.layouts.default')
@section('title')
Good Firmz - {{$seller->name}}
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>{{$seller->name}}</h2>
	</div>
</div>
<div class="company-detail">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="company-detail-content">
					<div class="row">
						<div class="col-lg-3">
							<div class="company-detail-logo">
								<a href="#">
									@if($seller->logo)
                                        <img style="width: 200px;margin-bottom: 10px;" src="{{ asset('public/seller_logo/'.$seller->logo) }}">
                                    @else
                                    	<img src="{{asset('images/default-seller-logo.jpg') }}">
                                    @endif
								</a>
							</div>
						</div>
						<div class="col-lg-9">
							<div class="company-detail-inner">
								<h3>{{$seller->name}}</h3>
								<div class="rating-content rating-image"> <!-- <img src="images/star.png"> -->
									<span class="seller_showRating" data-rating="{{$seller->avg_rating}}"></span>
									<span>({{count($active_reviews)}})</span>
								</div>
								<p>{{$seller->desc}}</p>
							</div>
						</div>
					</div>
					<ul>
						@if($seller->categories)
						<li>
							<img src="{{asset('front/images/icon-img.png')}}">
							<strong>Category:</strong>
							@foreach($seller->categories as $cat)
								<span>{{$cat->name}}</span>
							@endforeach
						</li>
						@endif
						<li>
							<i class="fa fa-map-marker" aria-hidden="true"></i>							
							<strong>Address:</strong>
							<p>
								<span>{{$seller->address1}}, {{$seller->address2}}, {{$seller->city->name}}, {{$seller->state->name}}, India</span>
								<a href="#"> get Direction</a>
							</p>
						</li>
						@if(Auth::guard('web')->id())
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							<strong>Phone:</strong><p> +91-{{$seller->phone_number}}</p>
						</li>
						@endif
					</ul>
				</div>
				<div class="email-section">
					<ul>
						@if(Auth::guard('web')->id())
							<li>
								<span>Email: </span>
								<a href="mailto:{{$seller->email}}">{{$seller->email}}</a>
							</li>
							@if($seller->website)
								<li>
									<span>Website: </span>
									<a href="{{$seller->website}}" target="_blank">{{$seller->website}}</a>
								</li>
							@endif
						@endif

						<li>
						@if(Auth::guard('web')->id())
							<a class=" btn-send-enquiry" data-title="{{$seller->name}}" href="javascript:;" data-id="{{Crypt::encryptString($seller->id)}}">Send enquiry</a>
						@else
							<a class=" btn-login-modal" href="javascript:;">Send enquiry</a>
						@endif
					</li>
					</ul>
				</div>
				@if(Auth::guard('web')->id())
					@include('front.seller.block_review_form')
				@endif
				<div class="reating-item">
					<div class="row">
						@if(!empty($active_reviews))
							@foreach($active_reviews as $key=>$review)
								@include('front.seller.block_review_details')
							@endforeach
							<a class="btn-view-all" href="{{route('all-reviews',$seller->slug)}}">View All</a>
						@else
							<div class="col-sm-12">
								<p>No reviews yet.</p>
							</div>
						@endif
					</div>
					
				</div>
				{{-- <div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.1772658432997!2d77.32881801454265!3d28.684343488486135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfbab40000001%3A0x52d294a1de5807af!2sFahama+Agriculture+Limited!5e0!3m2!1sen!2sin!4v1510057868188" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div> --}}
			</div>
			@if(!empty($featuredSellers))
			<div class="col-lg-3">
				<div class="side-bar">
					<h4>Sponsored</h4>
					<ul>
						@foreach($featuredSellers as $f_seller)
						<li>
							<a href="{{route('listing-details',$f_seller->slug)}}">
								<h5>{{$f_seller->name}}</h5>
								<span class="seller_showRating" data-rating="{{$f_seller->avg_rating}}"></span><span>(15)</span>
								<p>{{$f_seller->address1}}, {{$f_seller->address1}}, {{$f_seller->city->name}}, {{$f_seller->state->name}}, India</p>
								@if(Auth::guard('web')->id())
								<small>+91-{{$f_seller->phone_number}}</small>
								@endif
							</a>
						</li>
						@endforeach
					</ul>
				</div>			
			</div>
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  
	
</script>
@endsection