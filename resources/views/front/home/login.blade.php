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
				<form class="register-form" method="POST" action="{{route('check-login')}}">
					{{@csrf_field()}}
					<input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
					@if($errors->has('email'))
                        @component('admin.components.error')
                            {{$errors->first('email')}}
                        @endcomponent
                    @endif
					<input type="password" placeholder="Password" name="password">
					@if($errors->has('password'))
                        @component('admin.components.error')
                            {{$errors->first('password')}}
                        @endcomponent
                    @endif
					<div class="row">
						<div class="col-sm-6 col-6">
							<div class="checkbox-content">
	  							<div class="gray checkbox">
								  <input type="checkbox" value="1" id="customcb1" name="remember" />
								  <label class="inner" for="customcb1"></label>
								</div>	
								<span>Remember me</span>				
  							</div>
						</div>
						<div class="col-sm-6 col-6">
							<div class="forgot-item">
								<a href="{{route('forget-password')}}">Forgot Password?</a>
							</div>
						</div>
					</div>
 
					<input class="btn-submit" type="submit" value="Submit">
					<p>Don’t have an account ? <a href="{{route('register')}}"> Register Now </a> </p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection