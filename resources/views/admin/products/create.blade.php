@extends('admin.layouts.default')
@section('title','Add Product')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Product</li>
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
                    <h3 class="card-title">Create Product</h3>
                </div>
                <form role="form" action="{{ route('admin-save-product') }}" method="POST" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="">
                                    Company Name
                                    @if ($errors->has('company_name'))
                                        <p class="text-danger float-right">{{$errors->first('company_name')}}</p>
                                    @endif
                                </label>
                                <select name="company_name"  class="form-control">
                                    <option value="">Select Company</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{$seller->id}}">{{$seller->name}}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="col-3">
                                <label for="">
                                    Company Business Type
                                    @if ($errors->has('business_type'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('business_type')}}</p>
                                    @endif
                                </label>
                                <select name="business_type" class="form-control">
                                    <option value="">Select Business Type</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{$seller->id}}">{{$seller->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">
                                    Product Category
                                    @if ($errors->has('product_category'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_category')}}</p>
                                    @endif
                                </label>
                                <select name="product_category" class="form-control">
                                    <option value="">Select Product Category</option>
                                    {!! $categories !!}
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">
                                    Product Status
                                    @if ($errors->has('product_status'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_status')}}</p>
                                    @endif
                                </label>
                                <select name="product_status" class="form-control">
                                    <option value="">Select Product Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="">
                                    Product Name
                                    @if ($errors->has('product_name'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_name')}}</p>
                                    @endif
                                </label>
                                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="">
                            </div>
                            <div class="col-4">
                                <label for="">
                                    Product Price
                                    @if ($errors->has('product_price'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_price')}}</p>
                                    @endif
                                </label>
                                <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price" value="">
                            </div>
                            <div class="col-4">
                                <label for="">Featured Product</label>
                                <select name="feature_product" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">
                                    Product Meta Title
                                    @if ($errors->has('product_meta_title'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_title')}}</p>
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="product_meta_title" placeholder="Product Meta Title (optional)" value="">
                            </div>
                            <div class="col-6">
                                <label for="">
                                    Product Meta Tags
                                    @if ($errors->has('product_meta_tags'))
                                        <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_tags')}}</p>
                                    @endif
                                </label>
                                <input type="text" class="form-control" data-role="tagsinput" name="product_meta_tags" placeholder="Product Meta Tags (optional)" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="">
                                Product Meta Description
                                @if ($errors->has('product_meta_desc'))
                                    <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_meta_desc')}}</p>
                                @endif
                            </label>
                            <textarea name="product_meta_desc" rows="2" class="form-control" placeholder="Product Meta DEscription here... (optional)"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="">
                                Product Description
                                @if ($errors->has('product_desc'))
                                    <p class="text-danger float-right" style="margin: 0;">{{$errors->first('product_desc')}}</p>
                                @endif
                            </label>
                            <textarea name="product_desc" rows="5" class="form-control" placeholder="About Product Description"></textarea>
                        </div>
                        <label for="">Product Additional Info</label>
                        <div class="d-flex justify-content-around">
                            @if ($errors->has('meta.*.product_key'))
                                <p class="text-danger">{{$errors->first('meta.*.product_key')}}</p>
                            @endif
                            @if ($errors->has('meta.*.product_value'))
                                <p class="text-danger">{{$errors->first('meta.*.product_value')}}</p>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-5">
                                <input type="text" class="form-control" name="meta[0][product_key]" placeholder="Enter Product Key" value="">
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" name="meta[0][product_value]" placeholder="Enter Product Value" value="">
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-info btn-sm" onclick="product_meta_fields()">Add More</button>
                            </div>
                        </div>
                        <div id="additional_fields">
                            
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info btn-sm">Create Product</button>
                            <a href="{{ route('list-products') }}" class="btn btn-success btn-sm">Back to Listing</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    var room = 1;
    var count = 0;
    function product_meta_fields() {
        room++;
        count++;
        var objTo = document.getElementById('additional_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="form-group row"><div class="col-5"><input type="text" name="meta['+count+'][product_key]" class="form-control" value="" placeholder="Enter Product Key"></div><div class="col-5"><input type="text" name="meta['+count+'][product_value]" class="form-control" value="" placeholder="Enter Product Value"></div><div class="col-2"><button class="btn btn-danger btn-sm" type="button" onclick="remove_product_meta_fields('+ room +');">Remove</button></div></div>';
        objTo.appendChild(divtest)
    }
    function remove_product_meta_fields(rid) {
       $('.removeclass'+rid).remove();
    }
</script>
@endsection
