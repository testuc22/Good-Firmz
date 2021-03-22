@extends('layouts.frontend-app')
@section('title', 'Category List')
@section('content')
	<div class="category_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="category_area">
						<div class="card">
							<div class="card-header">{{$category->name}}</div>
							<div class="card-body">
								<div class="row">
									@foreach ($category->children as $child)
										<div class="col-xl-4">
											<div class="category">
												<a href="{{ route('products', ['slug'=>$child->slug]) }}" class="text-decoration-none">
													<h5>{{$child->name}}</h5>
												</a>
												<div class="media">
													<div class="img_area">
														@if (empty($child->image))
															<img src="{{ asset('public/category_images/comming.jpg') }}" class="align-self-start" alt="...">
														@else
															<img src="{{ asset('public/category_images/'.$child->image) }}" class="align-self-start">
														@endif
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
												</div>	
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
@endsection