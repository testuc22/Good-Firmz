@extends('front.layouts.default')
@section('title')
B2B-Seeker - User registration
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Register</h2>
	</div>
</div>
<div class="register-content">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-4 col-md-6">
				<form class="register-form" action="{{route("register-user")}}" method="POST">
					{{@csrf_field()}}
					<input type="text" placeholder="First Name" name="first_name" value="{{old('first_name')}}">
					@if($errors->has('first_name'))
                        @component('admin.components.error')
                            {{$errors->first('first_name')}}
                        @endcomponent
                    @endif
					<input type="text" placeholder="Last Name" name="last_name" value="{{old('last_name')}}">
					@if($errors->has('last_name'))
                        @component('admin.components.error')
                            {{$errors->first('last_name')}}
                        @endcomponent
                    @endif
					<input type="Email" placeholder="Email" name="email" value="{{old('email')}}">
					@if($errors->has('email'))
                        @component('admin.components.error')
                            {{$errors->first('email')}}
                        @endcomponent
                    @endif
					<input type="Tel" placeholder="Phone"  name="phone_number" value="{{old('phone_number')}}">
					@if($errors->has('phone_number'))
                        @component('admin.components.error')
                            {{$errors->first('phone_number')}}
                        @endcomponent
                    @endif
					<input type="Password" placeholder="Password" name="password">
					@if($errors->has('password'))
                        @component('admin.components.error')
                            {{$errors->first('password')}}
                        @endcomponent
                    @endif
					<input type="Password" placeholder="Confirm Password"  name="password_confirmation">
					@if($errors->has('password_confirmation'))
                        @component('admin.components.error')
                            {{$errors->first('password_confirmation')}}
                        @endcomponent
                    @endif
					<input type="submit" name="submit" value="Submit">
					<p>Already Registered ? <a href="{{route('login')}}">Login Now</a> </p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection