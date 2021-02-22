@extends('admin.layouts.default')
@section('title','Add User')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-form-center">
                        <!-- form start -->
                        <form role="form" action="{{ route('admin-update-user',$user->id) }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">First Name<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('first_name'))
                                                @component('admin.components.error')
                                                    {{$errors->first('first_name')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="first_name" required value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Last Name<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('last_name'))
                                                @component('admin.components.error')
                                                    {{$errors->first('last_name')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="last_name" required value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Email<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('email'))
                                                @component('admin.components.error')
                                                    {{$errors->first('email')}}
                                                @endcomponent
                                            @endif
                                            <input type="text" class="form-control" name="email"  value="{{$user->email}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Password</label>
                                        <div class="col-9">
                                            @if($errors->has('password'))
                                                @component('admin.components.error')
                                                    {{$errors->first('password')}}
                                                @endcomponent
                                            @endif
                                            <input type="password" class="form-control" name="password" value=""  >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Confirm Password</label>
                                        <div class="col-9">
                                            @if($errors->has('password_confirmation'))
                                                @component('admin.components.error')
                                                    {{$errors->first('password_confirmation')}}
                                                @endcomponent
                                            @endif
                                            <input type="password" class="form-control" name="password_confirmation"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        <label class="col-3">Phone Number<span class="required">*</span></label>
                                        <div class="col-9">
                                            @if($errors->has('phone_number'))
                                                @component('admin.components.error')
                                                    {{$errors->first('phone_number')}}
                                                @endcomponent
                                            @endif
                                            <input type="number" class="form-control" name="phone_number"  value="{{$user->phone_number}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 form-inner-block">
                                        @if($errors->has('state_id'))
                                            @component('admin.components.error')
                                                {{$errors->first('state_id')}}
                                            @endcomponent
                                        @endif
                                        <label for="status" class="col-3">State</label>
                                        <div class="col-9">
                                            <select class="form-control" name="state_id" required>
                                                <option value="">Select State</option>
                                                @foreach($allStates as $state)
                                                    <option value="{{$state->id}}" @if($user->state_id && $user->state_id==$state->id) selected="" @endif>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            
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
                                            <input type="checkbox" name="status" id="status" class="" value="{{$user->status}}" @if($user->status) checked="" @endif>
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
@section('scripts')

@endsection