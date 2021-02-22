@extends('front.layouts.default')
@section('title')
B2B-Seeker - User registration
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>verify your email</h2>
	</div>
</div>
<div class="your-business">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<form class="otp-form" method="POST" action="{{route('check-user-otp')}}">
					{{@csrf_field()}}
					<input type="password" placeholder="Enter OTP" name="otp">
					@if($errors->has('otp'))
                        @component('admin.components.error')
                            {{$errors->first('otp')}}
                        @endcomponent
                    @endif
					<input type="submit" name="submit" value="Verify">
					<!-- <p>Company will publish on website in 72 hours after admin approval</p> -->
				</form>
			</div>
		</div>
	</div>
</div>
@endsection