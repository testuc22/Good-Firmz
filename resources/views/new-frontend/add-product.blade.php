@extends('layouts.frontend-app')
@section('title', 'Company Profile')
@section('content')
	<div class="product_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="product_area">
						<div class="card">
							<div class="card-header">Add Business Product</div>
							<div class="card-body">
								<form action="">
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">Business Type</label>
												<select name="type" class="form-control">
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
										<div class="col-4">
											<div class="form-group">
												<label for="">Company Name</label>
												<input type="text" name="company_name" class="form-control" value="" placeholder="Company Name">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">Company Email</label>
												<input type="text" name="company_email" class="form-control" value="" placeholder="Company Email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">Company Number</label>
												<input type="text" name="company_number" class="form-control" value="" placeholder="Company Contact Number">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">Product Name</label>
												<input type="text" name="product_name" class="form-control" value="" placeholder="Product Name Here">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">Product Category</label>
												<select name="product_cat" class="form-control">
													<option value="">Select Product Category</option>
													<option value="1">Home Supplies</option>
													<option value="1">Home Supplies</option>
													<option value="1">Home Supplies</option>
													<option value="1">Home Supplies</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="">Upload Product Images</label>
												<div class="dropzone clsbox" id="mydropzone">

												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">City</label>
												<select name="city" class="form-control">
													<option value="">Select City</option>
												</select>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">State</label>
												<select name="state" class="form-control">
													<option value="">Select State</option>
												</select>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">Zip Code</label>
												<input type="text" class="form-control" value="" placeholder="Enter Zip Code">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="">Product Description</label>
												<textarea name="product_desc" rows="5" class="form-control"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-5">
											<div class="form-group">
												<label for="">Product Key</label>
												<input type="text" name="key[]" class="form-control" value="" placeholder="Enter Product Key">
											</div>
										</div>
										<div class="col-5">
											<div class="form-group">
												<label for="">Product Value</label>
												<input type="text" name="value[]" class="form-control" value="" placeholder="Enter Product Value">
											</div>
										</div>
										<div class="col-2">
											<div class="form-group">
												<button type="button" class="btn btn-primary" style="margin-top: 32px;" onclick="education_fields();">
													<i class="fas fa-plus mr-1"></i>Add Fields
												</button>
											</div>
										</div>
									</div>
									<div id="education_fields">
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group" style="text-align: center;">
												<button class="btn btn-info">Add Products</button>
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
@endsection