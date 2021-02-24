@extends('layouts.frontend-app')
@section('title', 'Password Reset')
@section('content')
	<div class="register-content">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-6 col-md-6">
					<div class="card" style="margin: 50px 0px;">
						<div class="card-header">Password Reset</div>
						<div class="card-body">
							@if(session()->has('status'))
							    <div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
							        {{ session()->get('status') }}
							    </div>
							@endif
							<form class="register-form" method="POST" action="{{ route('password.update') }}">
								{{@csrf_field()}}
								<input type="hidden" name="token" value="{{ $token }}">
								<input type="hidden" name="email" value="{{ $email }}">
								<div class="form-group">
									@if ($errors->has('password'))
										<p class="text-danger">{{$errors->first('password')}}</p>
									@endif
									<label for="">New Password:</label>
									<input type="password" class="form-control" name="password" placeholder="New Password">
								</div>
								<div class="form-group">
									<label for="">Confirm Password:</label>
									<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password">
								</div>
								<button class="btn btn-info btn-sm" type="submit">Update Password</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection