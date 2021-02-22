@extends('admin.layouts.default')
@section('title','Cities List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cities List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Cities List</li>
                </ol>
            </div>
            <div class="col-sm-6 ">
                <a href="{{ route('add-city') }}" class="btn  bg-gradient-info float-right"  >Add New City</a>
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
                                <th>State</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allCities as $city)
                            <tr>
                                <td>
                                    {{$city->name}}
                                </td>
                                <td>
                                    {{$city->state->name}}
                                </td>
                                <td>
                                    <select class="custom-select change_city_status" data-city="{{$city->id}}">
                                        <option value="1" {{$city->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$city->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('edit-city',$city->id)}}" class="mx-1" title="Edit City">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="{{route('delete-city',$city->id)}}" style="margin-left: 15px;" class="delete-city mx-1" data-city="{{$city->id}}"  title="Delete City" onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>State</th>
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
    $(document).on('change', '.change_city_status', function(event) {
        let city=$(this).data('city');
        let value=$(this).children('option:selected').val()
        $.ajax({
              url: '{{route('update-city-status')}}',
              type: 'PUT',
              data:{city:city,'_token':'{{csrf_token()}}',status:value},
              success:function(result){
                  show_success(result.message,"success")
              }
        });
    }); 
});
</script>
@endsection

