@extends('admin.layouts.default')
@section('title','Add Category')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add New Category</li>
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
                        <h3 class="card-title">Create Category</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-form-center">
                    <!-- form start -->
                        <form role="form" action="{{ route('save-banner') }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label  class="col-3">Image</label>
                                        <div class="col-9">
                                            @if($errors->has('image'))
                                                @component('admin.components.error')
                                                    {{$errors->first('image')}}
                                                @endcomponent
                                            @endif
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label  class="col-3">Button Text</label>
                                        <div class="col-9">
                                            @if($errors->has('button_text'))
                                                @component('admin.components.error')
                                                    {{$errors->first('button_text')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control"  name="button_text" value="{{old('button_text')}}" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label  class="col-3">Button Link</label>
                                        <div class="col-9">
                                            @if($errors->has('button_link'))
                                                @component('admin.components.error')
                                                    {{$errors->first('button_link')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="button_link" value="{{old('button_link')}}" required="true">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

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
