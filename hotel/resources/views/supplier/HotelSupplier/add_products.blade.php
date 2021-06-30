@extends('supplier.layout.main')
@section('content')

<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
        integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
        integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    @if(isset($isactive) && $isactive == 0)
    <script>
    console.log("ABC");
    $(function() {
        $('#verify-email').modal('show');
        $('#verify-email').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    </script>
    @endif
</head>
<style type="text/css">
.gallery {
    display: inline-block;
    margin-top: 20px;
}

.close-icon {
    border-radius: 50%;
    position: absolute;
    right: 5px;
    top: -10px;
    padding: 5px 8px;
}

.form-image-upload {
    background: #e8e8e8 none repeat scroll 0 0;
    padding: 15px;
}

img {
    display: block;
    max-width: 100%;
}

.preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg {
    max-width: 1000px !important;
}

body.modal-open {
    height: 100vh;
    overflow-y: hidden !important;
}
</style>

<div class="modal fade in" id="verify-email" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="verify-email">
    <div class="wrapper">
        <div class="inner">
            <div class="modal-dialog" style="width: 50%;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center">Verification</h4>
                    </div>
                    <div class="modal-body">
                        Please verify your email before adding hotel details.<br>
                        <a href="/">Go back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="subheader py-2  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1" style="margin-left: -650px;">
            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Breadcrumb-->
                <div class="d-flex align-items-center font-weight-bold my-2">
                    <!--begin::Item-->
                    <a href="#" class="opacity-75 hover-opacity-100"> <i
                            class="flaticon2-shelter text-dark icon-1x"></i> </a>
                    <!--end::Item-->
                    <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Hotel Details </a>
                    <!--end::Item-->
                    <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href=""
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Hotel List</a>
                    <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Add Hotel</a>
                    <!--end::Item-->
                </div>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Info-->
        <button class="btn btn-primary font-weight-bold btn-pill" onclick="history.back(-1)">
            <i class="fas fa-arrow-left"></i></i> Back
        </button>
    </div>
</div>
</div>
<div class="d-flex">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header" style="margin-left:auto;margin-right:auto;">
                        <h3 class="card-title"> Update Products</h3>
                        <!-- <button type="button" class="btn btn-primary mt-5 mb-5 pl-5 pr-5">Edit</button> -->
                    </div>
                    <!--begin::Form-->
                    <form class="form" action="{{ url('supplier/addProductsData/') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="id" value=@if($product_id) "{{ $product_id }}" @else ''
                                        @endif>
                                    <label>Product Name :</label>
                                    <div class="input-group">
                                        <input type="text" name="product_name" class="form-control"
                                            placeholder="Enter Product name"
                                            value=@if($productData)"{{ $productData->products }}" @else '' @endif>
                                    </div>
                                    @if ($errors->has('product_name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Product Cost :</label>
                                    <div class="input-group">
                                        <input type="number" name="product_cost" class="form-control"
                                            placeholder="Product Cost"
                                            value=@if($productData) "{{ $productData->cost }}" @else '' @endif>
                                    </div>
                                    @if ($errors->has('product_cost'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('product_cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Discount (in %) :</label>
                                    <div class="input-group">
                                        <input type="number" name="discount" class="form-control" placeholder="Discount"
                                            value=@if($productData) "{{ $productData->discount_offer }}" @else ''
                                            @endif>
                                    </div>
                                    @if ($errors->has('discount'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="exampleInputPassword1">Product Image: </label>
                                    <div class="custom-file">
                                        <input type="file" class="featuredimage" name="fimage" id="featured_image"
                                            accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="featured_image" value=""
                                            style="overflow: hidden;">Choose file</label>
                                    </div>
                                    @if ($errors->has('fimage'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('fimage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    @if($productData)
                                    <img src="{{ asset('uploads/hotels_featured_images/'.$productData->image) }}"
                                        alt="image">
                                    @endif
                                </div>
                                <div class="modal fade" id="fmodal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel1">Crop Images </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <img id="fimage"
                                                                src="https://avatars0.githubusercontent.com/u/3456749">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="preview" id="preview1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary" id="fcrop">Crop
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Description about your products :</label>
                                    <textarea name="description" id="description"
                                        class="form-control required summernote" cols="30" rows="10">@if($productData) {{ $productData->description }} @else {{''}} @endif
                                    </textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <strong></strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Summary :</label>
                                    <textarea name="summary" id="summary" class="form-control required summernote"
                                        cols="30" rows="10">@if($productData) {{ $productData->summary }} @else {{''}} @endif
                                    </textarea>
                                    @if ($errors->has('summary'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Crop Gallery Image </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img id="image"
                                                        src="https://avatars0.githubusercontent.com/u/3456749">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary" id="crop">Crop
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <button type="reset" class="btn btn-secondary"><a href="">Cancel</a></button>

                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('pageScript')


<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUlGhRghOm7Q-x8rsHTFqzLT1DRjSOhSo&libraries=places&callback=initialize"
    async defer></script>
<script src="/js/mapInput.js"></script>

<script type="text/javascript">
$('#capacity_attributes').DataTable({
    "responsive": true
});
$(document).ready(function() {
    $('#featured_image').change(function() {
        var i = $(this).next('label').clone();
        var name = $('#featured_image')[0].files[0].name;
        console.log(name);
        $(this).next('label').text(name);
    });
    $('#gallery_images').change(function() {
        var i = $(this).next('label').clone();
        var names = [];
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            names.push($(this).get(0).files[i].name);

            $(this).next('label').text(names);
        }
        console.log(names);
    });
    $('#banner_img').change(function() {
        var i = $(this).next('label').clone();
        var name = $('#banner_img')[0].files[0].name;
        console.log(name);
        $(this).next('label').text(name);
    });
});

$(document).ready(function() {
    var $modal = $('#fmodal');
    var image = document.getElementById('fimage');
    var cropper;
    $("body").on("change", ".featuredimage", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            viewMode: 3,
            preview: '#preview1'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    $("#fcrop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/supplier/featuredImageUpload',
                    data: {
                        '_token': $('meta[name="_token"]').attr('content'),
                        'fimage': base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        alert("success upload image");
                    }
                });
            }
        });
    })
});

$(document).ready(function() {
    var $modal = $('#bmodal');
    var image = document.getElementById('bimage');
    var cropper;
    $("body").on("change", ".bannerimage", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            viewMode: 3,
            preview: '#preview2'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    $("#bcrop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/supplier/bannerImageUpload',
                    data: {
                        '_token': $('meta[name="_token"]').attr('content'),
                        'bimage': base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        alert("success upload image");
                    }
                });
            }
        });
    })
});
$(document).ready(function() {
    var $modal = $('#gmodal');
    var image = document.getElementById('gimage');
    var cropper;
    $("body").on("change", ".galleryimage", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            viewMode: 3,
            preview: '#gallerypreview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    $("#gcrop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/supplier/galleryImageUpload',
                    data: {
                        '_token': $('meta[name="_token"]').attr('content'),
                        'gimage': base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        alert("success upload image");
                    }
                });
            }
        });
    })
});
</script>
@endsection