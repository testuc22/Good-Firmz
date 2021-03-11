@extends('layouts.frontend-app')
@section('title', 'Category Listing')
@section('content')
	<div class="category_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="category_area">
						@foreach ($categories as $category)
						<div class="card mb-4">
							<div class="card-header">{{$category->name}}</div>
							<div class="card-body">
								<div class="row">
									@foreach ($category->children as $child)
										<div class="col-xl-3">
											<div class="category">
												<a href="{{ route('products', ['slug'=>$child->slug]) }}" class="text-decoration-none text-center">
													<div class="img_area mb-1">
														<img src="{{ asset('public/category_images/'.$child->image) }}" class="align-self-start">
													</div>
													<h5>{{$child->name}}</h5>
												</a>
												{{--<div class="media">
													<div class="img_area">
														<img src="{{ asset('public/category_images/'.$child->image) }}" class="align-self-start">
													</div>
													@if (count($child->products) > 0)
														<div class="media-body">
														<ul>
														@foreach ($child->products as $product)
															<li>
																<a href="{{ route('cat-product', ['category'=>$child->slug, 'product'=>$product->slug]) }}">{{ucfirst($product->name)}}</a>
															</li>
														@endforeach
														</ul>
														</div>
													@endif
												</div>	--}}
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection