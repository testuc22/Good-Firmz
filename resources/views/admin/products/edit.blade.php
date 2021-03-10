@extends('admin.layouts.default')
@section('title','Update Product')
@section('content')
@include('admin.includes.tabs')
<div class="tab-content">
    <div class="tab-pane container active " id="updateProduct">
        <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Edit Product</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header bg-info text-white">
                        <h3 class="card-title">Update Product</h3>
                      </div>
                      <!-- form start -->
                      <form role="form" action="{{ route('update-product-detail', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">Company Name</label>
                                    <select name="company_name"  class="form-control" disabled>
                                        <option value="">Select Company</option>
                                        @foreach ($sellers as $seller)
                                            <option value="{{$seller->id}}" @if ($product->seller_id == $seller->id)
                                                {{'selected'}}
                                            @endif>{{$seller->name}}</option>
                                        @endforeach
                                    </select>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label for="">Company Business Type</label>
                                    <select name="business_type" class="form-control" disabled>
                                        <option value="">Select Business Type</option>
                                        @foreach ($sellers as $seller)
                                            <option value="{{$seller->id}}" @if ($product->seller_id == $seller->id)
                                                {{'selected'}}
                                            @endif>{{$seller->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label for="">
                                        Category
                                        @if ($errors->has('product_category'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_category')}}</p>
                                        @endif
                                    </label>
                                    <select name="product_category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if (in_array($category->id, $productCat))
                                                {{'selected'}}
                                            @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Sub Category</label>
                                    <select name="sub_category" class="form-control">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($categories as $category)
                                            @foreach ($category->children as $child)
                                                @if (in_array($child->id, $productCat))
                                                    <option value="{{$child->id}}" selected>{{$child->name}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="col-4">
                                    <label for="">Child Category</label>
                                    <select name="child_category" class="form-control">
                                        <option value="">Select Child Category</option>
                                        @foreach ($categories as $category)
                                            @foreach ($category->children as $child)
                                                @foreach ($child->allchildren as $subchild)
                                                    @if (in_array($subchild->id, $productCat))
                                                        <option value="{{$subchild->id}}" selected>{{$subchild->name}}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">
                                        Product Name
                                        @if ($errors->has('product_name'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_name')}}</p>
                                        @endif
                                    </label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="{{$product->name}}">
                                </div>
                                <div class="col-6">
                                    <label for="">
                                        Product Price
                                        @if ($errors->has('product_price'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_price')}}</p>
                                        @endif
                                    </label>
                                    <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price" value="{{$product->price}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">
                                        Product Status
                                        @if ($errors->has('product_status'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_status')}}</p>
                                        @endif
                                    </label>
                                    <select name="product_status" class="form-control">
                                        <option value="">Select Product Status</option>
                                        <option value="1" @if ($product->status == 1)
                                            {{'selected'}}
                                        @endif>Active</option>
                                        <option value="0" @if ($product->status == 0)
                                            {{'selected'}}
                                        @endif>Deactive</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="">Featured Product</label>
                                    <select name="feature_product" class="form-control">
                                        <option value="1" @if ($product->featured == 1)
                                            {{'selected'}}
                                        @endif>Yes</option>
                                        <option value="0" @if ($product->featured == 0)
                                            {{'selected'}}
                                        @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="">
                                    Product Description
                                    @if ($errors->has('product_desc'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_desc')}}</p>
                                    @endif
                                </label>
                                <textarea name="product_desc" rows="5" class="form-control" placeholder="About Product Description">{{$product->desc}}</textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">
                                        Product Meta Title
                                        @if ($errors->has('product_meta_title'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_title')}}</p>
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" name="product_meta_title" placeholder="Product Meta Title" value="{{$product->meta_title}}">
                                </div>
                                <div class="col-6">
                                    <label for="">
                                        Product Meta Tags
                                        @if ($errors->has('product_meta_tags'))
                                            <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_tags')}}</p>
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_meta_tags" placeholder="Product Meta Tags" value="{{$product->meta_tags}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="">
                                    Product Meta Description
                                    @if ($errors->has('product_meta_desc'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_desc')}}</p>
                                    @endif
                                </label>
                                <textarea name="product_meta_desc" rows="2" class="form-control" placeholder="Product Meta DEscription here...">{{$product->meta_desc}}</textarea>
                            </div>
                            <label for="">Product Additional Info</label>
                            @foreach ($product->productMetas as $key => $meta)
                                <div class="form-group row">
                                    <input type="hidden" name="meta[{{$key}}][id]" value="{{$meta->id}}">
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="meta[{{$key}}][product_key]" placeholder="Enter Product Key" value="{{$meta->key}}">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="meta[{{$key}}][product_value]" placeholder="Enter Product Value" value="{{$meta->value}}">
                                    </div>
                                </div>  
                            @endforeach
                        <div class="card-footer">
                          <button type="submit" class="btn btn-success btn-sm">Update Product</button>
                          <a href="{{URL::previous()}}" class="btn  bg-gradient-info">Back to Listing</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </div>
    <div class="tab-pane container fade" id="productimages">
        @include('admin.includes.product-images')
    </div>
</div>
@endsection
@push('head')
    <script>
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
                        $('select[name="child_category"]').empty();
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
        $('select[name="sub_category"]').on('change', function() {
            var catId = $(this).val();
            var url = '{{ route('admin-category', ['id'=>':id'])}}';
            url = url.replace(':id', catId);
            if (catId) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="child_category"]').empty();
                        $.each(data, function(index) {
                            $('select[name="child_category"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
                        })
                    }
                });
            }else{
                $('select[name="child_category"]').empty();
            }
        });
    </script>
@endpush

