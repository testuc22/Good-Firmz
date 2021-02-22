@extends('front.layouts.default')
@section('title')
B2B-Seeker - Reviews
@endsection
@section('content')
<div class="page-title">
	<div class="container">
		<h2>Reviews</h2>
	</div>
</div>
<div class="my-account-content">
	<div class="container">
		<div class="row">
			@include('front.includes.sidebar')
			<div class="col-lg-8 col-md-6">
				<div class="my-account">
						@if(count($sellers))
							@foreach($sellers as $seller)
								@if(!empty($seller->seller_reviews))
									<table id="example1" class="table table-bordered table-striped">
										<thead>
				                            <tr>
				                                <th>Name</th>
				                                <th>Email</th>
				                                <th>Rating</th>
				                                <th>Status</th>
				                                <th>Actions</th>
				                            </tr>
				                        </thead>
				                        <tbody>
											@foreach($seller->seller_reviews as $key=>$review)
												{{-- @include('front.seller.block_review_details') --}}
												<tr>
													<td>{{$review->name}}</td>
													<td>{{$review->email}}</td>
													<td><span class="seller_showRating" data-rating="{{$review->stars}}"></span></td>
													 <td>
					                                    <select class="custom-select change_review_state" data-review="{{$review->id}}">
					                                        <option value="1" {{$review->status==1 ? 'selected' :'' }}>Show</option>
					                                        <option value="0" {{$review->status==0 ? 'selected' :'' }}>Hide</option>
					                                    </select>
					                                </td>
													<td>
														<a href="javascript:;" data-phone="{{$review->phone_number}}" data-review="{{$review->review}}" class="view-user-review">
															<i class="fa fa-eye"></i>
														</a>
														<a href="{{ route('delete-business-review',$review->id)}}" style="margin-left: 15px;" class="delete-category mx-1" title="Delete Review" onclick="return confirm('Are you sure, you want to delete this?');">
					                                        <i class="fas fa-trash-alt fa-2x" style="color: red;"></i>
					                                    </a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								@else
									<div class="col-sm-12">
										<p>No reviews yet.</p>
									</div>
								@endif
							@endforeach
						@else
							<div class="col-sm-12">
								<p>No reviews yet.</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b2bseeker-view-review b2b_modal_wrapper">
	<div class="send-enquiry">
		<div class="b2b_modal_content">
			<form class="send-enquiry-form">
				<a class="close-icon" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class="review_info_content">
					<label>Phone NUmber:</label>
					<p id="content-user-phone"></p>
				</div>
				<div class="review_info_content">
					<label>Review:</label>
					<p id="content-user-review"></p>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
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
    });
</script>
@endsection