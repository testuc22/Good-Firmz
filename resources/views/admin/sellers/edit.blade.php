@extends('admin.layouts.default')
@section('title','Edit Business')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Business</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Business</li>
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
                        <h3 class="card-title">Edit Business</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                        <!-- form start -->
                        <form role="form" action="{{ route('update-seller',$seller->id) }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <div class="col-12 text-center sub-headings">
                                        <h4>Personal Information</h4>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Business Name<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('name'))
                                                @component('admin.components.error')
                                                    {{$errors->first('name')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="name" required value="{{ $seller->name ? $seller->name : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Categories<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('categories'))
                                                @component('admin.components.error')
                                                    {{$errors->first('categories')}}
                                                @endcomponent
                                            @endif
                                            <select name="categories[]" class="form-control select2" multiple="multiple" >
                                                <option value="">Select Categories</option>
                                                {!! $dropdown !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Business Email</label>
                                        <div class="col-9">
                                            @if($errors->has('email'))
                                                @component('admin.components.error')
                                                    {{$errors->first('email')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="email"  value="{{ $seller->email ? $seller->email : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Business Contact Number<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('phone_number'))
                                                @component('admin.components.error')
                                                    {{$errors->first('phone_number')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="phone_number"  value="{{ $seller->phone_number ? $seller->phone_number : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Logo</label>
                                        <div class="col-9">
                                            <div class="preview-image">
                                                @if($seller->logo)
                                                    <img style="width: 200px;margin-bottom: 10px;" src="{{ asset('public/seller_logo/'.$seller->logo) }}">
                                                    <input type="hidden" name="old_image" value="{{$seller->logo}}">
                                                @endif
                                            </div>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Address<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('address1'))
                                                @component('admin.components.error')
                                                    {{$errors->first('address1')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="address1"  value="{{ $seller->address1 ? $seller->address1 : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Address 2<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('address2'))
                                                @component('admin.components.error')
                                                    {{$errors->first('address2')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="address2"  value="{{ $seller->address2 ? $seller->address2 : '' }}" required>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        @if($errors->has('state_id'))
                                            @component('admin.components.error')
                                                {{$errors->first('state_id')}}
                                            @endcomponent
                                        @endif
                                        <label for="status" class="col-3">State<span class="required">*</span></label>
                                        <div class="col-9">
                                            <select class="form-control" name="state_id" id="statesList" required>
                                                <option value="">Select State</option>
                                                @foreach($allStates as $state)
                                                    <option value="{{$state->id}}" @if($state->id==$seller->state->id) selected=""  @endif>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            <img src="{{asset('images/loader.gif')}}" class="loader-img float-right" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        @if($errors->has('city_id'))
                                            @component('admin.components.error')
                                                {{$errors->first('city_id')}}
                                            @endcomponent
                                        @endif
                                        <label for="status" class="col-3">City<span class="required">*</span></label>
                                        <div class="col-9">
                                            <select class="form-control" name="city_id" id="citiesList" required>
                                                <option value="">Select City</option>
                                                @foreach($allCities as $city)
                                                    <option value="{{$city->id}}" @if($city->id==$seller->city->id) selected=""  @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        @if($errors->has('pincode'))
                                            @component('admin.components.error')
                                                {{$errors->first('pincode')}}
                                            @endcomponent
                                        @endif
                                        <label for="status" class="col-3">Pincode<span class="required">*</span></label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="pincode"  value="{{ $seller->pincode ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Website</label>
                                        <div class="col-9">
                                            @if($errors->has('website'))
                                                @component('admin.components.error')
                                                    {{$errors->first('website')}}
                                                @endcomponent
                                            @endif
                                            <input type="url" class="form-control" name="website"  value="{{ $seller->website ? $seller->website : '' }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- <hr>
                                <div class="form-group">
                                    <div class="col-12 text-center sub-headings">
                                        <h4>Other Information</h4>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Deals in<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('deals_in'))
                                                @component('admin.components.error')
                                                    {{$errors->first('deals_in')}}
                                                @endcomponent
                                            @endif
                                            <textarea name="deals_in" required>{{ $seller->deals_in ? $seller->deals_in : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">About Company<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('desc'))
                                                @component('admin.components.error')
                                                    {{$errors->first('desc')}}
                                                @endcomponent
                                            @endif
                                            <textarea class="textarea" name="desc" required>{{ $seller->desc ? $seller->desc : '' }}</textarea>
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
                                        <label for="status" class="col-3">Active</label>
                                        <div class="col-9">
                                            <input type="checkbox" name="status" id="status" class="" value="{{$seller->status}}" @if($seller->status) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        @if($errors->has('featured'))
                                            @component('admin.components.error')
                                                {{$errors->first('featured')}}
                                            @endcomponent
                                        @endif
                                        <label for="featured" class="col-3">Featured</label>
                                        <div class="col-9">
                                            <input type="checkbox" name="featured" id="featured" class="" value="featured" @if($seller->featured) checked @endif>
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
                                            <input type="text" class="form-control" placeholder="Meta Title" name="meta_title" value="{{$seller->meta_title ?? ''}}">
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
                                            <input type="text" class="form-control" name="meta_tags" value="{{$seller->meta_tags ?? ''}}" data-role="tagsinput">
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
                                            <textarea class="form-control" name="meta_desc">{{$seller->meta_desc ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input class="checkbox" type="hidden" id="customcb2" name="owe_this_business" value="1">
                                <input class="checkbox" type="hidden" id="customcb3" name="terms" value="1">
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
