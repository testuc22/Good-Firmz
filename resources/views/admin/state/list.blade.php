@extends('admin.layouts.default')
@section('title','States List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>States List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">States List</li>
                </ol>
            </div>
            <div class="col-sm-6 ">
                <a href="{{ route('add-state') }}" class="btn  bg-gradient-info float-right"  >Add New State</a>
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
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allStates as $state)
                            <tr>
                                <td>
                                    {{$state->name}}
                                </td>
                                <td>
                                    <select class="custom-select change_state_status" data-state="{{$state->id}}">
                                        <option value="1" {{$state->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$state->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('edit-state',$state->id)}}" class="mx-1" title="Edit State">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete-state',$state->id)}}" style="margin-left: 15px;" class="delete-state mx-1" data-state="{{$state->id}}"  title="Delete State" onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
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
    $(document).on('change', '.change_state_status', function(event) {
        let state=$(this).data('state');
        let value=$(this).children('option:selected').val()
        $.ajax({
              url: '{{route('update-state-status')}}',
              type: 'PUT',
              data:{state:state,'_token':'{{csrf_token()}}',status:value},
              success:function(result){
                  show_success(result.message,"success")
              }
        });
    }); 
});
</script>
@endsection

