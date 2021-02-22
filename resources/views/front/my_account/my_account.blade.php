@extends('front.layouts.default')
@section('title')
B2B-Seeker - My Account
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>My Account</h2>
	</div>
</div>
<div class="my-account-content">
	<div class="container">
		<div class="row">
			@include('front.includes.sidebar')
			<div class="col-lg-4 col-md-6">
				<form method="POST" action="{{route('update-user')}}" class="updateUserForm">
					{{@csrf_field()}}
					
					<div class="my-account">
						<h3>My Account</h3>
						<input type="text" placeholder="First Name" name="first_name" value="{{$user->first_name}}" class="required">
						@if($errors->has('first_name'))
	                        @component('admin.components.error')
	                            {{$errors->first('first_name')}}
	                        @endcomponent
	                    @endif
						<input type="text" placeholder="Last Name"  name="last_name" value="{{$user->last_name}}"  class="required">
						@if($errors->has('last_name'))
	                        @component('admin.components.error')
	                            {{$errors->first('last_name')}}
	                        @endcomponent
	                    @endif
						<input type="email" placeholder="Email" name="email" value="{{$user->email}}"  class="required">
						@if($errors->has('email'))
	                        @component('admin.components.error')
	                            {{$errors->first('email')}}
	                        @endcomponent
	                    @endif
						<input type="phone" placeholder="Phone" name="phone_number" value="{{$user->phone_number}}"  class="required">
						@if($errors->has('phone_number'))
	                        @component('admin.components.error')
	                            {{$errors->first('phone_number')}}
	                        @endcomponent
	                    @endif
						<select name="state_id"  class="required">
							@foreach($allStates as $state)
								<option value="{{$state->id}}" @if($user->state_id && $user->state_id==$state->id) selected="" @endif>{{$state->name}}</option>
							@endforeach
						</select>
						@if($errors->has('state_id'))
	                        @component('admin.components.error')
	                            {{$errors->first('state_id')}}
	                        @endcomponent
	                    @endif
						<div class="checkbox-content">
								<div class="gray checkbox">
							  <input type="checkbox" value="1" id="customcb3" name="hide_search" @if($user->hide_search && $user->hide_search==1) checked="" @endif />
							  <label class="inner" for="customcb3"></label>
							  <label class="outer" for="customcb3"></label>							  
							</div>	
							<span>Hide my account from search results</span>				
						</div>
						<input  class="btn-update" type="submit" name="submit" value="Update Account">
					</div>
				</form>
			</div>
			<div class="col-lg-4 col-md-6">
				<form method="POST" action="{{route('update-password')}}">
					{{@csrf_field()}}
					<div class="my-account security-and-privacy">
						<h3>Security and Privacy</h3>
						<input type="password" placeholder="Old password" name="old_password">
						@if($errors->has('old_password'))
	                        @component('admin.components.error')
	                            {{$errors->first('old_password')}}
	                        @endcomponent
	                    @endif
						<input type="password" placeholder="New password"  name="new_password">
						@if($errors->has('new_password'))
	                        @component('admin.components.error')
	                            {{$errors->first('new_password')}}
	                        @endcomponent
	                    @endif
						<input type="password" placeholder="Confirm password" name="new_password_confirmation">
						@if($errors->has('new_password_confirmation'))
	                        @component('admin.components.error')
	                            {{$errors->first('new_password_confirmation')}}
	                        @endcomponent
	                    @endif
						<input class="btn-update" type="submit" value="Update password">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script_variables')
<script type="text/javascript">
	var route_update_user = '{{route('update-user')}}'; 
</script>
@endsection