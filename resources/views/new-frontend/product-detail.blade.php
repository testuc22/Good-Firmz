@extends('layouts.frontend-app')
@section('title', 'Product Detail')
@section('content')
	<!--Product Detail Page Section Start-->
	<div class="dashboard_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="dashboard_area">
						<div class="card">
							<div class="card-header">Product Detail:</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-12">
										<div class="media">
											<div class="row">
												<div class="col-xl-4">
													<div class="product_img_area">
														@if (!empty($product->images))
															<img src="{{ asset('public/uploads/products/'.$product->images->image) }}" alt="...">
														@else
															<img src="{{ asset('public/images/comming.jpg') }}" alt="coming soon....">
														@endif
													</div>
												</div>
												<div class="col-xl-8">
													<div class="media-body">
														<table class="table table-bordered">
															<tr>
																<td>Product Name</td>
																<td>{{$product->name}}</td>
															</tr>
															<tr>
																<td>Product Price</td>
																<td><i class="fas fa-rupee-sign"></i> {{$product->price}}</td>
															</tr>
															<tr>
																<td>Product Description</td>
																<td>{{$product->desc}}</td>
															</tr>
														</table>
														@if (Auth::check())
															<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#sendEnquiry">Send Enquiry</a>
															<a href="" class="btn btn-success btn-sm">whatsapp</a>
														@else
															<a href="{{ route('login')}}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Send Enquiry</a>
															<a href="{{ route('login')}}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">whatsapp</a>
														@endif
													</div>
												</div>
											</div>
										</div>	
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="product_info mt-4">
											<ul class="nav nav-tabs">
											  <li class="active"><a data-toggle="tab" href="#home" class="btn btn-info btn-sm mr-1 text-decoration-none">Company Info</a></li>
											  <li><a data-toggle="tab" href="#menu1" class="btn btn-info btn-sm text-decoration-none">Product Additional Detail</a></li>
											</ul>

											<div class="tab-content mt-4">
												<div id="home" class="tab-pane show fade in active">
													<table class="table table-bordered">
														<tr>
															<td>Company Name</td>
															<td>{{$product->seller->name}}</td>
														</tr>
														<tr>
															<td>Company Email</td>
															<td>{{$product->seller->email}}</td>
														</tr>
														<tr>
															<td>Company Number</td>
															<td>{{$product->seller->phone_number}}</td>
														</tr>
														<tr>
															<td>Address</td>
															<td>{{$product->seller->address1}}</td>
														</tr>
														<tr>
															<td>City</td>
															<td>{{$product->seller->city->name}}</td>
														</tr>
														<tr>
															<td>State</td>
															<td>{{$product->seller->state->name}}</td>
														</tr>
														<tr>
															<td>Zip Code</td>
															<td>{{$product->seller->pincode}}</td>
														</tr>
													</table>
												</div>
											  <div id="menu1" class="tab-pane fade">
											    <table class="table table-bordered">
											    	@foreach ($product->productMetas as $meta)
												    	@if ($meta->key == '' && $meta->value == '')
												    		<tr>
												    			<td colspan="2">No Any Additional Info</td>
												    		</tr>
												    	@else
												    		<tr>
												    			<td>{{$meta->key}}</td>
												    			<td>{{$meta->value}}</td>
												    		</tr>
												    	@endif
											    	@endforeach
											    </table>
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
	</div>
	<!--Product Detail Page Section End-->
	<!-- Login Request -->
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
	    	<div class="modal-header">
    	        <div class="brand_logo">
    	        	<i class="fas fa-hands-helping" style="font-size: 32px; color: #d32e35;"></i>
    	        	<span style="font-size: 18px; font-weight: bold; color: #555">Good Firmz</span>
    	        </div>
    	        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	    </div>
			<!-- Modal body -->
			<div class="modal-body">
				<p id="login_error" class="text-danger text-center"></p>
				<form id="loginRequest" method="post">
					@csrf
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="email" name="email" class="form-control input_user" value="" placeholder="Enter Your Email" required>
					</div>
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="password" name="password" class="form-control input_pass" value="" placeholder="Enter Your Password" required>
					</div>
					<div class="d-flex justify-content-center align-items-center mt-4">
				 		<button type="submit" name="button" class="btn btn-danger btn-sm">Login</button>
				 		<a href="{{ route('sign-up')}}" class="text-secondary text-decoration-none ml-2">Click Here For Sign up</a>
				   </div>
				</form>
			</div>
		</div>
	  </div>
	</div>
	<!-- Send Enquiry Request -->
	<div class="modal fade" id="sendEnquiry">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
			<span id="msg_success" class="text-success text-center"></span>
	    	<div class="modal-header">
    	        <p class="modal-title">Send Enquiry</p>
    	        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	    </div>
			<!-- Modal body -->
			<div class="modal-body">
				<form id="sendEnquiryform" method="post">
					@csrf
					<input type="hidden" id="pId" name="pID" value="{{$product->id}}">
					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<label for="">Name:</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
								<p id="name_error" class="text-danger"></p>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label for="">Email:</label>
								<input type="email" id="enquiry_email" name="email" class="form-control" placeholder="Your Email">
								<p id="email_error" class="text-danger"></p>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<label for="">Phone Number:</label>
								<input type="text" id="phone" name="phone" class="form-control" placeholder="Your Number">
								<p id="phone_error" class="text-danger"></p>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<p id="msg_error" class="text-danger"></p>
								<label for="">Message:</label>
								<textarea name="msg" id="msg" class="form-control" cols="30" rows="5" placeholder="Your Message"></textarea>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-center">
				 		<button type="submit" name="button" class="btn btn-danger btn-sm">SEND ENQUIRY</button>
				   </div>
				</form>
			</div>
		</div>
	  </div>
	</div>
@endsection
@section('scripts')
	<script>
		$(document).ready(function() {
			$('#loginRequest').on('submit', function(e) {
				e.preventDefault();
				var formData = {
				    email: $('#email').val(),
				    password: $('#password').val(),
				}
				$.ajax({
			        type: "post",
			        url: '{{ route('check-login') }}',
			        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
			        data: formData,
			        success: function (data) {
			           	console.log(data.error);
			        	if($.isEmptyObject(data.error)){
	                        location.reload()
	                    }else{
	                    	$('#login_error').html(data.error);
	                    }
			        },
			        error: function (data) {
			        	console.log(data)
			        }
			    });
			});

		})
		$('#sendEnquiryform').on('submit', function(e) {
			e.preventDefault();
			var name = $('#name').val();
			var email = $('#enquiry_email').val();
			var phone = $('#phone').val();
			var msg = $('#msg').val();
			var p_id = $('#pId').val();
			$.ajax({
		        type: "post",
		        url: "{{ route('send-enquiry') }}",
		        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
		        data: {name:name, email:email, phone:phone, msg:msg, p_id:p_id},
		        success: function (data) {
		           	$.each( data.errors, function( key, value ) {
       	            	var aa = key.concat('_error');
       	                $('#'+aa).html(value);
       	            });
		        	if(data.success == true){
                    	$('#msg_success').html(data.msg);
                    	$('#sendEnquiryform').trigger("reset");
                    }
		        },
		        error: function (data) {
		        	console.log(data)
		        }
		    });
		})
	</script>
@endsection