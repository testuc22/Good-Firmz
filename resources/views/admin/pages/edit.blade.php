@extends('admin.layouts.default')
@section('title','Edit Page')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Page</li>
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
                        <h3 class="card-title">Edit Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                        <!-- form start -->
                        <form role="form" action="{{ route('update-page',$page->id) }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Page Title<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('title'))
                                                @component('admin.components.error')
                                                    {{$errors->first('title')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="title" required value="{{ $page->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Page Content<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('description'))
                                                @component('admin.components.error')
                                                    {{$errors->first('description')}}
                                                @endcomponent
                                            @endif
                                            <textarea class="form-control textarea" name="description">{{ $page->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Featured Image</label>
                                        <div class="col-9">
                                            <div class="preview-image">
                                                @if($page->featured_image)
                                                    <img style="width: 200px;margin-bottom: 10px;" src="{{ asset('public/page_images/'.$page->featured_image) }}">
                                                    <input type="hidden" name="old_image" value="{{$page->featured_image}}">
                                                @endif
                                            </div>
                                            <input type="file" class="form-control" name="featured_image">
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
                                        <label for="status" class="col-3">Status</label>
                                        <div class="col-9">
                                            <input type="checkbox" name="status" id="status" class="" value="{{ $page->status ? $page->status : '' }}" @if($page->status) checked @endif>
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
                                            <input type="text" class="form-control" placeholder="Meta Title" name="meta_title" value="{{$page->meta_title ?? ''}}">
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
                                            <input type="text" class="form-control" name="meta_tags" value="{{$page->meta_tags ?? ''}}" data-role="tagsinput">
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
                                            <textarea class="form-control" name="meta_desc">{{$page->meta_desc ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{URL::previous()}}" class="btn  bg-gradient-info">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
