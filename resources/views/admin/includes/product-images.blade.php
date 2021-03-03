<form id="form" method="post">
    <div id="uploader">
        
    </div>
</form>
<div>
    <div id="msg"></div>
    <div class="row">
        @foreach($product->productImages as $image)
        <div class="col-md-4" id="{{$image->id}}" data-thumb="{{$image->id}}">
            <div class="product-image">
                <img src="{{ asset('public/uploads/products/'.$image->image)}}" height="100" width="100">
            </div>
            <div class="delete-product-image-wrap">
                <a href="javascript:;" id="image" data-thumb="{{$image->id}}" class="delete-product-image" onclick="deleteImage();"><i class="fas fa-times-circle"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@section('scripts')
    <script>
        /*$(document).ready(function(){
            alert('ok');
        })*/
        function deleteImage(){
            var id = $('#image').data('thumb');
            var url = '{{route('delete-product-image', ['id'=>':id'])}}';
            url = url.replace(':id', id);
            $.ajax({
                url:url,
                type:'GET',
                success:function(data){
                    $('#msg').append('<div class="alert alert-success">'+data+'</div>');
                    setTimeout(function() {
                        $('#msg').slideUp(500);
                        window.location.href = '{{route('list-products')}}';     
                    }, 1000);
                    console.log(data);
                },
                error:function(error) {
                    console.log(error);
                }
            })
        }
    </script>
@endsection