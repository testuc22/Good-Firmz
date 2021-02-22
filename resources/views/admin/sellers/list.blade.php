@extends('admin.layouts.default')
@section('title','Sellers List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sellers List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sellers List</li>
                </ol>
            </div>
            {{-- <div class="col-sm-6 ">
                <a href="{{ route('add-seller') }}" class="btn  bg-gradient-info float-right" >Add New Seller</a>
            </div> --}}
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- <div class="admin-filters">
                    <form action="" method="GET">
                        <div class="form-group col-sm-4">
                            <label>Seller Name</label>
                            <input type="text" name="seller_name">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Seller Email</label>
                            <input type="email" name="seller_email">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>State</label>
                            <select name="state">
                                
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>City</label>
                            <select name="city">
                                
                            </select>
                        </div>
                    </form>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allSellers as $seller)
                            <tr>
                                <td>
                                    @if($seller->logo)
                                    <img style="width: 100px;" src="{{ asset('public/seller_logo/'.$seller->logo) }}">
                                    @else
                                    <p class="text-center">-</p>
                                    @endif
                                </td>
                                <td>{{$seller->name}}</td>
                                <td>{{$seller->email}}</td>
                                <td>{{$seller->state ? $seller->state->name : ''}}</td>
                                <td>{{$seller->city ? $seller->city->name : ''}}</td>
                                <td>
                                    <select class="custom-select change_seller_state" data-seller="{{$seller->id}}">
                                        <option value="1" {{$seller->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$seller->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('view-user-business',$seller->user->id)}}" class="mx-1 text-success" title="View Seller">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="{{ route('edit-seller',$seller->id) }}" class="mx-1" title="Edit Seller">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="{{ route('delete-seller',$seller->id) }}" style="margin-left: 15px;" class="delete-category mx-1" title="Delete Seller"  onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on('change', '.change_seller_state', function(event) {
            let seller=$(this).data('seller');
            let value=$(this).children('option:selected').val()
            $.ajax({
                url: '{{route('update-seller-status')}}',
                type: 'PUT',
                data:{seller:seller,'_token':'{{csrf_token()}}',status:value},
                success:function(result){
                    show_success(result.message,"success")
                }
            });
        });
    });
</script>
@endsection

