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
								    	User Company Listing
								    	<a href="{{ route('company-profile') }}" class="text-decoration-none btn btn-info btn-sm float-right">Back to Listing</a>
								    </div>
								    <div class="card-body">
								    	<form action="{{ route('save-company')}}" method="post" autocomplete="off" />
									    @csrf
									    <input type="hidden" name="user_id" value="{{$userId}}">
										<div class="row">
											<div class="col-6">
												@if ($errors->has('company_type'))
												    <p class="text-danger">{{$errors->first('company_type')}}</p>
												@endif
												<div class="form-group">
													<label for="">Company Business Type :</label>
													<select name="company_type" class="form-control">
														<option value="">Select Primary Business</option>
														<option value="Manufacturers">Manufacturers</option>
														<option value="Exporters">Exporters</option>
														<option value="Wholeseller">Wholeseller</option>
														<option value="Retailer">Retailer</option>
														<option value="Trade">Trade</option>
														<option value="Distribiutor">Distribiutor</option>
														<option value="Importers">Importers</option>
														<option value="Buying House">Buying House</option>
														<option value="Service Provider">Service Provider</option>
													</select>
												</div>
											</div>
											<div class="col-6">
												@if ($errors->has('company_name'))
												    <p class="text-danger">{{$errors->first('company_name')}}</p>
												@endif
												<div class="form-group">
													<label for="">Company Name :</label>
													<input type="text" name="company_name" class="form-control" value="" placeholder="Company Name">
												</div>
											</div>
											<div class="col-6">
												@if ($errors->has('company_email'))
												    <p class="text-danger">{{$errors->first('company_email')}}</p>
												@endif
												<div class="form-group">
													<label for="">Company Email :</label>
													<input type="text" name="company_email" class="form-control" value="" placeholder="Company Email">
												</div>
											</div>
											<div class="col-6">
												@if ($errors->has('company_number'))
												    <p class="text-danger">{{$errors->first('company_number')}}</p>
												@endif
												<div class="form-group">
													<label for="">Company Contact Number :</label>
													<input type="text" name="company_number" class="form-control" value="" placeholder="Company Contact Number">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												@if ($errors->has('address'))
												    <p class="text-danger">{{$errors->first('address')}}</p>
												@endif
												<div class="form-group">
													<label for="">Address :</label>
													<textarea name="address" class="form-control" cols="30" rows="2"></textarea>
												</div>
											</div>
											<div class="col-4">
												@if ($errors->has('city'))
												    <p class="text-danger">{{$errors->first('city')}}</p>
												@endif
												<div class="form-group">
													<label for="">City :</label>
													<select name="city" class="form-control">
														<option value="">Select City</option>
														@foreach ($cities as $city)
															<option value="{{$city->id}}">{{$city->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-4">
												@if ($errors->has('state'))
												    <p class="text-danger">{{$errors->first('state')}}</p>
												@endif
												<div class="form-group">
													<label for="">State :</label>
													<select name="state" class="form-control">
														<option value="">Select State</option>
													</select>
												</div>
											</div>
											<div class="col-4">
												@if ($errors->has('pincode'))
												    <p class="text-danger">{{$errors->first('pincode')}}</p>
												@endif
												<div class="form-group">
													<label for="">Zip Code :</label>
													<input type="text" name="pincode" class="form-control" value="" placeholder="Enter Zip Code">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group" style="text-align: center;">
													<button class="btn btn-danger btn-sm">Add Company</button>
												</div>
											</div>
										</div>
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $('select[name="city"]').on('change', function() {
                var cityId = $(this).val();
                var url = '{{ route('admin-city', ['id'=>':id'])}}';
                url = url.replace(':id', cityId);
                if (cityId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="state"]').empty();
                            $('select[name="state"]').append('<option value="'+ data.id +'">'+ data.name +'</option>');
                        }
                    });
                }else{
                     $('select[name="state"]').empty();
                }
            });
        });
    </script>
@endsection