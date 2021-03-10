@extends('layouts.frontend-app')
@section('title', 'Product Detail')
@section('content')
	<!--Dashboard Section Start-->
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
														<a href="" class="btn btn-info btn-sm">Send Enquiry</a>
														<a href="" class="btn btn-success btn-sm">whatsapp</a>
													</div>
												</div>
											</div>
										</div>	
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="product_info">
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
	<!--Dashboard Section End-->
@endsection