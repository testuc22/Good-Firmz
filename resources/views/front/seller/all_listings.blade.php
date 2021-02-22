@extends('front.layouts.default')
@section('title')
B2B-Seeker - All Listings
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Listing</h2>
	</div>
</div>
<div class="listing-section">
	<div class="container">
		@if(!empty($parentCategories))
		<div class="row justify-content-lg-center">
			<div class="col-lg-10">
				<div class="listing-tab">
					<a class="left-arrow" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<ul>
						@foreach($parentCategories as $cat)
							<li>
								<a href="{{route('all-listings',$cat->slug)}}">
									{{$cat->name}}
								</a>
							</li>
						@endforeach
					</ul>
					<a class="right-arrow" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		@endif
		<div class="listing-content">
			<div class="row">
				@foreach($sellers as $seller)
					<div class="col-lg-6">
						@include('front.seller.block_seller_details')
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	/*var sellers = @json($sellers);
	sellers.forEach(function(seller){
        $(".showRating_"+seller.id).rating({
            value: seller.avg_rating,
            stars: 5,
            emptyStar: "fa fa-star-o",
            halfStar: "fa fa-star-half-o",
            filledStar: "fa fa-star",
            color: "#feaf17",
            half: true,
            readonly:true
        });
    })   */
</script>
@endsection