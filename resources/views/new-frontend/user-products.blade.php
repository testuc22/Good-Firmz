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
								<div class="product-listing">
									<div class="img_area">
										<img src="img/f.jpeg" alt="...">
									</div>
									<div class="desc_area">
										<h4>Artificial Flowers</h4>
										<p>
											Price : <i class="fas fa-rupee"></i>500/ Piece(s)
										<p>
										<ul>
											<li>
												<span>Feature :</span> Dust Resistance, Easy Washable
										    </li>
											<li>
												<span>Finishing :</span> Coated, Non Coated
											</li>
											<li>
												<span>Type :</span> Artificial Flowers
											</li>
											<li>
												<span>Packaging Type :</span> Carton Box, Thermocol Box
											</li>
											<li>
												<span>Occasion :</span> Decoration, Hotel, Mall, Party
											</li>
											<li>
												<span>Material :</span> Plastic, PVC
											</li>
										</ul>
										<a href="">more</a>
									</div>	
									<div class="contact_info">
										<h4>Enterprise name</h4>
										<p>
											<i class="fas fa-map-marker"></i>Bairagarh,Bhopal
										</p>
										<button class="btn btn-success btn-sm">Edit Product</button>
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