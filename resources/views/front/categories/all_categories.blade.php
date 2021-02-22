@extends('front.layouts.default')
@section('title')
B2B-Seeker - Categories
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>categories</h2>
	</div>
</div>

<div class="popular-categories categories">
	<div class="container">
		@foreach($categories as $cat)		
		<div class="popular-categories-item ">
			<a href="#">
				@if($cat->image)
					<img src="{{ asset(Storage::url('category_images/'.$cat->image)) }}">
				@else
					<img src="{{asset('front/images/popular-img1.png')}}">
				@endif
			</a>
			<h4>{{$cat->name}}</h4>
			{{-- <p>115 Rertaurants</p> --}}
		</div>	
		@endforeach		
	</div>
</div>
@endsection