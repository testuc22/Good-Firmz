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
								@if(session()->has('success'))
								    <div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
								        {{ session()->get('success') }}
								    </div>
								@endif
								<div class="card mb-4">
								    <div class="card-header">
								    	User Company Listing
								    	<a href="{{ route('add-business')}}" class="text-decoration-none btn btn-info btn-sm float-right">Add New Company</a>
								    </div>
								    <div class="card-body">
								    	<table class="table table-bordered">
								    		<thead>
								    			<tr>
								    				<th>Sr no.</th>
								    				<th>Company Name</th>
								    				<th>Business Type</th>
								    				<th>Company Email</th>
								    				<th>Action</th>
								    			</tr>
								    		</thead>
								    		<tbody>
								    			@foreach ($sellers as $key => $seller)
								    				<tr>
								    					<td>{{++$key}}</td>
								    					<td>{{$seller->name}}</td>
								    					<td>{{$seller->type}}</td>
								    					<td>{{$seller->email}}</td>
								    					<td width="120px">
								    						<a href="{{ route('company-detail', ['id'=>$seller->id])}}" class="btn btn-info btn-sm mb-1" style="display: block;">
								    							<i class="fas fa-edit"></i>Edit
								    						</a>
								    						<a href="{{ route('add-product', ['id'=>$seller->id]) }}" class="btn btn-success btn-sm mt-1" style="display: block;">Add Product
								    						</a>
								    					</td>
								    				</tr>
								    			@endforeach
								    		</tbody>
								    	</table>
								    	<div class="paginate">
								    		{{ $sellers->links('vendor.pagination.bootstrap-4') }}
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

	<!--Company Detail Modal Start-->
	<div class="modal fade" id="editCompany">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="card">
						<div class="card-header">Company Detail Edit</div>
						<div class="card-body" id="card-body">
							<!--<form>
					            <div class="form-row">
					                <div class="form-group col-md-6">
					                    <label for="">Company name</label>
					                    <input class="form-control" type="text" placeholder="Enter your first name" value="">
					                </div>
					                <div class="form-group col-md-6">
					                    <label for="">Company Email</label>
					                    <input class="form-control" type="text" placeholder="Enter your last name" value="">
					                </div>
					            </div>
					            <div class="form-row">
					                <div class="form-group col-md-6">
					                    <label for="">Company Number</label>
					                    <input class="form-control" type="text" placeholder="Enter your organization name" value="">
					                </div>
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
					            <button class="btn btn-primary" type="button">Save changes</button>
					        </form>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Company Detail Modal End-->

@endsection
@section('page-script')
@endsection