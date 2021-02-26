@extends('layouts.frontend-app')
@section('title', 'User Profile')
@section('content')
	<!--Dashboard Section Start-->
	<div class="dashboard_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="dashboard_area">
						<div class="row">
							<div class="col-xl-3">
								<div class="sidebar">
									<ul>
										<li>
											<a href="{{ route('user-dashboard') }}">Dashboard</a>
										</li>
										<li class="active">
											<a href="{{ route('user-profile') }}">Profile</a>
										</li>
										<li>
											<a href="{{ route('company-profile') }}">Company</a>
										</li>
										<li>
											<a href="{{ route('user-products') }}">Products</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-9">
								@if(session()->has('success'))
								    <div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
								        {{ session()->get('success') }}
								    </div>
								@endif
								@if (session('error'))
									<div class="alert alert-danger">{{ session('error') }}</div>
								@endif
								<div class="content_area">
									<div class="row">
			                            <div class="col-xl-6">
			                                <div class="card">
			                                	<div class="card-header">Change Password</div>
			                                    <div class="card-body">
			                                        <form action="{{ route('update-password', ['id'=>$user->id])}}" method="post">
			                                        	@method('PUT')
			                                        	@csrf
			                                            <div class="form-row">
			                                            	@if ($errors->has('old_password'))
			                                            		<p class="text-danger">{{$errors->first('old_password')}}</p>
			                                            	@endif
			                                                <div class="form-group col-md-12">
			                                                    <label for="">Old Password</label>
			                                                    <input class="form-control" type="password" name="old_password" placeholder="Enter Old Password" value="">
			                                                </div>
			                                                @if ($errors->has('password'))
			                                                	<p class="text-danger">{{$errors->first('password')}}</p>
			                                                @endif
			                                                <div class="form-group col-md-12">
			                                                    <label for="">New Password</label>
			                                                    <input class="form-control" type="password" name="password" placeholder="Enter your New Password" value="">
			                                                </div>
			                                            </div>
			                                            @if ($errors->has('password_confirmation'))
			                                            	<p class="text-danger">{{$errors->first('password_confirmation')}}</p>
			                                            @endif
			                                            <div class="form-group">
			                                                <label for="">Confirm Password</label>
			                                                <input class="form-control" type="password" name="password_confirmation" placeholder="Enter Password Again" value="">
			                                            </div>
			                                            <button class="btn btn-primary" type="submit">Password Update</button>
			                                        </form>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-xl-6">
			                                <div class="card mb-4">
			                                    <div class="card-header">Profile Details</div>
			                                    <div class="card-body">
			                                        <form action="{{ route('update-profile', ['id'=>$user->id]) }}" method="post">
			                                        	@method('PUT')
			                                        	@csrf
			                                            <div class="form-row">
			                                            	@if ($errors->has('fname'))
			                                            		<p class="text-danger">{{$errors->first('fname')}}</p>
			                                            	@endif
			                                                <div class="form-group col-12">
			                                                    <label for="">First name</label>
			                                                    <input class="form-control" type="text" name="fname" placeholder="Enter your first name" value="{{$user->first_name}}">
			                                                </div>
			                                                @if ($errors->has('lname'))
			                                                	<p class="text-danger">{{$errors->first('lname')}}</p>
			                                                @endif
			                                                <div class="form-group col-12">
			                                                    <label for="">Last name</label>
			                                                    <input class="form-control" type="text" name="lname" placeholder="Enter your last name" value="{{$user->last_name}}">
			                                                </div>
			                                            </div>
			                                            @if ($errors->has('mobile'))
			                                            	<p class="text-danger">{{$errors->first('mobile')}}</p>
			                                            @endif
			                                            <div class="form-row">
			                                                <div class="form-group col-12">
			                                                    <label for="">Phone Number</label>
			                                                    <input class="form-control" type="text" name="mobile" placeholder="Enter your organization name" value="{{$user->phone_number}}">
			                                                </div>
			                                                @if ($errors->has('website'))
			                                            		<p class="text-danger">{{$errors->first('website')}}</p>
			                                            	@endif
			                                                <div class="form-group col-12">
			                                                    <label for="">Website</label>
			                                                    <input class="form-control" type="text" name="website" placeholder="Enter your website" value="{{$user->website}}">
			                                                </div>
			                                            </div>
			                                            @if ($errors->has('email'))
		                                            		<p class="text-danger">{{$errors->first('email')}}</p>
		                                            	@endif
			                                            <div class="form-group">
			                                                <label for="">Email address</label>
			                                                <input class="form-control" type="email" name="email" placeholder="Enter your email address" value="{{$user->email}}">
			                                            </div>
			                                            <button class="btn btn-primary" type="submit">Profile Update</button>
			                                        </form>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Dashboard Section End-->
@endsection