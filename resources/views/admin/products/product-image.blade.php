@extends('admin.layouts.default')

@section('title','Product List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Product Image Listing</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Image</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('list-products') }}" class="float-right btn btn-info btn-sm">Back To Listing</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('product-image.store') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
                                    @csrf
                                    {{--<div class="fallback">
                                      <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
                                    </div>--}}
                                    <input type="hidden" name="product_id" value="{{$id}}">
                                </form>
                                <button type="button" id="upload" class="btn btn-info btn-sm mt-2">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", { 
            autoProcessQueue: false,
            maxFilesize: 2,
            parallelUploads:10,
            addRemoveLinks: true,
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        });
        $('#upload').click(function(){
            myDropzone.processQueue();
            setTimeout(function() {
                window.location.href = '{{route('list-products')}}';     
            }, 2000);
        })
    </script>
@endsection
