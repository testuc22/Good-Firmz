@extends('front.layouts.default')
@section('title')
Good Firmz - Reset Password
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
				{{ $status ?? ''}}
				<form class="register-form" method="POST" action="">
					{{@csrf_field()}}
					<input type="hidden" name="token" value="{{ $token }}">
					<input type="hidden" name="email" value="{{ $email }}">
					<input type="password" name="password" placeholder="New Password">
					<input type="password" name="password_confirmation" placeholder="Confirm New Password">
					<input class="btn-submit" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection