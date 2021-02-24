@extends('layouts.frontend-app')
@section('title', 'Login')
<style>
	.user_card {
		height: 400px;
		width: 350px;
		margin-top: auto;
		margin-bottom: auto;
		position: relative;
		display: flex;
		justify-content: center;
		flex-direction: column;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 5px;

	}
	.login_btn {
		width: 100%;
		background: #c0392b !important;
		color: white !important;
	}
	.login_btn:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.login_container {
		padding: 0 2rem;
	}
	.input-group-text {
		background: #c0392b !important;
		color: white !important;
		border: 0 !important;
		border-radius: 0.25rem 0 0 0.25rem !important;
	}
	.input_user,
	.input_pass:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
		background-color: #c0392b !important;
	}
</style>
@section('content')
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				@if(session()->has('success'))
				    <div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
				        {{ session()->get('success') }}
				    </div>
				@endif
				@if(session()->has('danger'))
				    <div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
				        {{ session()->get('danger') }}
				    </div>
				@endif
				<div class="d-flex justify-content-center form_container">
					<form action="{{ route('check-login') }}" method="post">
						@method('POST')
						@csrf
						@if ($errors->has('email'))
							<p class="text-danger">{{$errors->first('email')}}</p>
						@endif
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="username">
						</div>
						@if ($errors->has('password'))
							<p class="text-danger">{{$errors->first('password')}}</p>
						@endif
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="form-check">
                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="1">

                               <label class="form-check-label" for="remember">
                                   {{ __('Remember Me') }}
                               </label>
                            </div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="{{ route('sign-up') }}" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="{{ route('forget-password') }}">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection