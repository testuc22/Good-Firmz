@extends('layouts.frontend-app')
@section('title', 'Good Firmz')
@section('content')
	<!--Slider Section Start-->
	<div class="main_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="main_area">
						<div class="row">
							<div class="col-xl-3">
								<div class="category_area">
									<div class="title">
										<h4>
											<i class="fas fa-list"></i>browse Categories
										</h4>
									</div>
									<div class="menu">
										<ul>
											@foreach ($categories as $category)
												<li>
													<a href="">
														{{$category->name}}
														<i class="fas fa-angle-right"></i>
													</a>
													<div class="menu_box">
														@foreach ($category->allChildren as $child)
																<div class="column">
																	<a href="{{ route('category-detail', ['id'=>$category->id]) }}" class="h4">
																		{{\Illuminate\Support\Str::ucfirst($child->name)}}
																	</a>
																	<ul>
																	@include('new-frontend.includes.child-category', ['child' => $child])
																	</ul>
																</div>
														@endforeach
														@if (count($category->allChildren) > 5)
															<a href="{{ route('category-detail', ['id'=>$category->id]) }}" class="btn btn-info btn-sm text-decoration-none text-white">View More</a>
														@endif
													</div>	
												</li>
											@endforeach
										</ul>
									</div>	
								</div>
							</div>
							<div class="col-xl-9">
								<div class="slider_area">
									<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
									  <div class="carousel-inner">
									    <div class="carousel-item active">
									      <img src="{{ asset('public/frontend/img/slider1.jpg')}}" class="d-block w-100" alt="...">
									    </div>
									    <div class="carousel-item">
									      <img src="{{ asset('public/frontend/img/slider2.jpg')}}" class="d-block w-100" alt="...">
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
	<!--Slider Section End-->

	<!--Product Section Start-->
	@foreach ($featureCategories as $category)
		<div class="product_section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="product_area">
							<div class="title">
								<h5>
									{{$category->name}}:
								</h5>
								<div class="label"></div>
							</div>
							<div class="card">
								<div class="row no-gutters">
									<div class="col-xl-3">
										<div class="product_source">
											<a href="{{ route('category-detail', ['id'=>$category->id]) }}">
												<div class="img_area">
													<img src="{{ asset('public/category_images/'.$category->image) }}" alt="....">
												</div>
												<p>
													Browse All Electronics Product
												</p>
												<button>Source now</button>
											</a>
										</div>
									</div>
									<div class="col-xl-9">
										<div class="row no-gutters">
											@foreach ($category->allChildren as $child)
												@foreach ($child->allChildren as $child)
													<div class="col-xl-4">
														<div class="product_content">
															<a href="{{ route('products', ['slug'=>$child->slug])}}">
																@if (!empty($child->image))
																	<img src="{{ asset('public/category_images/'.$child->image) }}" alt="...">
																@endif
																<div class="desc">
																	<p>{{$child->name}}</p>
																</div>
															</a>
														</div>
													</div>
													{{--@foreach ($child->product as $product)
													@endforeach--}}
												@endforeach
											@endforeach
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	@endforeach
	<!--Product Section End-->

	<!--Product Section Start-->
	{{--<div class="product_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="product_area">
						<div class="title">
							<h5>
								Apperal:
							</h5>
							<div class="label"></div>
						</div>
						<div class="card">
							<div class="row no-gutters">
								<div class="col-xl-3">
									<div class="product_source">
										<a href="{{ route('products')}}">
											<div class="img_area">
												<img src="{{ asset('public/frontend/img/a.jpg') }}" alt="....">
											</div>
											<p>
												Browse All Apperal Product
											</p>
											<button>Source now</button>
										</a>
									</div>
								</div>
								<div class="col-xl-9">
									<div class="row no-gutters">
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/a2.webp') }}" alt="...">
													<div class="desc">
														<p>Children Clothing</p>
														<span><i class="fas fa-tag"></i>Apperal</span>
													</div>
												</a>
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
	</div>--}}
	<!--Product Section End-->

	<!--Product Section Start-->
	{{--<div class="product_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="product_area">
						<div class="title">
							<h5>
								VEHICLES & ACCESSORIES:
							</h5>
							<div class="label"></div>
						</div>
						<div class="card">
							<div class="row no-gutters">
								<div class="col-xl-3">
									<div class="product_source">
										<a href="{{ route('products')}}">
											<div class="img_area">
												<img src="{{ asset('public/frontend/img/v.png') }}" alt="....">
											</div>
											<p>
												Browse All Vehicals & Accessories Product
											</p>
											<button>Source now</button>
										</a>
									</div>
								</div>
								<div class="col-xl-9">
									<div class="row no-gutters">
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="product_content">
												<a href="{{ route('single-product') }}">
													<img src="{{ asset('public/frontend/img/v2.webp')}}" alt="...">
													<div class="desc">
														<p>Motorcycle Parts & Accessories</p>
														<span><i class="fas fa-tag"></i>Vehicals & Accessories</span>
													</div>
												</a>
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
	</div>--}}
	<!--Product Section End-->

	<!--Product Section Start-->
	<div class="product_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="product_area">
						<div class="title">
							<h5>
								Tranding Categories:
							</h5>
							<div class="label"></div>
						</div>
						<div class="owl_carousal_area">
							<div class="owl-carousel" id="category">
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c1.jpg') }}" alt="...">
									</div>
									<p>kitchen Appliances</p>
								</div>
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c2.jpg') }}" alt="...">
									</div>
									<p>Winter Clothing & Accessories</p>
								</div>
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c3.jpg') }}" alt="...">
									</div>
									<p>Sweets & Namkeen</p>
								</div>
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c4.jpg') }}" alt="...">
									</div>
									<p>Carpets & Rugs</p>
								</div>
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c5.jpg') }}" alt="...">
									</div>
									<p>Decorative Lights</p>
								</div>
								<div class="item">
									<div class="img_area">
										<img src="{{ asset('public/frontend/img/c6.jpg') }}" alt="...">
									</div>
									<p>Women Clothind</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Product Section End-->
@endsection