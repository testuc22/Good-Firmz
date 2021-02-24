@extends('layouts.frontend-app')
@section('title', 'Company Profile')
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
										<li>
											<a href="{{ route('user-profile') }}">Profile</a>
										</li>
										<li class="active">
											<a href="{{ route('company-profile') }}">Company</a>
										</li>
										<li>
											<a href="{{ route('user-products') }}">Products</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-9">
								<div class="card mb-4">
								    <div class="card-header">Company Details</div>
								    <div class="card-body">
								        <form>
								            <!-- Form Row-->
								            <div class="form-row">
								                <!-- Form Group (first name)-->
								                <div class="form-group col-md-6">
								                    <label for="">Company name</label>
								                    <input class="form-control" type="text" placeholder="Enter your first name" value="">
								                </div>
								                <!-- Form Group (last name)-->
								                <div class="form-group col-md-6">
								                    <label for="">Company Email</label>
								                    <input class="form-control" type="text" placeholder="Enter your last name" value="">
								                </div>
								            </div>
								            <!-- Form Row        -->
								            <div class="form-row">
								                <!-- Form Group (organization name)-->
								                <div class="form-group col-md-6">
								                    <label for="">Company Number</label>
								                    <input class="form-control" type="text" placeholder="Enter your organization name" value="">
								                </div>
								                <!-- Form Group (location)-->
								                <div class="form-group col-md-6">
								                    <label for="">Company Business Type</label>
								                    <select name="business" class="form-control">
														<option value="">Select Primary Business</option>
														<option value="">Manufacturers</option>
														<option value="">Exporters</option>
														<option value="">Wholeseller</option>
														<option value="">Retailer</option>
														<option value="">Trade</option>
														<option value="">Distribiutor</option>
														<option value="">Importers</option>
														<option value="">Buying House</option>
														<option value="">Service Provider</option>
													</select>
								                </div>
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
	<!--Dashboard Section End-->
@endsection