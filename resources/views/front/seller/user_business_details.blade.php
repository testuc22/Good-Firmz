@extends('front.layouts.default')
@section('title')
B2B-Seeker - My Account
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>My Account</h2>
	</div>
</div>
<div class="my-account-content">
	<div class="container">
		<div class="row">
			@include('front.includes.sidebar')
			<div class="col-lg-8 col-md-6">
				<div class="my-account">
					@if(count($user->sellers))
						<div class="list-business-details">
							@foreach($user->sellers as $seller)
								<div class="business_detail_wrapper">
									<div class="row">
										<div class="col-lg-3 col-md-4">
											<a href="#">
												@if($seller->logo)
			                                        <img src="{{ asset(Storage::url('seller_logo/'.$seller->logo)) }}">
			                                    @else
			                                    	<img src="{{asset('images/default-seller-logo.jpg') }}">
			                                    @endif
											</a>
										</div>
										<div class="col-lg-9">
											<div class="business_info">
												<div class="row business_head">
													<div class="col-lg-5 col-md-12">
														<h3>{{$seller->name}}</h3>
														<div class="business_rating">
															<span class="seller_showRating" data-rating="{{$seller->avg_rating}}"></span>
															<span>({{count($seller->reviews)}})</span>
															
														</div>
													</div>
													<div class="col-lg-7 col-md-12">
														<div class="business_btn">
															<a href="{{route('edit-business',$seller->slug)}}" class="edit_btn">edit</a>
															<a href="{{route('remove-business',$seller->slug)}}" class="edit_btn"  onclick="return confirm('Are you sure, you want to remove this?');">remove</a>
														</div>
													</div>
												</div>
												<p>{{$seller->desc}}</p>
											</div>
										</div>
									</div>
									<ul class="business_social_info">
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
										<li>
											<i class="fa fa-phone" aria-hidden="true"></i>
											<strong>Phone:</strong><p>&nbsp;&nbsp; +91-{{$seller->phone_number}}</p>
											<strong>Email:</strong><p> &nbsp;&nbsp;{{$seller->email}}</p>
										</li>
									</ul>
								</div>
							@endforeach
						</div>
					@else
						<div class="add-business-details">
							<a href="{{route('list-your-business')}}" class="btn-business">List Your Business</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection