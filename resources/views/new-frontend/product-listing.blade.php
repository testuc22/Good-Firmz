@extends('layouts.frontend-app')
@section('title', 'Product Listing')
@section('content')
	<!--Product Listing Start-->
		<div class="dashboard_section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="dashboard_area">
							<div class="card">
								<div class="card-header">Product Listing:</div>
								<div class="card-body">
									<div class="row">
										@foreach ($categories as $category)
											@foreach ($category->product as $product)
												<div class="col-xl-6">
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
																{{\Illuminate\Support\Str::limit($product->desc, 150)}}
															</p>
															<ul>
																<li>
																	<a href="{{ route('product-detail', ['slug'=>$product->slug]) }}">View Product Detail</a>
																</li>
																<li>
																	<a href="#" data-toggle="tooltip" data-placement="bottom" title="{{$product->seller->address1}}">
																		<i class="fas fa-map-marker"></i> {{$product->seller->state->name}}
																	</a>
																</li>
															</ul>
														</div>
													</div>	
												</div>
											@endforeach
										@endforeach
									</div>
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
	<!--Product Listing Start-->
@endsection