@extends('admin.layouts.default')
@section('title','Settings')


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Details</li>
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
                        <h3 class="card-title">Home Page Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                    	<form method="post" action="{{route('save-home-settings')}}" enctype="multipart/form-data">
                    		{{@csrf_field()}}
                    		<div class="card-body">
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Banner</label>
                                        <div class="col-9">
                                            <a href="{{route('settings-home-banner')}}">Add Homepage Banners</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Categories {{count($allCategories)}}</label>
                                        <div class="col-9">
                                            <select class="duallistbox form-control" multiple="multiple" name="categories[]">
							                	@foreach($allCategories as $category)
							                	<option value="{{$category->id}}" @if(isset($homeSettings['categories']) && in_array($category->id,$homeSettings['categories'])) selected="" @endif>{{$category->name}}</option>
							                	@endforeach    
							                </select>
							                @if($errors->has('categories'))
                                                @component('admin.components.error')
                                                    {{$errors->first('categories')}}
                                                @endcomponent
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Featured Listings</label>
                                        <div class="col-9">
                                            <select class="duallistbox form-control" multiple="multiple" name="featured_sellers[]">
							                    @foreach($allSellers as $seller)
							                	<option value="{{$seller->id}}" @if(isset($homeSettings['sellers']) && in_array($seller->id,$homeSettings['sellers'])) selected="" @endif>{{$seller->name}}</option>
							                	@endforeach  
						                  	</select>
						                  	@if($errors->has('featured_sellers'))
                                                @component('admin.components.error')
                                                    {{$errors->first('featured_sellers')}}
                                                @endcomponent
                                            @endif
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
@section('css')
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}} ">
@endsection

@section('scripts')

<script src="{{ asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.duallistbox').bootstrapDualListbox()
});
</script>
@endsection