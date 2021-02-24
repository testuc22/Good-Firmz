@extends('layouts.frontend-app')
@section('title', 'Company Profile')
@section('content')
		<div class="post_requirement_section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="rquirement_area">
							<div class="row">
								<div class="col-xl-8">
									<div class="left_side">
										<h5>
											Post You Requirement
										</h5>
										<p>Get Instant Quotes From Verified Suppliers</p>
										<form>
										  	<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Product / Service</label>
												<div class="col-sm-9">
													<input type="text" class="form-control"placeholder="Products / Services you are looking for">
												</div>
											</div>
										  	<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Quantity / Unit</label>
												<div class="col-sm-5">
													<input type="text" class="form-control"placeholder="Order Quantity">
												</div>
												<div class="col-sm-4">
													<select name=""class="form-control">
														<option value="">Select Unit Type</option>
														<option value="">Doozen</option>
														<option value="">Feet</option>
														<option value="">Kilogram</option>
														<option value="">Ton's</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control"placeholder="Enter Your Name">
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Mobile Number</label>
												<div class="col-sm-2">
													<input type="text" class="form-control" value="+91">
												</div>
												<div class="col-sm-7">
													<input type="text" class="form-control" placeholder="Enter Your Mobile Number">
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-9">
													<input type="text" class="form-control"placeholder="Enter Your Email">
												</div>
											</div>
											<div class="form-group">
												<button class="btn btn-info btn-sm">Submit</button>
											</div>
										</form>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="right_side">
										<h4>Buyers Benefits ? </h4>
										<ul>
											<li>
												<i class="far fa-address-card"></i>
												Get Instant Feedback from Suppliers.
											</li>
											<li>
												<i class="fas fa-user-check"></i>
												Accredited Suppliers that Meet Your Needs.
	                                        </li>
											<li>
												<i class="fas fa-star"></i>
												Get the power to choose the best!
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection