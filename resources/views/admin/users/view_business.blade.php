@extends('admin.layouts.default')
@section('title','View User Details')
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
                        <h3 class="card-title">User Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                    	<form>
	                    	<div class="row card-body">
		                    	<div class="form-group col-12  form-inner-block">
		                    		<label class="col-4">User:</label>
		                    		<div class="col-9">{{$user->first_name}} {{$user->last_name}}</div>
		                    	</div>
		                    	<div class="form-group col-12  form-inner-block">
		                    		<label class="col-4">Email:</label>
		                    		<div class="col-9">{{$user->email}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Phone Number:</label>
		                    		<div class="col-9">{{$user->phone_number}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Business Name:</label>
		                    		<div class="col-9">{{$user->sellers[0]->name}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Business Phone Number:</label>
		                    		<div class="col-9">{{$user->sellers[0]->phone_number}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Address1:</label>
		                    		<div class="col-9">{{$user->sellers[0]->address1}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Address2:</label>
		                    		<div class="col-9">{{$user->sellers[0]->address2}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">State:</label>
		                    		<div class="col-9">{{$user->sellers[0]->state->name}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">City:</label>
		                    		<div class="col-9">{{$user->sellers[0]->city->name}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Pincode:</label>
		                    		<div class="col-9">{{$user->sellers[0]->pincode}}</div>
		                    	</div>
		                    	@if($user->sellers[0]->website)
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Website:</label>
		                    		<div class="col-9">{{$user->sellers[0]->website}}</div>
		                    	</div>
		                    	@endif
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Status:</label>
		                    		<div class="col-9">{{$user->sellers[0]->status ? "Active" : "Inactive"}}</div>
		                    	</div>
		                    	<div class="form-group col-12 form-inner-block">
		                    		<label class="col-4">Is featured:</label>
		                    		<div class="col-9">{{$user->sellers[0]->featured ? "Yes" : "No"}}</div>
		                    	</div>
		                    	<div class="card-footer">
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