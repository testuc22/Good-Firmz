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
															@foreach ($product->productMetas as $meta)
																<tr>
																	<td>{{$meta->key}}</td>
																	<td>{{$meta->value}}</td>
																</tr>
															@endforeach
															<tr>
																<td>Product Description</td>
																<td>{{$product->desc}}</td>
															</tr>
															<tr>
																<td>Location</td>
																<td>{{$product->seller->address1}},{{$product->seller->state->name}}</td>
															</tr>
															<tr>
																<td>
																	<a href="" class="btn btn-info btn-sm">Send Enquiry</a>
																</td>
																<td>
																	<a href="" class="btn btn-success btn-sm">whatsapp</a>
																</td>
															</tr>
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
	</div>
	<!--Dashboard Section End-->
@endsection