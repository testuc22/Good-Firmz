@extends('layouts.frontend-app')
@section('title', 'Sign-up')
@section('content')
	<!--Sign up Section Start-->
	<div class="sign-up-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sign-up-area">
						<form action="" autocomplete="off">

							<div class="row">
								<div class="col-6">
									<h4>
										<i class="fas fa-edit"></i> Login Information
									</h4>
									<div class="form-group">
										<label for="">Login E-mail : </label>
										<input type="text" name="email" class="form-control" value="" placeholder="Enter Your Email">
									</div>
									<div class="form-group">
										<label for="">Create Password : </label>
										<input type="password" name="password" class="form-control" value="" placeholder="Enter Your Password">
									</div>
									<div class="form-group">
										<label for="">Re-enter Password : </label>
										<input type="password" name="conf_password" class="form-control" value="" placeholder="Enter Your Password again">
									</div>
								</div>
								<div class="col-6">
									<h4>
										<i class="fas fa-id-card-alt"></i> Contact Information
									</h4>
									<div class="form-group">
										<label for="">Name : </label>
										<input type="text" name="contact-name" class="form-control" value="" placeholder="Enter Your Name">
									</div>
									<div class="form-group">
										<label for="">Mobile Number : </label>
										<input type="text" name="mobile" class="form-control" value="" placeholder="Enter Your Mobile Number">
									</div>
									<div class="form-group">
										<label for="">Website : </label>
										<input type="text" name="website" class="form-control" value="" placeholder="Enter Your Website Name">
									</div>
								</div>
							</div>

							<h4>
								<i class="fas fa-user"></i> Business Location & Profile
							</h4>

							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Name : </label>
										<input type="text" name="company-name" class="form-control" value="" placeholder="Enter Your Company Name">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Primary Business : </label>
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
								<div class="col-12">
									<div class="form-group">
										<label for="">Company Address : </label>
										<textarea name="company-address" rows="5" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-xl-12">
									<button class="btn btn-info">Create Account</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Sign up Section End-->
@endsection