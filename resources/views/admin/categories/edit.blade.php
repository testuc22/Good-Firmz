@extends('admin.layouts.default')
@section('title','Update Category')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-form-center">
              <!-- form start -->
                  <form role="form" action="{{ route('update-category',$category->id) }}" method="POST" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    {{method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label class="col-3">Parent Category</label>
                                <div class="col-9">
                                    <select name="parent" class="form-control">
                                        <option value="">Select Parent Category</option>
                                        {!! $dropdown !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label class="col-3">Category Name</label>
                                <div class="col-9">
                                    @if($errors->has('name'))
                                      @component('admin.components.error')
                                        {{$errors->first('name')}}
                                      @endcomponent
                                    @endif
                                    <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$category->name}}" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label class="col-3">Image</label>
                                <div class="col-9">
                                    <div class="preview-image">
                                        @if($category->image)
                                            <img style="width: 200px;margin-bottom: 10px;" src="{{ asset('public/category_images/'.$category->image) }}">
                                            <input type="hidden" name="old_image" value="{{$category->image}}">
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                @if($errors->has('status'))
                                    @component('admin.components.error')
                                        {{$errors->first('status')}}
                                    @endcomponent
                                @endif
                                <label for="status"  class="col-3">Active</label>
                                <div class="col-9">
                                    <input type="checkbox" name="status" id="status" class="" value="{{$category->status}}" {{ $category->status==1 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label for="status"  class="col-3">Featured Categories</label>
                                <div class="col-9">
                                    <input type="checkbox" name="featured" id="featured" class="" value="{{$category->featured}}" {{ $category->featured==1 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label  class="col-3">Meta Title</label>
                                <div class="col-9">
                                    @if($errors->has('meta_title'))
                                        @component('admin.components.error')
                                            {{$errors->first('meta_title')}}
                                        @endcomponent
                                    @endif
                                    <input type="text" class="form-control" placeholder="Meta Title" name="meta_title" value="{{$category->meta_title ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label  class="col-3">Meta Tags</label>
                                <div class="col-9">
                                    @if($errors->has('meta_tags'))
                                        @component('admin.components.error')
                                            {{$errors->first('meta_tags')}}
                                        @endcomponent
                                    @endif
                                    <input type="text" class="form-control" name="meta_tags" value="{{$category->meta_tags ?? ''}}" data-role="tagsinput">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 form-inner-block">
                                <label  class="col-3">Meta Description</label>
                                <div class="col-9">
                                    @if($errors->has('meta_desc'))
                                        @component('admin.components.error')
                                            {{$errors->first('meta_desc')}}
                                        @endcomponent
                                    @endif
                                    <textarea class="form-control" name="meta_desc">{{$category->meta_desc ?? ''}}</textarea>
                                </div>
                            </div>
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
