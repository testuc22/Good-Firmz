@extends('layouts.frontend-app')
@section('title', 'Contact us')
@section('content')

	<!--Breadcrumb Secton Start-->
	<div class="breadcrumb_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb_area">
						<h3>Feedback</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Breadcrumb Secton End-->

	<!--Feedback Section Start-->
	<div class="feedback_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-8">
					<div class="feedback_area">
						<div class="card">
							<div class="card-header">Good Firmz Feedback Form</div>
							<div class="card-body">
								<form action="">
									<div class="row">
										<div class="col-xl-12">
											<div class="form-group">
												<select class="form-control" name="feedbackType">
													<option value="">-----Select Feedback Type *-----</option><option value="1">Suggestions</option>
													<option value="2">Appreciation</option>
													<option value="3">Bug / Error Report</option>
													<option value="4">Purchase Requirement</option>
													<option value="5">Complaint</option>
													<option value="6">Interested in Services</option>
													<option value="0">Other</option>
												</select>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-group">
												<textarea name="msg" rows="5" class="form-control" placeholder="Write Your Feedback"></textarea>
											</div>
										</div>
										<div class="col-xl-12">
											<label for="">
												<p>Your Contact Info</p>
											</label>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input type="text" name="email" class="form-control" placeholder="Email-Id">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input type="text" name="company_name" class="form-control" placeholder="Your Company Name (optional)">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Your Full Name">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<select name="country" class="form-control">
													<option value="">Select Your Country</option>
													<option value="">India</option>
												</select>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input type="text" name="phone" class="form-control" placeholder="Your Phone Number">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input type="text" name="city" class="form-control" placeholder="Your City Name">
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-group" style="text-align: center;">
												<button class="btn btn-info btn-sm">Submit</button>
											</div>
										</div>
									</div>
								</form>	
							</div>
						</div>		
					</div>
				</div>
				<div class="col-xl-4">
					<div class="right_side">
						<div class="card">
							<div class="card-body">
								<p>
									<i class="fas fa-quote-left"></i>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nisi laboriosam officiis, provident ea, voluptatem. Odit libero eaque quia consequatur placeat expedita voluptas saepe, sapiente deserunt earum aliquid harum architecto.<i class="fas fa-quote-right"></i>
								</p>
								<h5>Customer Name</h5>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<p>
									<i class="fas fa-quote-left"></i>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nisi laboriosam officiis, provident ea, voluptatem. Odit libero eaque quia consequatur placeat expedita voluptas saepe, sapiente deserunt earum aliquid harum architecto.<i class="fas fa-quote-right"></i>
								</p>
								<h5>Customer Name</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Feedback Section End-->


@endsection