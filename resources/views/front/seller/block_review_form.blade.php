<form class="write-review" method="POST" action="{{route('submit-review')}}">
	{{@csrf_field()}}
	<h3>Write a Review</h3>
	<div class="reating-image write-review-content">
		<span class="sellerReviewStars" data-rating="0"></span>
		<span>(<div id="showSelectedCount">0</div>/5)</span>
	</div>
	@if($errors->has('stars'))
        @component('admin.components.error')
            {{$errors->first('stars')}}
        @endcomponent
    @endif
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="stars" id="sellerReviewStarsInput" value="{{old('stars')}}">
			<input type="hidden" name="seller_id" value="{{$seller->id}}">
			<textarea name="review" placeholder="Your review...." class="required">{{old('review')}}</textarea>
			@if($errors->has('review'))
                @component('admin.components.error')
                    {{$errors->first('review')}}
                @endcomponent
            @endif
		</div>
		<div class="col-lg-4 col-md-6">
			<input type="text" name="name" placeholder="Your Name"  class="required" value="{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name}}">
			@if($errors->has('name'))
                @component('admin.components.error')
                    {{$errors->first('name')}}
                @endcomponent
            @endif
		</div>
		<div class="col-lg-4 col-md-6">
			<input type="tel-no" name="phone_number" placeholder="Your Phone"  class="required" value="{{Auth::guard('web')->user()->phone_number}}">
			@if($errors->has('phone_number'))
                @component('admin.components.error')
                    {{$errors->first('phone_number')}}
                @endcomponent
            @endif
		</div>
		<div class="col-lg-4 col-md-6">
			<input type="Email" name="email" placeholder="Your Email Address"  class="required" value="{{Auth::guard('web')->user()->email}}">
			@if($errors->has('email'))
                @component('admin.components.error')
                    {{$errors->first('email')}}
                @endcomponent
            @endif
		</div>
		<div class="col-lg-4 col-md-6">
			<input class="btn-submit-review" type="submit" value="Submit Your Review">
		</div>
	</div>
</form>