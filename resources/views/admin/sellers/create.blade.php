@extends('admin.layouts.default')
@section('title','List User Business')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Seller</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Seller</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{--@foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach--}}
                <div class="card card-primary">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title">Create Seller</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="{{ route('save-seller') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-6">
                                    @if ($errors->has('company_type'))
                                        <p class="text-danger">{{$errors->first('company_type')}}</p>
                                    @endif
                                    <label for="">Company Type</label>
                                    <select name="company_type" class="form-control">
                                        <option value="">Select Your Company Type</option>
                                        <option value="Manufacturers">Manufacturers</option>
                                        <option value="Exporters">Exporters</option>
                                        <option value="Wholeseller">Wholeseller</option>
                                        <option value="Retailer">Retailer</option>
                                        <option value="Trade">Trade</option>
                                        <option value="Distribiutor">Distribiutor</option>
                                        <option value="Importers">Importers</option>
                                        <option value="Importers">Buying House</option>
                                        <option value="Importers">Service Provider</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('company_name'))
                                        <p class="text-danger">{{$errors->first('company_name')}}</p>
                                    @endif
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" placeholder="Enter Your Company Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @if ($errors->has('company_email'))
                                        <p class="text-danger">{{$errors->first('company_email')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Email</label>
                                        <input type="text" name="company_email" class="form-control" placeholder="Enter Your Company Email" value="{{ old('company_email') }}">  
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('company_number'))
                                        <p class="text-danger">{{$errors->first('company_number')}}</p>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Company Conatct Detail</label>
                                        <input type="text" name="company_number" class="form-control" placeholder="Enter Your Company Contact Detail" value="{{ old('company_number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    @if ($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                    @endif
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" rows="2" placeholder="Enter Your Address Detail">{{ old('address') }}</textarea>
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
                                            <option value="{{$city->id}}">{{$city->name}}</option>
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
                                    </select>
                                </div>
                                <div class="col-4">
                                    @if ($errors->has('pincode'))
                                        <p class="text-danger">{{$errors->first('pincode')}}</p>
                                    @endif
                                    <label for="">Pip Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Zip Code" name="pincode" value="{{ old('pincode') }}">
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
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('featured'))
                                        <p class="text-danger">{{$errors->first('featured')}}</p>
                                    @endif
                                    <label for="">Featured Company</label>
                                    <select name="featured" class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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
                                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title (optional)" value="{{ old('meta_title') }}">
                                </div>
                                <div class="col-6">
                                    @if ($errors->has('meta_tags'))
                                        <p class="text-danger">{{$errors->first('meta_tags')}}</p>
                                    @endif
                                    <label for="">
                                        Meta Tags
                                    </label>
                                    <input type="text" class="form-control" data-role="tagsinput" name="meta_tags" placeholder="Meta Tags (optional)" value="{{ old('meta_tags') }}">
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
                                <textarea name="meta_desc" rows="2" class="form-control" placeholder="Meta DEscription here... (optional)">{{ old('meta_desc') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info btn-sm">Create New Seller</button>
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