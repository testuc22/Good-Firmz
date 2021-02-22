@extends('layouts.frontend-app')
@section('title', 'Single-Product')
@section('content')
	<!--Single category Section Start-->
	<div class="single_category_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="single_category_area">
						<div class="row">
							<div class="col-xl-3">
								<div class="listing">
									<div class="card">
										<div class="card-header" data-toggle="collapse" data-target="#category-rel">
										   Related Category <i class="fas fa-angle-down float-right mt-1"></i>
										</div>
										<div id="category-rel" class="collapse show card-body">
											<ul>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card">
										<div class="card-header" data-toggle="collapse" data-target="#business-type">
										   Business Type <i class="fas fa-angle-down float-right mt-1"></i>
										</div>
										<div id="business-type" class="collapse show card-body">
											<ul>
												<li>
													<a href="">Manufacturers</a>
												</li>
												<li>
													<a href="">Exporters</a>
												</li>
												<li>
													<a href="">Wholesaler</a>
												</li>
												<li>
													<a href="">Handmade Flowers</a>
												</li>
												<li>
													<a href="">Retailer</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-9">
								<div class="product-listing">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/f.jpeg') }}" alt="">
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
										<button class="btn btn-success btn-sm">View Mobile</button>
										<button class="btn btn-info btn-sm">Send Enquiry</button>
									</div>
								</div>
								<div class="product-listing">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/f.jpeg') }}" alt="">
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
										<button class="btn btn-success btn-sm">View Mobile</button>
										<button class="btn btn-info btn-sm">Send Enquiry</button>
									</div>
								</div>	
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Single category Section End-->
@endsection