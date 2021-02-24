@extends('layouts.frontend-app')
@section('title', 'User Dashboard')
@section('content')
	<!--Dashboard Section Start-->
	<div class="dashboard_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="dashboard_area">
						@if(session()->has('success'))
						    <div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>	
						        {{ session()->get('success') }}
						    </div>
						@endif
						<div class="row">
							<div class="col-xl-3">
								<div class="sidebar">
									<ul>
										<li class="active">
											<a href="{{ route('user-dashboard') }}">Dashboard</a>
										</li>
										<li>
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
									<!-- Content Row -->
									<div class="row">
										<div class="col-xl-6 col-md-6 mb-4">
									        <div class="card border-left-primary shadow h-100 py-2">
									            <div class="card-body">
									                <div class="row no-gutters align-items-center">
									                    <div class="col mr-2">
									                        <div class="text-xs">
									                            Earnings (Monthly)</div>
									                        <div class="h5 mb-0 ">$40,000</div>
									                    </div>
									                    <div class="col-auto">
									                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
								    	<div class="col-xl-6 col-md-6 mb-4">
								            <div class="card border-left-primary shadow h-100 py-2">
								                <div class="card-body">
								                    <div class="row no-gutters align-items-center">
								                        <div class="col mr-2">
								                            <div class="text-xs">
								                                Earnings (Monthly)</div>
								                            <div class="h5 mb-0 ">$40,000</div>
								                        </div>
								                        <div class="col-auto">
								                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </div>
							        	<div class="col-xl-6 col-md-6 mb-4">
							                <div class="card border-left-primary shadow h-100 py-2">
							                    <div class="card-body">
							                        <div class="row no-gutters align-items-center">
							                            <div class="col mr-2">
							                                <div class="text-xs">
							                                    Earnings (Monthly)</div>
							                                <div class="h5 mb-0 ">$40,000</div>
							                            </div>
							                            <div class="col-auto">
							                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>
							            <div class="col-xl-6 col-md-6 mb-4">
									        <div class="card border-left-primary shadow h-100 py-2">
									            <div class="card-body">
									                <div class="row no-gutters align-items-center">
									                    <div class="col mr-2">
									                        <div class="text-xs">
									                            Earnings (Monthly)</div>
									                        <div class="h5 mb-0 ">$40,000</div>
									                    </div>
									                    <div class="col-auto">
									                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
		</div>
	</div>
	<!--Dashboard Section End-->
@endsection