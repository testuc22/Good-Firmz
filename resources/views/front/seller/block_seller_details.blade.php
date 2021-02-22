<div class="company-name">
	<h3><a href="{{route('listing-details',$seller->slug)}}">{{$seller->name}}</a></h3>
	<div class="rating-content">
		<!-- <img src="images/star.png"> -->
		<span class="seller_showRating" data-rating={{$seller->avg_rating}}></span>
		<span>({{count($seller->reviews)}})</span>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="company-item">
			<p>{{$seller->desc}}</p>
			<ul>
				@if($seller->categories)
				<li class="seller-cat">
					<img src="{{asset('front/images/icon-img.png')}}">
					@foreach($seller->categories as $cat)
						<span>{{$cat->name}}</span>
					@endforeach
				</li>
				@endif
				<li>
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span>{{$seller->address1}}, {{$seller->address2}}, {{$seller->city->name}}, {{$seller->state->name}}, India</span>
				</li>
				@if(Auth::guard('web')->id())
				<li><i class="fa fa-phone" aria-hidden="true"></i> <span>+91-{{$seller->phone_number}}</span></li>
				@endif
			</ul>
			</div>
		</div>
		<div class="col-md-4">
			<div class="company-enquiry">
				<ul>
					@if(Auth::guard('web')->id())
						<li><a href="mailto:{{$seller->email}}"><i class="fa fa-envelope" aria-hidden="true"></i> email</a></li>

						@if($seller->website)
							<li>
								<a href="{{$seller->website}}" target="_blank">
									<i class="fa fa-globe" aria-hidden="true"></i> Website
								</a>
							</li>
						@endif
					@endif

					<li>
						@if(Auth::guard('web')->id())
							<a class="send-enquiry btn-send-enquiry" data-title="{{$seller->name}}" href="javascript:;" data-id="{{Crypt::encryptString($seller->id)}}">Send enquiry</a>
						@else
							<a class="send-enquiry btn-login-modal" href="javascript:;">Send enquiry</a>
						@endif
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>