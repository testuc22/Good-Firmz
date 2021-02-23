@extends('admin.layouts.default')
@section('title','Banner List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banner List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Banner List</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('add-banner') }}" class="btn  bg-gradient-info float-right" >Add New Banner</a>
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
                                <th>
                                    <input type="checkbox" name="check_all" class="checkAllBoxes">
                                </th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($banners) > 0)
                                @foreach($banners as $banner)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="box_id[]" value="{{$banner->id}}" class="checkBox">
                                    </td>
                                    <td>
                                        <img style="width: 200px;" src="{{ asset('public/banner_images/'.$banner->image) }}">
                                    </td>
                                    <td>
                                    <select class="custom-select show_banner_in_menu" data-banner="{{$banner->id}}">
                                        <option value="1" {{$banner->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$banner->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                    <td>
                                        <a href="{{route('delete-banner',$banner->id)}}" style="margin-left: 15px;" class="delete-banner mx-1"  title="Delete banner" onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" class="checkAllBoxes">
                                </th>
                                <th>Image</th>
                                
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
      $(document).on('change', '.show_banner_in_menu', function(event) {
        let banner=$(this).data('banner');
        let value=$(this).children('option:selected').val()
        $.ajax({
              url: '{{route('update-banner-status')}}',
              type: 'PUT',
              data:{banner:banner,'_token':'{{csrf_token()}}',status:value},
              success:function(result){
                  show_success(result.message,"success");
              }
          });
      }); 
    
    });
</script>
@endsection

