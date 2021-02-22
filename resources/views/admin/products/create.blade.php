@extends('admin.layouts.default')
@section('title','Add Product')
@section('css')
<link rel="stylesheet" href="{{asset('admin/bootstrap-tagsinput.css')}}">
@endsection
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
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('create-product') }}" method="POST" enctype="multipart/form-data">
                {{@csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    @if($errors->has('productName'))
                      @component('admin.components.error')
                        {{$errors->first('productName')}}
                      @endcomponent
                    @endif
                      <label>Product Name</label>
                      <input type="text" class="form-control" placeholder="Product Name" name="productName" value="{{old('productName')}}" required="true">
                    </div>
                    <div class="form-group">
                    @if($errors->has('category'))
                      @component('admin.components.error')
                        {{$errors->first('category')}}
                      @endcomponent
                    @endif
                      <label>Select Category</label>
                      <select class="custom-select" name="category">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->categoryName}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="product_tags">Product Tags</label>
                        <input type="text" name="product_tags" id="product_tags" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Add Product Tags</label>
                        @foreach($tags as $tag)
                        <div class="single-product-tag">
                            <a href="javascript:;" class="add-tag-product" data-tag="{{$tag->id}}">{{$tag->tag_name}}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        @if($errors->has('status'))
                            @component('admin.components.error')
                                {{$errors->first('status')}}
                            @endcomponent
                        @endif
                        <label for="status">Active
                        <input type="checkbox" name="status" id="status" class="" value="{{old('status')}}">
                        </label>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Save</button>
                  <a href="{{URL::previous()}}" class="btn  bg-gradient-info">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('admin/bootstrap-tagsinput.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $("#product_tags").tagsinput({
            itemValue: 'id',
            itemText:'tag'
        });
        $(document).on('click', '.add-tag-product', function(event) {
            let tagId=$(this).data('tag');
            let tag=$(this).text()
            $("#product_tags").tagsinput('add',{id:tagId,tag:tag})
        });
    });
</script>
@endsection
