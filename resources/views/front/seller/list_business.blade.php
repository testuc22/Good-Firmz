@extends('front.layouts.default')
@section('title')
B2B-Seeker - List Your Business
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>list your business</h2>
	</div>
</div>
<div class="your-business">
	<div class="container">
		<div class="row justify-content-lg-center">
			<div class="col-lg-6">
				<form class="your-business-form" method="POST" action="{{route('create-business')}}">
					{{@csrf_field()}}
					<h3>Add business</h3>
					<input type="text" placeholder="Business Name*" name="name" value="{{old('name')}}">
					@if($errors->has('name'))
                        @component('admin.components.error')
                            {{$errors->first('name')}}
                        @endcomponent
                    @endif
					<div class="tel-number">
						<input type="phone" placeholder="Business Contact Number*" name="phone_number" value="{{old('phone_number')}}">
						<span>+91</span>
					</div>
					@if($errors->has('phone_number'))
                        @component('admin.components.error')
                            {{$errors->first('phone_number')}}
                        @endcomponent
                    @endif
					<input type="email" placeholder="Business Email*" name="email" value="{{old('email')}}">
					@if($errors->has('email'))
                        @component('admin.components.error')
                            {{$errors->first('email')}}
                        @endcomponent
                    @endif
					<input type="text" placeholder="Adress Line 1*" name="address1" value="{{old('address1')}}">
					@if($errors->has('address1'))
                        @component('admin.components.error')
                            {{$errors->first('address1')}}
                        @endcomponent
                    @endif
					<input type="text" placeholder="Adress Line 2*" name="address2" value="{{old('address2')}}">
					@if($errors->has('address2'))
                        @component('admin.components.error')
                            {{$errors->first('address2')}}
                        @endcomponent
                    @endif
					<select name="state_id" id="statesList">
						<option value="">Select State</option>
                        @foreach($allStates as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
					</select>
					@if($errors->has('state_id'))
                        @component('admin.components.error')
                            {{$errors->first('state_id')}}
                        @endcomponent
                    @endif
					<img src="{{asset('images/loader.gif')}}" class="loader-img float-right" style="display: none;">
					<select name="city_id" id="citiesList">
						<option value="">Select city</option>
					</select>
					@if($errors->has('city_id'))
                        @component('admin.components.error')
                            {{$errors->first('city_id')}}
                        @endcomponent
                    @endif
					<input type="text" placeholder="Zipcode*" name="pincode" value="{{old('pincode')}}">
					@if($errors->has('pincode'))
                        @component('admin.components.error')
                            {{$errors->first('pincode')}}
                        @endcomponent
                    @endif
					<input type="text" placeholder="Website" name="website" value="{{old('website')}}">
					<select name="categories[]" class="select2" multiple="">
						{!! $categories !!}
					</select>
					@if($errors->has('categories'))
                        @component('admin.components.error')
                            {{$errors->first('categories')}}
                        @endcomponent
                    @endif
					<textarea placeholder="What the expect form this business?*" name="desc">{{old('desc')}}</textarea>
					@if($errors->has('desc'))
                        @component('admin.components.error')
                            {{$errors->first('desc')}}
                        @endcomponent
                    @endif
					<div class="checkbox-content">
	  					<div class="gray1 checkbox1">
						  <input class="checkbox" type="checkbox" id="customcb2" name="owe_this_business">
						  <label class="inner1" for="customcb2"></label>						
						</div>	
						<p>I own this business</p>				
  					</div>
  					@if($errors->has('owe_this_business'))
                        @component('admin.components.error')
                            {{$errors->first('owe_this_business')}}
                        @endcomponent
                    @endif
  					<div class="checkbox-content">
	  					<div class="gray1 checkbox1">
						  <input class="checkbox" type="checkbox" id="customcb3" name="terms">
						  <label class="inner1" for="customcb3"></label>						
						</div>	
						<p>I agree to <a href="#">Terms &amp; Conditions</a></p>			
  					</div>
  					@if($errors->has('terms'))
                        @component('admin.components.error')
                            {{$errors->first('terms')}}
                        @endcomponent
                    @endif
					<input type="submit" name="submit" value="Add Business" class="btn-add-business">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script_variables')
<script type="text/javascript">
	var cities_by_seller = "{{route('get-cities-by-state')}}";
</script>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('scripts')
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.select2').select2();
})
</script>
@endsection