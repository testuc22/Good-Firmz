@extends('admin.layouts.default')
@section('title','Edit Business')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Seller Company</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Seller Company</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
                <div class="card card-primary">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title">Edit Seller Company</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="{{ route('update-seller',$seller->id) }}" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    @if ($errors->has('company_type'))
                                        <p class="text-danger">{{$errors->first('company_type')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Type</label>
                                        <select name="company_type" class="form-control">
                                            <option value="">Select Your Company Type</option>
                                            <option value="Manufacturers" @if ($seller->type == "Manufacturers")
                                                {{'selected'}}
                                            @endif>Manufacturers</option>
                                            <option value="Exporters" @if ($seller->type == "Exporters")
                                                {{'selected'}}
                                            @endif>Exporters</option>
                                            <option value="Wholeseller" @if ($seller->type == "Wholeseller")
                                                {{'selected'}}
                                            @endif>Wholeseller</option>
                                            <option value="Retailer" @if ($seller->type == "Retailer")
                                                {{'selected'}}
                                            @endif>Retailer</option>
                                            <option value="Trade" @if ($seller->type == "Trade")
                                                {{'selected'}}
                                            @endif>Trade</option>
                                            <option value="Distribiutor" @if ($seller->type == "Distribiutor")
                                                {{'selected'}}
                                            @endif>Distribiutor</option>
                                            <option value="Importers" @if ($seller->type == "Importers")
                                                {{'selected'}}
                                            @endif>Importers</option>
                                            <option value="Buying House" @if ($seller->type == "Buying House")
                                                {{'selected'}}
                                            @endif>Buying House</option>
                                            <option value="Service Provider" @if ($seller->type == "Service Provider")
                                                {{'selected'}}
                                            @endif>Service Provider</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('company_name'))
                                        <p class="text-danger">{{$errors->first('company_name')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" placeholder="Enter Your Company Name" value="{{$seller->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @if ($errors->has('company_email'))
                                        <p class="text-danger">{{$errors->first('company_email')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Email</label>
                                        <input type="email" class="form-control" name="company_email" value="{{$seller->email}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('company_number'))
                                        <p class="text-danger">{{$errors->first('company_number')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Contact Detail</label>
                                        <input type="text" class="form-control" name="company_number" value="{{$seller->phone_number}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" rows="2" class="form-control">{{$seller->address1}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    @if ($errors->has('city'))
                                        <p class="text-danger">{{$errors->first('city')}}</p>
                                    @endif
                                    <label for="">City</label>
                                    <select name="city" class="form-control">
                                        <option value="">Select Your City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->id}}" @if ($seller->city_id ==$city->id)
                                                {{'selected'}}
                                            @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    @if ($errors->has('state'))
                                        <p class="text-danger">{{$errors->first('state')}}</p>
                                    @endif
                                    <label for="">State</label>
                                    <select name="state" class="form-control">
                                        <option value="">Select Your State</option>
                                        <option value="{{$seller->state->id}}" @if ($seller->state_id == $seller->state->id)
                                            {{'selected'}}
                                        @endif>{{$seller->state->name}}</option>
                                        option
                                    </select>
                                </div>
                                <div class="col-4">
                                    @if ($errors->has('pincode'))
                                        <p class="text-danger">{{$errors->first('pincode')}}</p>
                                    @endif
                                    <label for="">Pip Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Zip Code" name="pincode" value="{{ $seller->pincode }}">
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{$errors->first('status')}}</p>
                                    @endif
                                    <label for="">Company Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" @if ($seller->status == 1)
                                            {{'selected'}}
                                        @endif>Active</option>
                                        <option value="0" @if ($seller->status == 0)
                                            {{'selected'}}
                                        @endif>Deactive</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('featured'))
                                        <p class="text-danger">{{$errors->first('featured')}}</p>
                                    @endif
                                    <label for="">Featured Company</label>
                                    <select name="featured" class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="1" @if ($seller->featured == 1)
                                            {{'selected'}}
                                        @endif>Yes</option>
                                        <option value="0" @if ($seller->featured == 0)
                                            {{'selected'}}
                                        @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    @if ($errors->has('meta_title'))
                                        <p class="text-danger">{{$errors->first('meta_title')}}</p>
                                    @endif
                                    <label for="">
                                        Company Meta Title
                                    </label>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{ $seller->meta_title }}">
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('meta_tags'))
                                        <p class="text-danger">{{$errors->first('meta_tags')}}</p>
                                    @endif
                                    <label for="">
                                        Meta Tags
                                    </label>
                                    <input type="text" class="form-control" data-role="tagsinput" name="meta_tags" placeholder="Meta Tags" value="{{ $seller->meta_tags }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                @if ($errors->has('meta_desc'))
                                    <p class="text-danger">{{$errors->first('meta_desc')}}</p>
                                @endif
                                <label for="">
                                    Meta Description
                                </label>
                                <textarea name="meta_desc" rows="2" class="form-control" placeholder="Meta DEscription here...">{{ $seller->meta_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info btn-sm">Update Seller Detail</button>
                                <a href="{{ route('list-sellers') }}" class="btn btn-success btn-sm">Back to Listing</a>
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
        $(document).ready(function(){
            $('select[name="city"]').on('change', function() {
                var cityId = $(this).val();
                var url = '{{ route('admin-city', ['id'=>':id'])}}';
                url = url.replace(':id', cityId);
                if (cityId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="state"]').empty();
                            $('select[name="state"]').append('<option value="'+ data.id +'">'+ data.name +'</option>');
                        }
                    });
                }else{
                     $('select[name="state"]').empty();
                }
            });
        });
    </script>
@endsection
