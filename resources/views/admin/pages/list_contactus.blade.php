@extends('admin.layouts.default')
@section('title','Contact us List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact us List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact us List</li>
                </ol>
            </div>
            {{-- <div class="col-sm-6 ">
                <a href="#" class="btn  bg-gradient-info float-right"  >Add New Page</a>
            </div> --}}
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
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>
                                    {{$row->name}}
                                </td>
                                <td>
                                    {{$row->email}}
                                </td>
                                <td>
                                    {{$row->phone_number}}
                                </td>
                                <td>
                                    <input type="hidden" name="viewMessageInput" id="viewMessageInput{{$row->id}}" value="{{$row->message}}">
                                    <a href="javascript:;" class="mx-1 text-success viewMessage" data-id="{{$row->id}}" title="View Message">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="showMessageModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(document).on('click','.viewMessage',function(){
            var id = $(this).data('id');
            var message = $('#viewMessageInput'+id).val();
            $('#showMessageModal').find('.modal-body').html(message);
            $('#showMessageModal').modal('show');
        })
});
</script>
@endsection

