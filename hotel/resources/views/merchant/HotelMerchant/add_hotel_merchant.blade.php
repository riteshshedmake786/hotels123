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

td,
th {
    padding: 10px;
}

.note-editable.card-block {
    height: 200px !important;
}


.single_gallery
{
	height:40px ! important;
}
</style>
<div class="subheader py-2  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
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
                    <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                        href="{{ url('merchant/hotelMerchantList') }}"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Hotel List</a>
                    <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                        href="{{ url('merchant/hotelMerchantView') }}"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Hotel View</a>
                    <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                        Add Hotel include</a>
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
    <div class=" container ">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Venue and Menu
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <div class="card-body">
                        <form action="{{url('merchant/hotel/submitMerchantIncludeHotel')}}" class="form" enctype="multipart/form-data"  method="POST">
                            @csrf

                            <input type="hidden" name="hotelId" value='{{$id}}'>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;">Venue Name :</label>
                                    <input type="text" name="venue_name" class="form-control"
                                        placeholder="Enter Venue Name" value="{{ old('hotel_title') }}">
                                    @if ($errors->has('hotel_title'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('hotel_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;">Venue Sub Title :</label>
                                    <input type="text" name="venue_sub_title" class="form-control"
                                        placeholder="Enter Venue Sub Heading" value="{{ old('sub_title') }}">
                                    @if ($errors->has('sub_title'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;" class="form-control-label"
                                        for="type">Venue Type :</label>
                                    <select id="city" class="form-control" name="venue_type" required="">
                                        <option value="">Select</option>
                                        @foreach($typeList as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;" class="form-control-label"
                                        for="include_type">Type:</label><br>
                                    <label class="" style="font-size: 18px; font-weight: 600;">
                                        <input type="radio" name="include_type" style="margin-right: 5px;"
                                            value="indoor">Indoor
                                    </label>&nbsp;&nbsp;&nbsp;
                                    <label class="" style="font-size: 18px; font-weight: 600;">
                                        <input type="radio" name="include_type" style="margin-right: 5px;"
                                            value="outdoor">Outdoor
                                    </label>
                                    @if ($errors->has('include_type'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('include_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="form-control-label col-sm-4"
                                            style="font-size: 18px; font-weight: 600;" for="event_type">Venue suiting:
                                        </label>
                                        <div class="col-sm-10">
                                            @foreach($eventList as $e)
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="event_type[]" value="{{$e->id}}">
                                                {{$e->title}}
                                            </label>
                                            @endforeach
                                        </div>
                                        @if ($errors->has('event_type'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('event_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;" for="venue_image">Venue
                                        Image:</label>
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
								
								
								
							 <div class="form-group row" style="width:100%">
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
							/* if($gallery_images)
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
										     <img src="<?php echo asset("uploads/hotels_banner_images/$gallery_image->image") ?>"
											 
                                        alt="image">
										<?php
									}
                               
                                 ?>
								 </div>
								 
                                </div>
							 
							 <?php
								}
							 }
							 */
                             ?>							 
							 
								
							 </div>
							 </div>
								
								<!--
								
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1"
                                        style="font-size: 18px; font-weight: 600;">Gallery Image:</label>
                                    <div class="custom-file">
                                        <input type="file" class="galleryimage" name="gimage[]" multiple id="gallery_images"
                                            accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="gallery_images"
                                            style="overflow: hidden;">Choose file</label>
                                    </div>
                                </div>
                                @if ($errors->has('gimage'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('gimage') }}</strong>
                                </span>
                                @endif
                                <div class="modal fade" id="gmodal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Crop Gallery Image </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary" id="gcrop">Crop
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
								
                                @if ($errors->has('status'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                                {{--                                </div>--}}
                                {{--                                <div class="form-group row">--}}
                                <div class="col-lg-6" style="margin-top: 10px;">
                                    <label for="specification" style="font-size: 18px; font-weight: 600;">Upload
                                        Layout specification image (only PDF file)</label>
                                    <input id="specification"
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        placeholder="Upload Layout specification" type="file" name="specification"
                                        autocomplete="off" value="{{old('specification')}}" accept="application/pdf" />
                                    @if ($errors->has('m_img'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('m_img') }}</strong>
                                    </span>
                                    @endif
                                    <label for="capacity" style="font-size: 18px; font-weight: 600;">
                                        Capacity:
                                    </label>
                                    <table style="table-layout: fixed;width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">
                                                </th>
                                                <th>Seating Setup</th>
                                                <th style=" width: 22%; ">Maximum
                                                </th>
                                                <th>Social Distancing
                                                </th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($capacitykey as $ci)
                                            <tr>
                                                <td><input id="id-{{ $ci->id }}" name="capacity_id_{{ $ci->id }}"
                                                        type="checkbox"></td>
                                                <td><label for="id-{{ $ci->id }}">{{ $ci->title }}</label></td>
                                                <td><input type="number" name="maximum_capacity_{{ $ci->id }}"
                                                        class="form-control"></td>
                                                <td><input type="number" name="socialdistancing_capacity_{{ $ci->id }}"
                                                        class="form-control"></td>
                                                <td>
                                                    <img class="image_fade"
                                                        src="{{ asset('storage/capacityAttributeImg/'.$ci->image)}}"
                                                        style="width:100px; height: 68px;">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6" style="margin-top: 10px;">
                                    <label style="font-size: 18px; font-weight: 600;">Description of venue:</label>
                                    <textarea name="description" id="description"
                                        class="form-control required summernote" cols="30" rows="10"></textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                    <div class="mt-5">
                                        <label style="font-size: 18px; font-weight: 600;" class="form-control-label"
                                            for="event_type">Facilities :</label>
                                        @foreach($facilityList as $i=>$e)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="facilities[]" value="{{$e->id}}">
                                            {{$e->title}}
                                        </label>
                                        @endforeach
                                        @if ($errors->has('facilities'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('facilities') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label style="font-size: 18px; font-weight: 600;">Minimum spend (in AED)
                                        :</label>
                                    <input type="number" name="cost" class="form-control" placeholder="Enter Cost"
                                        value="{{ old('cost') }}">
                                    @if ($errors->has('cost'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Next</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pageScript')
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
                    url: '/merchant/hotel/galleryImageUpload',
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