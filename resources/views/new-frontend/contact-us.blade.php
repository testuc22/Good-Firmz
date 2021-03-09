@extends('layouts.frontend-app')
@section('title', 'Contact us')
@section('content')

	<!--Breadcrumb Secton Start-->
	<div class="breadcrumb_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb_area">
						<h3>Contact us</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Breadcrumb Secton End-->

	<!--Contact Section Start-->
	<div class="contact_section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="contact_area">
						<div class="row">
							<div class="col-xl-5">
								<div class="left_side">
									<div class="box">
										<h5>GoodFirmz.com</h5>
										<p>
											GoodFirmz is  online B2B marketplace, connecting buyers with suppliers.the channel focuses on providing a platform to Small & Medium Enterprises  as well as individuals.
										</p>
									</div>
									<div class="box">
										<h5>For any assistance Email us at</h5>
										<p>
											<i class="fas fa-envelope-square"></i> <b>Email : </b> info@website.com
										</p>
									</div>
								</div>
							</div>
							<div class="col-xl-7">
								<div class="right_side">
									<div class="map_area">
										<div class="card">
											<div class="card-body">
												<form action="">
													<div class="row">
														<div class="col-6">
															<div class="form-group">
																<label for="">Name:</label>
																<input type="text" name="name" class="form-control" value="" placeholder="Enter Name here">
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label for="">Email:</label>
																<input type="text" name="email" class="form-control" value="" placeholder="Enter Email here">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="">Message</label>
																<textarea name="msg" class="form-control" rows="4"></textarea>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12">
															<button class="btn btn-info btn-sm">Submit</button>
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
		</div>
	</div>
	<!--Contact Section End-->



@endsection