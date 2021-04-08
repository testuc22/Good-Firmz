@extends('layouts.frontend-app')
@section('title', 'Sign-up')
@section('content')
	<!--Sign up Section Start-->
	<div class="sign-up-section pt-4 pb-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="sign-up-area p-4 border rounded shadow-lg">
						@if(session()->has('success'))
						    <div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>	
						        {{ session()->get('success') }}
						    </div>
						@endif
						<form action="{{ route('save-user') }}" method="post" autocomplete="off" />
							@csrf
							<div class="row justify-content-center">
								<div class="col-12">
									<h4>
										<i class="fas fa-id-card-alt"></i> Basic Information
									</h4>
									<div class="row">
										<div class="col-6">
											@if ($errors->has('fname'))
												<p class="text-danger">{{$errors->first('fname')}}</p>
											@endif
											<div class="form-group">
												<label for="">First Name : </label>
												<input type="text" name="fname" class="form-control" value="{{ old('fname') }}" placeholder="Enter Your First Name">
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('lname'))
												<p class="text-danger">{{$errors->first('lname')}}</p>
											@endif
											<div class="form-group">
												<label for="">Last Name : </label>
												<input type="text" name="lname" class="form-control" value="{{ old('lname') }}" placeholder="Enter Your Last Name">
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('email'))
												<p class="text-danger">{{$errors->first('email')}}</p>
											@endif
											<div class="form-group">
												<label for="">E-mail Address : </label>
												<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Your Email">
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('mobile'))
												<p class="text-danger">{{$errors->first('mobile')}}</p>
											@endif
											<div class="form-group">
												<label for="">Phone Number : </label>
												<input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="Enter Your Number">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12 mt-2">
									<div class="btn_area text-center">
										<button type="submit" class="btn btn-info btn-sm bg-danger">Create Account</button>
									</div>
								</div>
							</div>
							{{--
							<input type="checkbox" name="have_business" value="1"> Please check checkbox if you have business <br/>
							<br/>
							<h4>
								<i class="fas fa-user"></i> Business Location & Profile
							</h4>

							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Name : </label>
										<input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" placeholder="Enter Your Company Name">
										@if ($errors->has('company_name'))
											<p class="text-danger">{{$errors->first('company_name')}}</p>
										@endif
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Email : </label>
										<input type="text" name="company_email" class="form-control" value="{{ old('company_email') }}" placeholder="Enter Your Company Email">
										@if ($errors->has('company_email'))
											<p class="text-danger">{{$errors->first('company_email')}}</p>
										@endif
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Contact No : </label>
										<input type="text" name="company_number" class="form-control" value="{{ old('company_number') }}" placeholder="Enter Your Company Contact Number">
										@if ($errors->has('company_number'))
											<p class="text-danger">{{$errors->first('company_number')}}</p>
										@endif
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Primary Business : </label>
										<select name="business" class="form-control">
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
										@if ($errors->has('business'))
											<p class="text-danger">{{$errors->first('business')}}</p>
										@endif
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Address : </label>
										<textarea name="company_address" rows="5" class="form-control">{{ old('company_address') }}</textarea>
										@if ($errors->has('company_address'))
											<p class="text-danger">{{$errors->first('company_address')}}</p>
										@endif
									</div>
								</div>
								<div class="col-xl-12">
									<button class="btn btn-info">Create Account</button>
								</div>
							</div>--}}

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Sign up Section End-->
@endsection