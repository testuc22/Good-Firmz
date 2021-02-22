@extends('admin.layouts.default')

@section('title','Product List')

@section('content')

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Product List</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Product List</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

<section class="content">

      <div class="row">

        <div class="col-12">

            <div class="card">

            <div class="card-header">

              {{-- <h3 class="card-title">All Categories</h3> --}}

              <a href="{{ route('add-product') }}" class="btn  bg-gradient-info" >Add New Product</a>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Product</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>

                </thead>

                <tbody>

                    @foreach($products as $product)

                <tr>

                  <td>{{$product->productName}}</td>

              
                  <td>{{-- <a href="{{route('get-edit-product',$product->id)}}"><i class="fas fa-edit fa-2x"></i></a> --}}

                    {{-- <a href="javascript:void(0)" style="margin-left: 15px;" class="delete-category" data-category="{{$product->id}}"><i class="fas fa-trash-alt fa-2x" style="color: red;"></i></a> --}}
                </td>
                    <td>
                      <select class="custom-select show_category_in_menu" data-category="{{$product->id}}">
                        <option value="1" {{$product->status==1 ? 'selected' :'' }}>Show</option>
                        <option value="0" {{$product->status==0 ? 'selected' :'' }}>Hide</option>
                      </select>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Product</th>
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
        url:'{{route('update-product-status')}}',
        type: 'PUT',
        data:{category:category,'_token':'{{csrf_token()}}',status:value},
        success:function(result){
            show_success(result.message)
        }
    });
    }); 

    $(document).on('click', '.delete-category', function(event) {
        let category=$(this).data('category');
          let _parent=$(this).parents('tr');
          $.ajax({
            
            type: 'GET',
            data:{category:category},
            success:function(result){
                show_success(result.message)
                _parent.fadeOut('slow')
            }
        });
    });
  });
</script>
@endsection
