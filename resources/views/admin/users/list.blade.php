@extends('admin.layouts.default')
@section('title','Users List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Users List</li>
                </ol>
            </div>
            <div class="col-sm-6 ">
                {{--<a href="{{route('add-user')}}" class="btn  bg-gradient-info float-right" >Add New User</a>--}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>State</th>
                                <th>Verified</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allUsers as $user)
                                @foreach ($user->sellers as $seller)
                                    <tr>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>{{$seller->state['name'] ? $seller->state['name'] : '-'}}</td>
                                        <td>{{$user->email_verified_at ? "Yes" : "No"}}</td>
                                        <td>
                                            <select class="custom-select change_user_state" data-user="{{$user->id}}">
                                                <option value="1" {{$user->status==1 ? 'selected' :'' }}>Active</option>
                                                <option value="0" {{$user->status==0 ? 'selected' :'' }}>Deactive</option>
                                            </select>
                                        </td>
                                        <td  style="width: 220px;">
                                            
                                           {{--<a href="{{route('add-user-business',$user->id)}}" class="mx-1 text-success" title="Add Business">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                            @if(count($user->sellers))
                                            <a href="{{route('list-sellers')}}?userId={{$user->id}}" class="mx-1 text-success" title="View Business">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('edit-seller',$user->sellers[0]->id) }}" class="mx-1" title="Edit Business">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            <a href="{{ route('edit-user',$user->id) }}" class="mx-1" title="Edit User">
                                                <i class="fas fa-user-edit"></i>
                                            </a>--}}
                                            <a href="{{ route('delete-user',$user->id) }}" style="margin-left: 15px;" class="delete-category mx-1 btn btn-danger btn-sm" title="Delete User"  onclick="return confirm('Are you sure, you want to delete this?');">
                                                <i class="fas fa-trash-alt mr-1"></i>Delete
                                            </a>
                                        </td>
                                    </tr>        
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>State</th>
                                <th>Verified</th>
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
        $(document).on('change', '.change_user_state', function(event) {
            let user=$(this).data('user');
            let value=$(this).children('option:selected').val()
            $.ajax({
                url: '{{route('update-user-status')}}',
                type: 'PUT',
                data:{user:user,'_token':'{{csrf_token()}}',status:value},
                success:function(result){
                    show_success(result.message,"success")
                }
            });
        });
    });
</script>
@endsection

