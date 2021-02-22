@extends('front.layouts.default')
@section('title')
B2B-Seeker - Edit Business
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Edit Business - {{$seller->name}}</h2>
	</div>
</div>
<div class="my-account-content">
	<div class="container">
		<div class="row">
			@include('front.includes.sidebar')
			<div class="col-lg-8 col-md-6">
				<div class="my-account">
					<div class="card-form-center business_form_wrapper">
					    <!-- form start -->
					    <form role="form" action="{{ route('update-business',$seller->id) }}" method="POST" enctype="multipart/form-data">
					        {{@csrf_field()}}
					        {{method_field('PUT')}}
					        <div class="card-body">
					            {{-- <div class="form-group">
					                <div class="text-center sub-headings">
					                    <h4>Personal Information</h4>
					                </div>
					            </div> --}}
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Business Name<span class="required">*</span></label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    <label>Categories<span class="required">*</span></label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    <label>Business Email<span class="required">*</span></label>
					                    <div class="form_field">
					                        @if($errors->has('email'))
					                            @component('admin.components.error')
					                                {{$errors->first('email')}}
					                            @endcomponent
					                        @endif
					                        <input type="text" class="form-control" name="email"  value="{{ $seller->email ? $seller->email : '' }}" required>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Business Contact Number<span class="required">*</span></label>
					                    <div class="form_field">
					                        @if($errors->has('phone_number'))
					                            @component('admin.components.error')
					                                {{$errors->first('phone_number')}}
					                            @endcomponent
					                        @endif
					                        <input type="number" class="form-control" name="phone_number"  value="{{ $seller->phone_number ? $seller->phone_number : '' }}" required>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Logo</label>
					                    <div class="form_field">
					                        <div class="preview-image">
					                            @if($seller->logo)
					                                <img style="width: 200px;margin-bottom: 10px;" src="{{ asset(Storage::url('seller_logo/'.$seller->logo)) }}">
					                                <input type="hidden" name="old_image" value="{{$seller->logo}}">
					                            @endif
					                        </div>
					                        <input type="file" class="form-control" name="logo">
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Address 1<span class="required">*</span></label>
					                    <div class="form_field">
					                        @if($errors->has('address1'))
					                            @component('admin.components.error')
					                                {{$errors->first('address1')}}
					                            @endcomponent
					                        @endif
					                        <input type="text" class="form-control" name="address1"  value="{{ $seller->address1 ? $seller->address1 : '' }}" required>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Address 2<span class="required">*</span></label>
					                    <div class="form_field">
					                        @if($errors->has('address2'))
					                            @component('admin.components.error')
					                                {{$errors->first('address2')}}
					                            @endcomponent
					                        @endif
					                        <input type="text" class="form-control" name="address2"  value="{{ $seller->address2 ? $seller->address2 : '' }}" required>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    @if($errors->has('state_id'))
					                        @component('admin.components.error')
					                            {{$errors->first('state_id')}}
					                        @endcomponent
					                    @endif
					                    <label for="status">State<span class="required">*</span></label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    @if($errors->has('city_id'))
					                        @component('admin.components.error')
					                            {{$errors->first('city_id')}}
					                        @endcomponent
					                    @endif
					                    <label for="status">City<span class="required">*</span></label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    @if($errors->has('pincode'))
					                        @component('admin.components.error')
					                            {{$errors->first('pincode')}}
					                        @endcomponent
					                    @endif
					                    <label for="status">Pincode<span class="required">*</span></label>
					                    <div class="form_field">
					                        <input type="text" class="form-control" name="pincode"  value="{{ $seller->pincode ?? '' }}">
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Website</label>
					                    <div class="form_field">
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
					                <div class="text-center sub-headings">
					                    <h4>Other Information</h4>
					                </div>
					            </div> --}}
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>About Company</label>
					                    <div class="form_field">
					                        @if($errors->has('desc'))
					                            @component('admin.components.error')
					                                {{$errors->first('desc')}}
					                            @endcomponent
					                        @endif
					                        <textarea class="textarea" name="desc">{{ $seller->desc ? $seller->desc : '' }}</textarea>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    @if($errors->has('status'))
					                        @component('admin.components.error')
					                            {{$errors->first('status')}}
					                        @endcomponent
					                    @endif
					                    <label for="status">Active</label>
					                    <div class="form_field">
					                        <input type="checkbox" name="status" id="status" class="" value="{{$seller->status}}" @if($seller->status) checked @endif>
					                    </div>
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="form-inner-block">
					                    <label>Meta Title</label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    <label>Meta Tags</label>
					                    <div class="form_field">
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
					                <div class="form-inner-block">
					                    <label>Meta Description</label>
					                    <div class="form_field">
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

					            <div class="card-footer-form">
					                <button type="submit" class="btn btn-success save_btn">Save</button>
					                <a href="{{route('user-business-details')}}" class="btn  bg-gradient-info back_btn">Back</a>
					            </div>
					        </div>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
	<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<!-- summernote -->
	<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
	<!-- Google Font: Source Sans Pro -->
@endsection
@section('scripts')
	<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}" async></script>
	<script src="{{asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}" async></script>
	<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}" async></script>
@endsection