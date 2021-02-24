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
								<div class="content_area">
									<div class="row">
			                            <div class="col-xl-4">
			                                <!-- Profile picture card-->
			                                <div class="card">
			                                    <div class="card-header">Profile Picture</div>
			                                    <div class="card-body text-center">
			                                        <!-- Profile picture image-->
			                                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('public/images/default-seller-logo.jpg') }}" alt="">
			                                        <!-- Profile picture help block-->
			                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
			                                        <!-- Profile picture upload button-->
			                                        <button class="btn btn-primary" type="button">Upload new image</button>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-xl-8">
			                                <!-- Account details card-->
			                                <div class="card mb-4">
			                                    <div class="card-header">Profile Details</div>
			                                    <div class="card-body">
			                                        <form>
			                                            <!-- Form Row-->
			                                            <div class="form-row">
			                                                <!-- Form Group (first name)-->
			                                                <div class="form-group col-md-6">
			                                                    <label for="">First name</label>
			                                                    <input class="form-control" type="text" placeholder="Enter your first name" value="">
			                                                </div>
			                                                <!-- Form Group (last name)-->
			                                                <div class="form-group col-md-6">
			                                                    <label for="">Last name</label>
			                                                    <input class="form-control" type="text" placeholder="Enter your last name" value="">
			                                                </div>
			                                            </div>
			                                            <!-- Form Row        -->
			                                            <div class="form-row">
			                                                <!-- Form Group (organization name)-->
			                                                <div class="form-group col-md-6">
			                                                    <label for="">Phone Number</label>
			                                                    <input class="form-control" type="text" placeholder="Enter your organization name" value="">
			                                                </div>
			                                                <!-- Form Group (location)-->
			                                                <div class="form-group col-md-6">
			                                                    <label for="">Website</label>
			                                                    <input class="form-control" type="text" placeholder="Enter your website" value="">
			                                                </div>
			                                            </div>
			                                            <!-- Form Group (email address)-->
			                                            <div class="form-group">
			                                                <label for="">Email address</label>
			                                                <input class="form-control" type="email" placeholder="Enter your email address" value="">
			                                            </div>
			                                            <!-- Save changes button-->
			                                            <button class="btn btn-primary" type="button">Save changes</button>
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