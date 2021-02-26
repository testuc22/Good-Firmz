@extends('layouts.frontend-app')
@section('title', 'User Products')
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
										<li>
											<a href="{{ route('company-profile') }}">Company</a>
										</li>
										<li class="active">
											<a href="{{ route('user-products') }}">Products</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-9">
								@if(session()->has('success'))
								    <div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
								        {{ session()->get('success') }}
								    </div>
								@endif
								<div class="card">
									<div class="card-header">Product Listing</div>
									<div class="card-body">
										@if (!empty($products))
											@foreach ($products as $product)
												<div class="media">
													<div class="img_area">
														<img src="{{ asset('public/uploads/products/'.$product->images->image) }}" alt="...">
													</div>
													<div class="media-body">
														<h4>{{$product->name}}</h4>
														<span>
															<i class="fas fa-rupee-sign"></i>{{$product->price}} / Piece
														</span>
														<p>
															{{$product->desc}}
														</p>
														<ul>
															<li>
																<a href="{{ route('edit-product', ['id'=>$product->id]) }}">Edit Product</a>
															</li>
															<li>
																<a href="">View Product Detail</a>
															</li>
															<li>
																<a href="#" data-toggle="tooltip" data-placement="bottom" title="{{$product->seller->address1}}">
																	<i class="fas fa-map-marker"></i>
																	{{$product->seller->state->name}}
																</a>
															</li>
														</ul>
													</div>
												</div>
											@endforeach
										@endif
									</div>
									<div class="card-footer">
										<nav aria-label="Page navigation example">
										  <ul class="pagination">
										    <li class="page-item">
										      <a class="page-link" href="#" aria-label="Previous">
										        <span aria-hidden="true">&laquo;</span>
										        <span class="sr-only">Previous</span>
										      </a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item"><a class="page-link" href="#">2</a></li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item">
										      <a class="page-link" href="#" aria-label="Next">
										        <span aria-hidden="true">&raquo;</span>
										        <span class="sr-only">Next</span>
										      </a>
										    </li>
										  </ul>
										</nav>
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