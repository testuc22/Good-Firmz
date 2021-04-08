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
											<div class="form-group">
												<label for="">Business Type</label>
												<select name="company_type" class="form-control" disabled>
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
											<div class="form-group">
												<label for="">Company Name</label>
												<input type="text" name="company_name" class="form-control" value="{{$seller->name}}" placeholder="Company Name" disabled>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="">Company Email</label>
												<input type="text" name="company_email" class="form-control" value="{{$seller->email}}" placeholder="Company Email" disabled>
											</div>
										</div>
										<div class="col-6">
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
											@if ($errors->has('price'))
												<p class="text-danger">{{$errors->first('price')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Price</label>
												<input type="text" name="price" class="form-control" value="" placeholder="Enter price per piece">
											</div>
										</div>
										<div class="col-6">
											@if ($errors->has('product_category'))
												<p class="text-danger">{{$errors->first('product_category')}}</p>
											@endif
											<div class="form-group">
												<label for="">Product Category</label>
												<select name="product_category" class="form-control">
													<option value="">Select Product Category</option>
													@foreach ($categories as $category)
													    <option value="{{$category->id}}"{{ (old('product_category') == $category->id ? "selected":"") }}>{{$category->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="">Product Sub Category</label>
												<select name="sub_category" class="form-control">
													<option value="">Select Sub Category</option>
												</select>
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
										<div class="col-12">
											<div class="form-group">
												<label for="">Upload Product Images</label>
												<div class="dropzone" id="image-upload">

												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-5">
											<div class="form-group">
												<label for="">Product Key</label>
												<input type="text" name="meta[0][product_key]" class="form-control" value="" placeholder="Exp Key= Price">
											</div>
											@if ($errors->has('meta.0.key'))
												<p class="text-danger">{{$errors->first('meta.0.key')}}</p>
											@endif
										</div>
										<div class="col-5">
											<div class="form-group">
												<label for="">Product Value</label>
												<input type="text" name="meta[0][product_value]" class="form-control" value="" placeholder="Exp Value=500">
											</div>
											@if ($errors->has('meta.0.value'))
												<p class="text-danger">{{$errors->first('meta.0.value')}}</p>
											@endif
										</div>
										<div class="col-2">
											<div class="form-group">
												<button type="button" class="btn btn-success btn-sm" style="margin-top: 32px;" onclick="education_fields();">
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
												<button id="addProduct" type="button" class="btn btn-danger btn-sm">Add Product</button>
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
	    $('select[name="product_category"]').on('change', function() {
	        var catId = $(this).val();
	        var url = '{{ route('admin-category', ['id'=>':id'])}}';
	        url = url.replace(':id', catId);
	        if (catId) {
	            $.ajax({
	                url: url,
	                type: "GET",
	                dataType: "json",
	                success:function(data) {
	                    $('select[name="sub_category"]').empty();
	                    $('select[name="sub_category"]').append('<option value="">Select Sub Category</option>');
	                    $.each(data, function(index) {
	                        $('select[name="sub_category"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
	                    })
	                }
	            });
	        }else{
	            $('select[name="sub_category"]').empty();
	        }
	    });
	});
</script>
@stop