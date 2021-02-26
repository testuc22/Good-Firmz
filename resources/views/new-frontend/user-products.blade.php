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
								@if (!empty($products))
									@foreach ($products as $product)
										<div class="product-listing">
											<div class="img_area">
												<img src="{{ asset('public/uploads/products/'.$product->images->image) }}" alt="...">
											</div>
											<div class="desc_area">
												<h4>{{$product->name}}</h4>
												<p>
													Price : <i class="fas fa-rupee"></i>{{$product->price}}/ Piece(s)
												<p>
												<ul>
													@foreach ($product->productMetas as $meta)
														<li>
															<span>{{$meta->key}} : </span>{{$meta->value}}
														</li>
													@endforeach
												</ul>
												<a href="">more</a>
											</div>	
											<div class="contact_info">
												<h4>{{$product->seller->name}}</h4>
												<p>
													<i class="fas fa-map-marker"></i>{{$product->seller->address1}}
												</p>
												<a href="{{ route('edit-product', ['id'=>$product->id]) }}" class="btn btn-success btn-sm">Edit Product</a>
											</div>
										</div>
									@endforeach
								@else
									<div class="card">
										<div class="card-body">
											<p>You Have Not Listing Any Product</p>
										</div>
									</div>
								@endif
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Dashboard Section End-->
@endsection