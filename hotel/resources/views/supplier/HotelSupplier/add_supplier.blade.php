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
    display: contents;
    margin-top: 20px;
}

.close-icon {
    border-radius: 50%;
    position: absolute;
    right: 5px;
    top: -10px;
    padding: 5px 8px;
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


<div class="d-flex">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header" style="margin-left:auto;margin-right:auto;">
                        <h3 class="card-title"> Add Supplier</h3>
                        <!-- <button type="button" class="btn btn-primary mt-5 mb-5 pl-5 pr-5">Edit</button> -->
                    </div>
                    <!--begin::Form-->
                    <form class="form" id="frm1" action="{{ url('supplier/addSuppliersData/') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Supplier Name :</label>
                                    <div class="input-group">
                                        <input type="text" name="supplier_name" id="supplier_name" class="form-control"
                                            placeholder="Enter Supplier name" value="{{ $Supplier->company_name }}">
                                    </div>
                                    @if ($errors->has('supplier_name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('supplier_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <label>Supplier Sub Heading :</label>--}}
                                {{--                                        <div class="input-group">--}}
                                {{--                                            <input type="text" name="sub_heading" class="form-control"--}}
                                {{--                                                   placeholder="Enter Sub Heading"--}}
                                {{--                                                   value="">--}}
                                {{--                                        </div>--}}
                                {{--                                        @if ($errors->has('sub_heading'))--}}
                                {{--                                            <span class="text-danger">--}}
                                {{--                              <strong>{{ $errors->first('sub_heading') }}</strong>--}}
                                {{--                           </span>--}}
                                {{--                                        @endif--}}
                                {{--                                    </div>--}}
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="country">Country :</label>
                                    <select id="country" class="form-control" name="country">
                                        <option value="">Select</option>
                                        @foreach($Country as $c)
                                        <option value="{{$c->id}}" @if($Supplier && $Supplier->country ==
                                            $c->id) selected @endif>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--                                <div class="form-group row">--}}
                            {{--                     <div class="col-lg-6">--}}
                            {{--                        <label>Location :</label>--}}
                            {{--                        <div class="input-group">--}}
                            {{--                           <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{  $supplierData->location ?? '' }}">--}}
                            {{--                        </div>--}}
                            {{--                        @if ($errors->has('location'))--}}
                            {{--                           <span class="text-danger">--}}
                            {{--                              <strong>{{ $errors->first('location') }}</strong>--}}
                            {{--                           </span>--}}
                            {{--                        @endif--}}
                            {{--                     </div>--}}

                            {{--                                </div>--}}
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="state">State :</label>
                                    <select id="state" class="form-control" name="state">
                                        <option value="">Select</option>
                                        @foreach($State as $st)
                                        <option value="{{$st->id}}" @if($supplierData && $supplierData->state ==
                                            $st->id) selected @endif>{{$st->name}}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('state'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="city">City :</label>
                                    <select id="city" class="form-control" name="city">
                                        <option value="">Select</option>
                                        @foreach($City as $ci)
                                        <option value="{{$ci->id}}" @if($Supplier && $Supplier->city == $ci->id)
                                            selected @endif>{{$ci->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address_address">Address</label>
                                <input type="text" id="address-input" name="address_address"
                                    value="{{ $supplierData->location ?? '' }}" class="form-control map-input">
                                <input type="hidden" name="address_latitude" id="address-latitude"
                                    value="{{ $supplierData->lat ?? '' }}" />
                                <input type="hidden" name="address_longitude" id="address-longitude"
                                    value="{{ $supplierData->long ?? '' }}" />
                            </div>
                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Landline Number :</label>
                                    <div class="input-group">
                                        <input type="text" name="landline_number" class="form-control"
                                            placeholder="Enter Phone Number" value="{{ $Supplier->landline_no }}">
                                    </div>
                                    @if ($errors->has('phone_number'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Mobile Number :</label>
                                    <div class="input-group">
                                        <input type="text" name="mobile_number" class="form-control"
                                            placeholder="Enter Phone Number" value="{{ $Supplier->mobile_no }}">
                                    </div>
                                    @if ($errors->has('phone_number'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="exampleInputPassword1">Main image to be shown on the platform
                                        :</label>
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
                                <div class="col-lg-2">
                                    @if($supplierData)
                                    <img src="{{ asset('uploads/hotels_featured_images/'.$supplierData->featured_image) }}"
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

                                <div class="col-lg-4">
                                    <label for="exampleInputPassword1">More pictures of the supplier :</label>
                                    <div class="custom-file">
                                        <input type="file" class="bannerimage" name="bimage" id="banner_img"
                                            accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="banner_img" value=""
                                            style="overflow: hidden;">Choose file</label>
                                    </div>
                                    @if ($errors->has('bimage'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('bimage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    @if($supplierData)
                                    <img src="{{ asset('uploads/hotels_banner_images/'.$supplierData->banner_img) }}"
                                        alt="image">
                                    @endif
                                </div>
                                <div class="modal fade" id="bmodal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel2" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel2">Crop Images </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <img id="bimage"
                                                                src="https://avatars0.githubusercontent.com/u/3456749">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="preview" id="preview2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary" id="bcrop">Crop
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="gallery_images">Gallery Image:</label>
                                    <div class="custom-file">
                                        <input type="file" class="galleryimage" name="gimage[]" multiple
                                            id="gallery_images" accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="gallery_images"
                                            style="overflow: hidden;">Choose file</label>
                                    </div>
                                </div>
                                @if ($errors->has('gimage'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('gimage') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class='list-group gallery'>
                                    {{--            @if($galleryimage->count())--}}
                                    @foreach($gallery_images as $image)
                                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                        <a class="thumbnail fancybox" rel="ligthbox"
                                            href="uploads/hotels_gallery_images/{{ $image->image }}"
                                            data-fancybox="images">
                                            <img src="{{ asset('uploads/hotels_gallery_images/'.$image->image) }}"
                                                class="img-responsive" alt="gallery" /><br>
                                        </a>
                                        <a href="{{ url('supplier/image-gallery',$image->id,$supplierData->id) }}">
                                            <input type="hidden" name="image_delete" value="$image->id">
                                            <!-- <button type="button" class="close-icon btn btn-sm">
                                                <i class="fa fa-remove"></i></button> -->
                                        </a>
                                    </div>
                                    @endforeach
                                    {{--            @endif--}}

                                </div>
                            </div>
                            <div class="modal fade" id="gmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
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
                                                        <img id="gimage"
                                                            src="https://avatars0.githubusercontent.com/u/3456749">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="preview" id="gallerypreview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary" id="gcrop">Crop
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Services/Products :</label>
                                    <select id="services" class="form-control" name="services" required="">
                                        <option value="">Select</option>

                                        @foreach($supplierType as $supplier)

                                        <option value="{{$supplier->id}}" @if($supplierData) @if($supplierData->services == $supplier->id)
                                            selected
                                            @endif @endif>{{$supplier->title}}</option>

                                        @endforeach

                                    </select>
                                    @if($errors->has('services'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('services') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Payment Method :</label>
                                    <select id="payment" class="form-control" name="payment_method" required="">
                                        <option value="">Select</option>
                                        <option value="cash" @if($supplierData) @if($supplierData->
                                            supported_payment_method == 'cash')
                                            selected
                                            @endif
                                            @endif>Cash</option>
                                        <option value="online" @if($supplierData) @if($supplierData->
                                            supported_payment_method == 'online')
                                            selected
                                            @endif
                                            @endif>Online</option>
                                    </select>
                                    @if ($errors->has('payment_method'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Email :</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email-id"
                                           value="{{ $Supplier->email }}">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Brand :</label>
                                    <div class="input-group">
                                        <input type="text" name="brand" class="form-control" placeholder="Brand"
                                            @if($supplierData) value="{{ $supplierData->brand }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('brand'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Line of Business :</label>
                                    <div class="input-group">
                                        <input type="text" name="business" class="form-control"
                                            placeholder="Line of Business" @if($supplierData)
                                            value="{{ $supplierData->line_of_business }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('business'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('business') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Facebook Link :</label>
                                    <div class="input-group">
                                        <input type="text" name="facebook" class="form-control"
                                            placeholder="Facebook Link" @if($supplierData)
                                            value="{{ $supplierData->facebook }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('facebook'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Instagram Link :</label>
                                    <div class="input-group">
                                        <input type="text" name="instagram" class="form-control"
                                            placeholder="Instagram Link" @if($supplierData)
                                            value="{{ $supplierData->instagram }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('instagram'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Twitter Link :</label>
                                    <div class="input-group">
                                        <input type="text" name="twitter" class="form-control"
                                            placeholder="Twitter Link" @if($supplierData)
                                            value="{{ $supplierData->twitter }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('twitter'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Youtube Link :</label>
                                    <div class="input-group">
                                        <input type="text" name="youtube" class="form-control"
                                            placeholder="Youtube Link" @if($supplierData)
                                            value="{{ $supplierData->you_tube }}" @else value="" @endif>
                                    </div>
                                    @if ($errors->has('youtube'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Website :</label>
                                    <div class="input-group">
                                        <input type="text" name="website" class="form-control" placeholder="Website"
                                            @if($supplierData) value="{{ $supplierData->website }}" @else value=""
                                            @endif>
                                    </div>
                                    @if ($errors->has('website'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Description :</label>
                                    <textarea name="description" id="description"
                                        class="form-control required summernote" cols="30" rows="10">
                                        {{ $supplierData->description ?? '' }}
                                    </textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Summary :</label>
                                    <textarea name="summary" id="summary" class="form-control required summernote"
                                        cols="30" rows="10">
                                        {{ $supplierData->summary ?? '' }}
                                    </textarea>
                                    @if ($errors->has('summary'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Would you like to be featured ? </label>
                                        <div class="radio-inline">
                                            <label class="radio">
                                                <input type="radio" @if($supplierData && $supplierData->is_featured
                                                ==
                                                1) checked
                                                @endif value='1' name="is_featured">
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio">
                                                <input type="radio" @if($supplierData && $supplierData->is_featured
                                                ==
                                                0) checked
                                                @endif value='0' name="is_featured">
                                                <span></span>
                                                No
                                            </label>
                                            &nbsp; &nbsp; ( Applicable charges of 4000 AED to be charged every 3
                                            months )
                                        </div>

                                        @if ($errors->has('is_featured'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('is_featured') }}</strong>
                                        </span>
                                        @endif
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
        debugger
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
        debugger
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
        
            $("#frm1").validate({
                // errorClass : "abc",
                // rules:{
                //     description: {
				// 			required: true,
				// 			minlength: 50
				// 		},
                //     summary: {
				// 			required: true,
				// 			minlength: 50
				// 		},
                //     supplier_name:{
                //         required:true,
                //         minlength:15,
                //         },
                //     country:{
                //         required:true
                //     }        
				// 	},
            })
        })
    </script>
@endsection