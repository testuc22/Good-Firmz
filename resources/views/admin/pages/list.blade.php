@extends('admin.layouts.default')
@section('title','Pages List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pages List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pages List</li>
                </ol>
            </div>
            <div class="col-sm-6 ">
                <a href="{{ route('add-page') }}" class="btn  bg-gradient-info float-right"  >Add New Page</a>
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
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allPages as $page)
                            <tr>
                                <td>
                                    @if($page->featured_image)
                                    <img style="width: 200px;" src="{{ asset('public/page_images/'.$page->featured_image) }}">
                                    @else
                                    <p class="text-center">-</p>
                                    @endif
                                </td>
                                <td>
                                    {{$page->title}}
                                </td>
                                <td>
                                    <select class="custom-select change_page_status" data-page="{{$page->id}}">
                                        <option value="1" {{$page->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$page->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('page',$page->slug)}}" target="_blank" class="mx-1 text-success" title="View Page">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="{{route('edit-page',$page->id)}}" class="mx-1" title="Edit Page">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="{{route('delete-page',$page->id)}}" style="margin-left: 15px;" class="delete-page mx-1" title="Delete Page" onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
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
    $(document).on('change', '.change_page_status', function(event) {
        let page=$(this).data('page');
        let value=$(this).children('option:selected').val()
        $.ajax({
              url: '{{route('update-page-status')}}',
              type: 'PUT',
              data:{page:page,'_token':'{{csrf_token()}}',status:value},
              success:function(result){
                  show_success(result.message,"success")
              }
        });
    }); 
});
</script>
@endsection

