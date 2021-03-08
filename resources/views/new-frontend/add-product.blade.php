@extends('layouts.frontend-app')
@section('title', 'Company Profile')
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
										<li class="active">
											<a href="{{ route('company-profile') }}">Company</a>
										</li>
										<li>
											<a href="{{ route('user-products') }}">Products</a>
										</li>
									</ul>
								</div>
							</div>
							@if(session()->has('success'))
							    <div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
							        {{ session()->get('success') }}
							    </div>
							@endif
							<div class="col-xl-9">
								<div class="card mb-4">
								    <div class="card-header">
								    	Add Product
								    	<a href="{{ route('company-profile') }}" class="text-decoration-none btn btn-info btn-sm float-right">Back to Listing</a>
								    </div>
								    <div class="card-body">
								    <form action="{{ route('add-product', ['id'=>$seller->id]) }}" method="post" id="add-product-form" autocomplete="off">
								    @method('POST')
								    @csrf
									<div class="row">
										<div class="col-6">
											@if ($errors->has('type'))
												<p class="text-danger">{{$errors->first('type')}}</p>
											@endif
											<div class="form-group">
												<label for="">Business Type</label>
												<select name="type" class="form-control" disabled>
													<option value="">Select Primary Business</option>
													<option value="Manufacturers" 
													@if ($seller->type == 'Manufacturers')
														{{'selected'}}
													@endif>
														Manufacturers
													</option>
													<option value="Exporters" 
													@if ($seller->type == 'Exporters')
														{{'selected'}}
													@endif>
														Exporters
													</option>
													<option value="Wholeseller" 
													@if ($seller->type == 'Wholeseller')
														{{'selected'}}
													@endif>Wholeseller</option>
													<option value="Retailer" 
													@if ($seller->type == 'Retailer')
														{{'selected'}}
													@endif>Retailer</option>
													<option value="Trade" 
													@if ($seller->type == 'Trade')
														{{'selected'}}
													@endif>Trade</option>
													<option value="Distribiutor" 
													@if ($seller->type == 'Distribiutor')
														{{'selected'}}
													@endif>Distribiutor</option>
													<option value="Importers" 
													@if ($seller->type == 'Importers')
														{{'selected'}}
													@endif>Importers</option>
													<option value="Buying House" 
													@if ($seller->type == 'Buying House')
														{{'selected'}}
													@endif>Buying House</option>
													<option value="Service Provider" 
													@if ($seller->type == 'Service Provider')
														{{'selected'}}
													@endif>Service Provider</option>
												</select>
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('company_name'))
												<p class="text-danger">{{$errors->first('company_name')}}</p>
											@endif
											<div class="form-group">
												<label for="">Company Name</label>
												<input type="text" name="company_name" class="form-control" value="{{$seller->name}}" placeholder="Company Name" disabled>
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('company_email'))
												<p class="text-danger">{{$errors->first('company_email')}}</p>
											@endif
											<div class="form-group">
												<label for="">Company Email</label>
												<input type="text" name="company_email" class="form-control" value="{{$seller->email}}" placeholder="Company Email" disabled>
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('company_number'))
												<p class="text-danger">{{$errors->first('company_number')}}</p>
											@endif
											<div class="form-group">
												<label for="">Company Number</label>
												<input type="text" name="company_number" class="form-control" value="{{$seller->phone_number}}" placeholder="Company Contact Number" disabled>
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('product_name'))
												<p class="text-danger">{{$errors->first('product_name')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Name</label>
												<input type="text" name="product_name" class="form-control" value="" placeholder="Product Name Here">
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('product_cat'))
												<p class="text-danger">{{$errors->first('product_cat')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Category</label>
												<select name="product_cat" class="form-control">
													<option value="">Select Product Category</option>
													@foreach ($categories as $category)
														@foreach ($category->allChildren as $child)
														<optgroup label="{{$child->name}}">
															@foreach ($child->allChildren as $subchild)
																<option value="{{$subchild->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$subchild->name}}</option>
															@endforeach
														</optgroup>
														@endforeach
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="">Upload Product Images</label>
												<div class="dropzone" id="image-upload">

												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-3">
											@if ($errors->has('city'))
												<p class="text-danger">{{$errors->first('city')}}</p>
											@endif
											<div class="form-group">
												<label for="">City</label>
												<select name="city" class="form-control">
													<option value="">Select City</option>
													@foreach ($cities as $city)
														<option value="{{$city->id}}">{{$city->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-3">
											@if ($errors->has('state'))
												<p class="text-danger">{{$errors->first('state')}}</p>
											@endif
											<div class="form-group">
												<label for="">State</label>
												<select name="state" class="form-control">
													<option value="">Select State</option>
												</select>
											</div>
										</div>
										<div class="col-3">
											@if ($errors->has('zip'))
												<p class="text-danger">{{$errors->first('zip')}}</p>
											@endif
											<div class="form-group">
												<label for="">Zip Code</label>
												<input type="text" name="zip" class="form-control" value="" placeholder="Enter Zip Code">
											</div>
										</div>
										<div class="col-3">
											@if ($errors->has('price'))
												<p class="text-danger">{{$errors->first('price')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Price</label>
												<input type="text" name="price" class="form-control" value="" placeholder="Enter price per piece">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											@if ($errors->has('product_desc'))
												<p class="text-danger">{{$errors->first('product_desc')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Description</label>
												<textarea name="product_desc" rows="5" class="form-control"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">Product Key</label>
												<input type="text" name="meta[0][key]" class="form-control" value="" placeholder="Exp Key= Price">
											</div>
											@if ($errors->has('meta.0.key'))
												<p class="text-danger">{{$errors->first('meta.0.key')}}</p>
											@endif
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">Product Value</label>
												<input type="text" name="meta[0][value]" class="form-control" value="" placeholder="Exp Value=500">
											</div>
											@if ($errors->has('meta.0.value'))
												<p class="text-danger">{{$errors->first('meta.0.value')}}</p>
											@endif
										</div>
										<div class="col-4">
											<div class="form-group">
												<button type="button" class="btn btn-primary" style="margin-top: 32px;" onclick="education_fields();">
													<i class="fas fa-plus mr-1"></i>Add
												</button>
											</div>
										</div>
									</div>
									<div id="education_fields">
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group" style="text-align: center;">
												<button id="addProduct" type="button" class="btn btn-info">Add Product</button>
											</div>
										</div>
									</div>
									</form>
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
@section('scripts')
<script>
  Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone(".dropzone", { 
		autoProcessQueue: false,
		url: '{{ route('product-image') }}',
		headers: {
			'X-CSRF-TOKEN': "{{ csrf_token() }}"
		},
		maxFilesize: 2,
		parallelUploads:4,
		addRemoveLinks: true,
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		success: function (file, response) {
		$('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
		},
	});

	$('#addProduct').click(function(){
		myDropzone.processQueue();
		setTimeout(function () {
			$('#add-product-form').submit();
		}, 2000);
	})

	$(document).ready(function(){
		$('select[name="city"]').on('change', function() {
			var cityId = $(this).val();
			var url = '{{ route('city', ['id'=>':id'])}}';
			url = url.replace(':id', cityId);
			if (cityId) {
				$.ajax({
					url: url,
					type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	$('select[name="state"]').empty();
                    	$('select[name="state"]').append('<option value="'+ data.id +'">'+ data.name +'</option>');
					}
				});
			}else{
				 $('select[name="state"]').empty();
			}
		});
	});
</script>
@stop