@extends('layouts.frontend-app')
@section('title', 'Products')
@section('content')
	<!--Dashboard Section Start-->
	<div class="dashboard_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="dashboard_area">
						<div class="row">
							<div class="col-xl-3">
								<div class="card-title">Related Category</div>
								<ul class="list-group">
									@foreach ($childs as $child)
										<li class="list-group-item">
											<a href="{{ route('products', ['slug'=>$child->slug]) }}" class="text-secondary text-decoration-none">
												{{$child->name}}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
							<div class="col-xl-7">
								<div class="card-title">{{$category->name}} : Listing</div>
								@if (count($category->products) > 0)
								@foreach ($category->products as $product)
								<div class="card">
									<div class="card-body">
										<div class="row">
												<div class="col-xl-8">
													<div class="media">
														<div class="img_area">
															@if (!empty($product->images))
																<img src="{{ asset('public/uploads/products/'.$product->images->image) }}" alt="...">
															@else
																<img src="{{ asset('public/images/comming.jpg') }}" alt="...">
															@endif
														</div>
														<div class="media-body">
															<h4>{{$product->name}}</h4>
															<span>
																<i class="fas fa-rupee-sign"></i>{{$product->price}}
															</span>
															<p>
																{{\Illuminate\Support\Str::limit($product->desc, 50)}}
															</p>
															<ul>
																<li>
																	<a href="{{ route('product-detail', ['slug'=>$product->slug]) }}">View Product Detail</a>
																</li>
																{{--<li>
																	<a href="#" data-toggle="tooltip" data-placement="bottom" title="{{$product->seller->address1}}">
																		<i class="fas fa-map-marker"></i> {{$product->seller->state->name}}
																	</a>
																</li>--}}
															</ul>
														</div>
													</div>	
												</div>
												<div class="col-xl-4">
													<div class="company_info">
														<p><span>Company Name: </span>{{$product->seller->name}}</p>
														<button class="btn btn-sm" data-toggle="tooltip" data-placement="bottom" title="{{$product->seller->address1}}">
															<i class="fas fa-map-marker"></i> {{$product->seller->state->name}}
														</button>
													</div>
												</div>
											
										</div>
									</div>
									{{--<div class="card-footer">
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
									</div>--}}
								</div>
								@endforeach
								@else
									{{'There Is no Any Product Listing for '.$category->name.' Category'}}
								@endif			
							</div>
							<div class="col-xl-2">
								<div class="advertisement">
									<img src="https://tpc.googlesyndication.com/daca_images/simgad/9780942597491754707" alt="">
									<img src="https://s0.2mdn.net/9427301/22Jan_21-HDFCLife-C2PL-DBM-99.07Faith-Pros_200x200.jpg" alt="">
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