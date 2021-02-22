@extends('admin.layouts.default')
@section('title','Edit State')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit State</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit State</li>
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
                        <h3 class="card-title">Edit State</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                        <!-- form start -->
                        <form role="form" action="{{ route('update-state',$state->id) }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            {{method_field('PUT') }}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Name<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('name'))
                                                @component('admin.components.error')
                                                    {{$errors->first('name')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="name" required value="{{ $state->name ?? '' }}">
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
                                            <input type="checkbox" name="status" id="status" class="" value="{{$state->status}}" {{ $state->status==1 ? 'checked' : ''}}>
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
