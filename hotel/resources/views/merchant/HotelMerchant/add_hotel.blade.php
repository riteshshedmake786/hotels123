@extends('merchant.layout.main')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
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

.single_gallery
{
	height:40px ! important;
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
                    <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                        href="{{ url('merchant/hotelMerchantList') }}"
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
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Hotel

                        </h3>
                        <button type="button" class="btn btn-primary mt-5 mb-5 pl-5 pr-5">Edit</button>
                    </div>

                    <!--begin::Form-->
                    <form class="form" action="{{ url('merchant/hotel/addHotelsMerchantData/') }}" method="post"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Hotel Name :</label>
                                    <div class="input-group">
                                        <input type="text" name="hotel_name" class="form-control"
                                            placeholder="Enter Hotel name" value="{{ $Merchant->company_name }}">
                                    </div>
                                    @if ($errors->has('hotel_name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('hotel_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <label>Hotel Sub Heading :</label>--}}
                                {{--                                        <div class="input-group">--}}
                                {{--                                            <input type="text" name="sub_heading" class="form-control"--}}
                                {{--                                                   placeholder="Enter Sub Heading"--}}
                                {{--                                                   value="{{ $hotelsData->sub_heading ?? '' }}">--}}
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
                                        @foreach($Countri as $c)
                                        <option @if($Merchant && $Merchant->country == $c->id) selected
                                            @endif value="{{$c->id}}">{{$c->name}}</option>
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
                            {{--                           <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{ $hotelsData->location ?? '' }}">--}}
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
                                        <option value="{{$st->id}}" @if($hotelsData && $hotelsData->state == $st->id)
                                            selected @endif>{{$st->name}}</option>
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
                                        <option value="{{$ci->id}}" @if($Merchant && $Merchant->city == $ci->id)
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
                                    value="{{ $hotelsData->location ?? '' }}" class="form-control map-input">
                                <input type="hidden" name="address_latitude" id="address-latitude"
                                    value="{{ $hotelsData->lat ?? '' }}" />
                                <input type="hidden" name="address_longitude" id="address-longitude"
                                    value="{{ $hotelsData->long ?? '' }}" />
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
                                            placeholder="Enter Phone Number" value="{{ $Merchant->landline_no }}">
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
                                            placeholder="Enter Phone Number" value="{{ $Merchant->mobile_no }}">
                                    </div>
                                    @if ($errors->has('phone_number'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
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
                                        The main image field is required.
                                        <strong>{{ $errors->first('fimage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    @if($hotelsData)
                                    <img src="{{ asset('uploads/hotels_featured_images/'.$hotelsData->featured_image) }}"
                                        alt="image">
                                    @endif
                                </div>
                            </div>
                            <div class="modal fade" id="fmodal" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel1">Crop Images </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary" id="fcrop">Crop
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="exampleInputPassword1">More pictures of the hotel :</label>
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
                                <div class="col-lg-6">
                                    @if($hotelsData)
                                    <img src="{{ asset('uploads/hotels_banner_images/'.$hotelsData->banner_img) }}"
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
                                <div class="col-lg-12">
								
								<table id="gallerytable" class="table table-hover">
                                 <thead>
                                     <tr>
                                         <th>Gallery</th>
                                        
                                         
                                     </tr>
                                 </thead>
                                 <tbody>
								 								 								
	 
                                 		<tr id="gallerytable-row">
                                         <td width="55%">
										  
										  
										  <input type="file" name="gallery[]"    placeholder="Gallery" class="form-control single_gallery">
         
									
										 </td>
                                         
                                        
                                         <td class="mt-10"><button type="button" onclick="addgallery();" class="btn btn-success"><i class="fa fa-plus"></i> </button></td>
                                     </tr>
                                 </tbody>
                             </table>
							 
							
								</div>
							 </div>
							 
							 
							 <div class="form-group row">
                                <div class="col-lg-12">
								
								 <?php
							 if($gallery_images)
							 {
								foreach($gallery_images as $gallery_image)
								{								
								 ?>
								
								 
								 <div class="col-lg-3 " style="float:left">
								  <div style="margin:30px">
								   <?php
                                    if($gallery_image->image)
									{
										?>
										     <img src="<?php echo asset("uploads/hotels_gallery_images/$gallery_image->image") ?>"
											 
                                        alt="image">
										<?php
									}
                               
                                 ?>
								 </div>
								 
                                </div>
							 
							 <?php
								}
							 }
                             ?>							 
							 
								
							 </div>
							 </div>

							 
							
							
							
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Description about your hotel :</label>
                                    <textarea name="description" id="description"
                                        class="form-control required summernote" cols="30" rows="10">
                            {{ $hotelsData->description ?? '' }}
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
                            {{ $hotelsData->summary ?? '' }}
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
                                                <input type="radio" @if($hotelsData && $hotelsData->is_featured == 1)
                                                checked
                                                @endif value='1' name="is_featured">
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio">
                                                <input type="radio" @if($hotelsData && $hotelsData->is_featured == 0)
                                                checked
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
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="licence">Upload trade licence (Only PDF File):</label>
                                    <input id="licence"
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        placeholder="Upload trade licence" type="file" name="m_img" autocomplete="off"
                                        value="{{old('m_img')}}" accept="application/pdf" />
                                    @if ($errors->has('m_img'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('m_img') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="grade">How many star’s your Hotel is
                                        ?</label>
                                    <select id="grade" class="form-control" name="grade">
                                        <option value="">Select</option>
                                        <option @if($hotelsData && $hotelsData->grade == 1) selected
                                            @endif value="1">One Star
                                        </option>
                                        <option @if($hotelsData && $hotelsData->grade == 2) selected
                                            @endif value="2">Two Stars
                                        </option>
                                        <option @if($hotelsData && $hotelsData->grade == 3) selected
                                            @endif value="3">Three Stars
                                        </option>
                                        <option @if($hotelsData && $hotelsData->grade == 4) selected
                                            @endif value="4">Four Stars
                                        </option>
                                        <option @if($hotelsData && $hotelsData->grade == 5) selected
                                            @endif value="5">Five Stars
                                        </option>
                                    </select>
                                    @if ($errors->has('grade'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                                        <button type="reset" class="btn btn-secondary"><a
                                                href="{{ url('/admin/hotelList')}}">Cancel</a></button>
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
                    url: '/merchant/hotel/featuredImageUpload',
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
                    url: '/merchant/hotel/bannerImageUpload',
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


	var gallerytable_row = 1;
		function addgallery() {
			
			
			
		    html = '<tr id="gallerytable-row' + gallerytable_row + '">';
			
			html += '<td><input type="file" name="gallery[]"    placeholder="Gallery" class="form-control single_gallery"></td>';
			
		
			html += '<td class="mt-10"><button class="btn btn-danger" onclick="$(\'#gallerytable-row' + gallerytable_row + '\').remove();"><i class="fa fa-trash"></i> </button></td>';

			html += '</tr>';

		$('#gallerytable tbody').append(html);

		gallerytable_row++;
		}
		
		
</script>
@endsection