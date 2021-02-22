@extends('front.layouts.default')
@section('title')
B2B-Seeker - {{$page->title}}
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>{{$page->title}}</h2>
	</div>
</div>
<div class="About-us-content">
	<div class="container">		
		{!!$page->description!!}
	</div>
</div>
@endsection