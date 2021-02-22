<div class="col-sm-12">
	<div class="reating-inner-item">
		<div class="row">
			<div class="col-sm-6 col-6">
				<span class="seller_showRating" data-rating="{{$review->stars}}"></span>
				<span>({{$review->stars}}/5)</span>
			</div>
			<div class="col-sm-6 col-6">
				<span class="date-content">{{$review->user->created_at->format('d F, Y')}}</span>
			</div>
		</div>
		<h5>{{$review->name}}</h5>
		<p>{{$review->review}}</p>
	</div>
</div>