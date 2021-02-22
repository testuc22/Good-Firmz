@extends('front.layouts.default')
@section('title')
B2B-Seeker - {{$seller->name}}
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
			<div class="col-lg-12">
				@if(Auth::guard('web')->id())
					@include('front.seller.block_review_form')
				@endif
				<div class="reating-item">
					<div class="row">
						@if(!empty($seller->reviews))
							@foreach($seller->reviews as $key=>$review)
								@include('front.seller.block_review_details')
							@endforeach
						@else
							<div class="col-sm-12">
								<p>No reviews yet.</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection