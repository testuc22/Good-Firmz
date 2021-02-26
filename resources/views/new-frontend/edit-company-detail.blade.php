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
								    <div class="card-header">
								    	Edit Company Detail
								    	<a href="{{ route('company-profile')}}" class="text-decoration-none btn btn-info btn-sm float-right">Back to Listing</a>
								    </div>
								    <div class="card-body">
								    	<form action="{{ route('update-company-info', ['id'=>$company->id]) }}" method="post">
								    		@method('PUT')
								    		@csrf
								            <div class="form-row">
								            	@if ($errors->has('company_name'))
								            		<p class="text-danger">{{$errors->first('company_name')}}</p>
								            	@endif
								                <div class="form-group col-md-12">
								                    <label for="">Company name</label>
								                    <input class="form-control" type="text" name="company_name" placeholder="Enter your Company name" value="{{$company->name}}">
								                </div>
								                @if ($errors->has('company_email'))
								                	<p class="text-danger">{{$errors->first('company_email')}}</p>
								                @endif
								                <div class="form-group col-md-12">
								                    <label for="">Company Email</label>
								                    <input class="form-control" type="Email" name="company_email" placeholder="Enter your Company Email" value="{{$company->email}}">
								                </div>
								            </div>
								            <div class="form-row">
								            	@if ($errors->has('company_number'))
								            		<p class="text-danger">{{$errors->first('company_number')}}</p>
								            	@endif
								                <div class="form-group col-md-12">
								                    <label for="">Company Number</label>
								                    <input class="form-control" type="text" name="company_number" placeholder="Enter your Company Number" value="{{$company->phone_number}}">
								                </div>
								                @if ($errors->has('business'))
								            		<p class="text-danger">{{$errors->first('business')}}</p>
								            	@endif
								                <div class="form-group col-md-12">
								                    <label for="">Company Business Type</label>
								                    <select name="business" class="form-control">
														<option value="">Select Primary Business</option>
														<option value="Manufacturers" 
													@if ($company->type == 'Manufacturers')
														{{'selected'}}
													@endif>
														Manufacturers
													</option>
													<option value="Exporters" 
													@if ($company->type == 'Exporters')
														{{'selected'}}
													@endif>
														Exporters
													</option>
													<option value="Wholeseller" 
													@if ($company->type == 'Wholeseller')
														{{'selected'}}
													@endif>Wholeseller</option>
													<option value="Retailer" 
													@if ($company->type == 'Retailer')
														{{'selected'}}
													@endif>Retailer</option>
													<option value="Trade" 
													@if ($company->type == 'Trade')
														{{'selected'}}
													@endif>Trade</option>
													<option value="Distribiutor" 
													@if ($company->type == 'Distribiutor')
														{{'selected'}}
													@endif>Distribiutor</option>
													<option value="Importers" 
													@if ($company->type == 'Importers')
														{{'selected'}}
													@endif>Importers</option>
													<option value="Buying House" 
													@if ($company->type == 'Buying House')
														{{'selected'}}
													@endif>Buying House</option>
													<option value="Service Provider" 
													@if ($company->type == 'Service Provider')
														{{'selected'}}
													@endif>Service Provider</option>
													</select>
								                </div>
								            </div>
								            <button class="btn btn-primary" type="submit">Save changes</button>
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
@section('page-script')
@endsection