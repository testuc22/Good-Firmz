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
                    <a href="{{ route('admin-add-product') }}" class="float-right btn btn-info btn-sm">Add Product</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Seller Company</th>
                                <th>Price</th>
                                <th>Meta Title</th>
                                <th>Meta Tags</th>
                                <th>Meta Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->seller->name}}</td>
                                    <td>{{$product->price}} / per</td>
                                    <td>{{$product->meta_title}}</td>
                                    <td>{{$product->meta_tags}}</td>
                                    <td>{{$product->meta_desc}}</td>
                                    <td>
                                        <select class="custom-select show_product_in_menu" data-product="{{$product->id}}">
                                        <option value="1" {{$product->status==1 ? 'selected' :'' }}>Active</option>
                                        <option value="0" {{$product->status==0 ? 'selected' :'' }}>Deactive</option>
                                        </select>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin-edit-product', ['id'=>$product->id])}}" class="mx-1" title="Edit Category">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete-product', ['id'=>$product->id]) }}" style="margin-left: 15px;" class="delete-category mx-1" onclick="event.preventDefault();
                                     document.getElementById('delete-product').submit();">
                                            <i class="fas fa-trash-alt" style="color: red;"></i>
                                        </a>
                                        <form id="delete-product" method="POST" action="{{ route('delete-product', ['id'=>$product->id]) }}" style="display: none;"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit">Delete</button>
                                        </form>
                                        <a href="{{ route('admin-add-product-image', ['id'=>$product->id])}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-plus"></i> Image
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Product</th>
                            <th>Seller Company</th>
                            <th>Price</th>
                            <th>Meta Title</th>
                            <th>Meta Tags</th>
                            <th>Meta Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(document).on('change', '.show_product_in_menu', function(event) {
      let product=$(this).data('product');
      let value=$(this).children('option:selected').val()
      $.ajax({
          url:'{{route('update-product-status')}}',
          type: 'PUT',
          data:{product:product,'_token':'{{csrf_token()}}',status:value},
          success:function(result){
              show_success(result.message)
          }
      });
    }); 
  });
</script>
@endsection
