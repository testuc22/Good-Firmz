@extends('front.layouts.default')
@section('title')
B2B-Seeker - Login
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Login</h2>
	</div>
</div>
<div class="register-content">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-4 col-md-6">
				<div class="alert">
					{{ $status ?? ''}}
				</div>
				<form class="register-form" method="POST" action="{{route('send-reset-password-link')}}">
					{{@csrf_field()}}
					<input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
					@if($errors->has('email'))
                        @component('admin.components.error')
                            {{$errors->first('email')}}
                        @endcomponent
                    @endif
 
					<input class="btn-submit" type="submit" value="Submit">
					<p>Don’t have an account ? <a href="{{route('register')}}"> Register Now </a> </p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection