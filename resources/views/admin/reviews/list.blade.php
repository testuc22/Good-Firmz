@extends('admin.layouts.default')
@section('title','Reviews List')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reviews List</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Reviews List</li>
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
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Seller</th>
                                <th>User</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <td>{{$review->seller->name}}</td>
                                <td>{{$review->name}}</td>
                                <td>{{ Str::words($review->review, 6, '...') }}</td>
                                <td class="rating_block_{{$review->id}}">
                                    
                                </td>
                                <td>
                                    <select class="custom-select change_review_state" data-review="{{$review->id}}">
                                        <option value="1" {{$review->status==1 ? 'selected' :'' }}>Show</option>
                                        <option value="0" {{$review->status==0 ? 'selected' :'' }}>Hide</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="viewReviewInput" id="viewReviewInput{{$review->id}}" value="{{$review->review}}">
                                    <a href="javascript:;" class="mx-1 text-success viewReview" data-id="{{$review->id}}" title="View Review">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="{{ route('delete-review',$review->id) }}" style="margin-left: 15px;" class="delete-category mx-1" title="Delete Review"  onclick="return confirm('Are you sure, you want to delete this?');">
                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Seller</th>
                                <th>User</th>
                                <th>Review</th>
                                <th>Rating</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="showReviewModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review</h5>
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
<script src="{{asset('front/js/rating.js')}}"></script>
<script type="text/javascript">
    var reviews = @json($reviews);
    console.log(reviews,"reviews");
    jQuery(document).ready(function($) {
        $(document).on('change', '.change_review_state', function(event) {
            let review=$(this).data('review');
            let value=$(this).children('option:selected').val()
            $.ajax({
                url: '{{route('update-review-status')}}',
                type: 'PUT',
                data:{review:review,'_token':'{{csrf_token()}}',status:value},
                success:function(result){
                    show_success(result.message,"success")
                }
            });
        });
        $(document).on('click','.viewReview',function(){
            var id = $(this).data('id');
            var review = $('#viewReviewInput'+id).val();
            $('#showReviewModal').find('.modal-body').html(review);
            $('#showReviewModal').modal('show');
        })
                                    
        reviews.forEach(function(review){
            $(".rating_block_"+review.id).rating({
                value: review.stars,
                stars: 5,
                emptyStar: "far fa-star-o",
                halfStar: "fas fa-star-half-o",
                filledStar: "fas fa-star",
                color: "#feaf17",
                half: true,
                readonly:true
            });
        })                      

    });
</script>
@endsection

