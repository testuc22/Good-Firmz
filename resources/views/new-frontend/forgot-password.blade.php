@extends('layouts.frontend-app')
@section('title', 'Forgot Paaword')
@section('content')
	<div class="register-content">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-6 col-md-6">
					<div class="card" style="margin: 50px 0px;">
						<div class="card-header">Forgot Password</div>
						<div class="card-body">
							@if(session()->has('status'))
							    <div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
							        {{ session()->get('status') }}
							    </div>
							@endif
							<form class="register-form" method="POST" action="{{route('send-reset-password-link')}}">
								{{@csrf_field()}}
								<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
								@if($errors->has('email'))
			                        <p class="text-danger">{{$errors->first('email')}}</p>
			                    @endif
			 
								<button class="btn btn-info btn-sm mt-2" type="submit">Send Password Reset Link</button>
								<p class="mt-2">Don’t have an account ? <a href="{{route('sign-up')}}"> Register Now </a> </p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection