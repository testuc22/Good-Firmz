@extends('admin.layouts.default')
@section('title','Category List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category List</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('add-category') }}" class="btn  bg-gradient-info float-right" >Add New Category</a>
                <a href="{{ route('export-categories') }}" class="btn  bg-gradient-danger float-right mr-2" >Export</a>
                <form method="post" action="{{ route('import-categories') }}" enctype="multipart/form-data" class="form-inline float-right mt-2">
                    @csrf
                    <input type="file" name="csvFile" required class="form-control">
                    <button class="btn  bg-gradient-warning mr-2">Import</button>
                </form>
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
                @include('admin.categories.filters')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" class="checkAllBoxes">
                                </th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" name="box_id[]" value="{{$category->id}}" class="checkBox">
                                </td>
                                <td>
                                    @if($category->image)
                                    <img style="width: 200px;" src="{{ asset('public/category_images/'.$category->image) }}">
                                    @else
                                    <p class="text-center">-</p>
                                    @endif
                                </td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <select class="custom-select show_category_in_menu" data-category="{{$category->id}}">
                                        <option value="1" {{$category->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$category->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('list-child-categories',$category->id)}}" class="mx-1 text-success" title="View Child Categories">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="{{route('edit-category',$category->id)}}" class="mx-1" title="Edit Category">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="{{route('delete-category',$category->id)}}" style="margin-left: 15px;" class="delete-category mx-1" data-category="{{$category->id}}"  title="Delete Category" onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" class="checkAllBoxes">
                                </th>
                                <th>Image</th>
                                <th>Category</th>
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
      $(document).on('change', '.show_category_in_menu', function(event) {
        let category=$(this).data('category');
        let value=$(this).children('option:selected').val()
        $.ajax({
              url: '{{route('update-status')}}',
              type: 'PUT',
              data:{category:category,'_token':'{{csrf_token()}}',status:value},
              success:function(result){
                  show_success(result.message,"success");
              }
          });
      }); 
    
    });
</script>
@endsection

