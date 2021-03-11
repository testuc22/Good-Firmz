@extends('layouts.frontend-app')
@section('title', 'Good Firmz')
@section('content')
	<!--Banner Section Start-->
	{{--<div class="banner_section" style="background-image: url({{ asset('images/banner.jpeg') }});">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-xl-6">
	                <div class="search_bar">
	                    <form class="search">
	                        <input type="text" placeholder="Search.." name="search">
	                        <button type="submit"><i class="fas fa-search"></i>Search</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>--}}
	<!--Banner Section End-->

	<!--Menu Section Start-->
	{{--<div class="menu_section">
	    <div class="container">
	        <div class="row">
	            <div class="col-xl-12">
	                <div class="menu_area">
	                    <ul>
	                        @foreach ($categories as $category)
	                            <li>
	                                <a href="{{ route('cat-slug', ['slug'=>$category->slug]) }}">
	                                    {{$category->name}}
	                                </a>
	                                <div class="mega_menu">
	                                    <ul>
	                                        @foreach ($category->children as $child)
	                                            <li>
	                                                <a href="{{ route('products', ['slug'=>$child->slug]) }}">{{$child->name}}</a>
	                                            </li>
	                                        @endforeach
	                                    </ul>
	                                </div>
	                            </li>
	                        @endforeach
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>--}}
	<!--Menu Section End-->
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
													<a href="{{ route('cat-slug', ['slug'=>$category->slug]) }}">
														{{$category->name}}
														<i class="fas fa-angle-right"></i>
													</a>
													<div class="menu_box">
														<ul>
														@foreach ($category->children as $child)
															<li>
																<a href="{{ route('products', ['slug'=>$child->slug]) }}">{{$child->name}}</a>
															</li>
														@endforeach
															@if (count($category->children) > 8)
																<li class="view">
																	<a href="{{ route('cat-slug', ['slug'=>$category->slug]) }}">View More</a>
																</li>
															@endif
														</ul>
													</div>	
												</li>
											@endforeach
											<li>
												<a href="{{ route('all-category') }}" class="text-danger">All Categories</a>
											</li>
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
													Browse All {{$category->name}}
												</p>
												<button>Source now</button>
											</a>
										</div>
									</div>
									<div class="col-xl-9">
										<div class="row no-gutters">
											@foreach ($category->children as $child)
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