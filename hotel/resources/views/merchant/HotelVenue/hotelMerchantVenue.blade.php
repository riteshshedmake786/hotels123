@extends('merchant.layout.main')
@section('content')
    <div class="subheader py-2  subheader-transparent " id="kt_subheader">
        <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1" style="margin-left: -680px;">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100"> <i
                                class="flaticon2-shelter text-dark icon-1x"></i> </a>
                        <!--end::Item-->
                        <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                            href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                            Hotel Venue </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#"
                                                                                                  class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                            Hotel Venue List</a>
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
    <div class=" container ">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">

            <div class="card-body">
                <!--begin::Example-->
                <div class="example">
                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li>
       <a class="nav-link active" id="HotelIncludes"  href="{{url('merchant/hotel/hotelMerchantView/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="fas fa-house-user"></i></span> <span class="nav-text">Hotel Venue List</span> </a>
     </li>
          <a class="nav-link" id="KeyFact"  href="{{url('merchant/hotel/keyFactMerchant/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="fas fa-key"></i></span> <span class="nav-text">Key Facts</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="Capacity"  href="{{url('merchant/hotel/capacityMerchant/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Hotel Capacity</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="featured"  href="{{url('merchant/hotel/featuredMerchant/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Hotel Featured</span> </a>
        </li>
      </ul> -->
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="HotelIncludesList" role="tabpanel"
                             aria-labelledby="HotelIncludes">
                            <div class="card card-custom gutter-b" style="box-shadow: none;">
                                <div class="card-header flex-wrap py-3">
                                    <div class="card-title">
                                        <h1 class="card-label">
                                            Hotel Venue List
                                        </h1></div>
                                    <form method="post" action="{{ url('/merchant/hotel/add_hotel_merchant')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$hotelsData->id}}">
                                        <button class="btn btn-primary font-weight-bolder" style="height: 37px;">
                                            <span class="fas fa-plus-circle"></span> Add Venue and Menu
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered table-checkable" id="hotelList">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Sr No.</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">SubTitle</th>
                                            <th class="text-center">Venue Type</th>
                                            <th class="text-center">Menu</th>
                                            <th class="text-center">Edit or Delete</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach($HotelInclude as $data)

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>{{$data->sub_title}}</td>
                                                <td>{{$data->type_name}}</td>
                                                <td style="text-align:center;">
                                                    <a href="{{ url('merchant/hotel/hotelMerchantIncludeList/')}}/{{$data->id}}"
                                                       class="btn btn-sm btn-clean mr-2" title="View details">
                                                        <button class="btn btn-primary btn-sm">Edit Menu</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('merchant/hotel/edit_hotel_include_merchant')}}/{{$data->id}}"
                                                       class="btn" title="View details">
                                                        <button class="btn btn-warning btn-sm">Edit
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('merchant/hotel/deleteVenue/')}}/{{$data->id}}"
                                                       class="btn btn-icon"
                                                       title="Delete details">
                                                        <button class="btn btn-danger btn-sm">Delete
                                                        </button>
                                                    </a>
                                                </td>
                                            <!-- <td>
                      @if($data->status=='ACTIVE')
                                                <span class="label label-lg font-weight-bold label-light-success label-inline">{{$data->status}}</span>
                        @endif
                                            @if($data->status=='INACTIVE')
                                                <span class="label label-lg font-weight-bold label-light-warning label-inline">{{$data->status}}</span>
                        @endif
                                            @if($data->status=='BLOCKED')
                                                <span class="label label-lg font-weight-bold label-light-danger label-inline">{{$data->status}}</span>
                        @endif
                                            @if($data->status=='ONHOLD')
                                                <span class="label label-lg font-weight-bold label-light-info label-inline">{{$data->status}}</span>
                      @endif
                                                </td> -->
                                                <td>
                                                    @if($data->status=='ACTIVE')
                                                        <div class="togglebutton">
                                                            <label class="switch">
                                                                <input type="checkbox" id="active"
                                                                       name="{{ $data->id }}"
                                                                       onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                                       value="{{ $data->id }}"
                                                                       @if($data->status == 'ACTIVE')
                                                                       checked
                                                                    @endif>
                                                                <span class="slider round" data-label-off="No"
                                                                      data-label-on="Yes"></span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                    @if($data->status=='INACTIVE')
                                                        <div class="togglebutton">
                                                            <label class="switch">
                                                                <input type="checkbox" id="active"
                                                                       name="{{ $data->id }}"
                                                                       onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                                       value="{{ $data->id }}"
                                                                       @if($data->status == 'ACTIVE')
                                                                       checked
                                                                    @endif>
                                                                <span class="slider round" data-label-off="No"
                                                                      data-label-on="Yes"></span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                    @if($data->status=='BLOCKED')
                                                        <div class="togglebutton">
                                                            <label class="switch">
                                                                <input type="checkbox" id="active"
                                                                       name="{{ $data->id }}"
                                                                       onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                                       value="{{ $data->id }}"
                                                                       @if($data->status == 'ACTIVE')
                                                                       checked
                                                                    @endif>
                                                                <span class="slider round" data-label-off="No"
                                                                      data-label-on="Yes"></span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                    @if($data->status=='ONHOLD')
                                                        <div class="togglebutton">
                                                            <label class="switch">
                                                                <input type="checkbox" id="active"
                                                                       name="{{ $data->id }}"
                                                                       onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                                       value="{{ $data->id }}"
                                                                       @if($data->status == 'ACTIVE')
                                                                       checked
                                                                    @endif>
                                                                <span class="slider round" data-label-off="No"
                                                                      data-label-on="Yes"></span>
                                                            </label>
                                                        </div>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Example-->
            </div>
        </div>
    </div>
    <!-- map model -->
    <div class="modal fade" id="hotelViewPageMap" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$hotelsData->name}}
                        <span class="float-right">(Latitude - {{ $hotelsData->lat }} | Longitude - {{ $hotelsData->long }})</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true"
                                                                                                   class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe
                        src="https://maps.google.com/maps?q={{$hotelsData->lat}},{{$hotelsData->long}}&hl=es;z=30&amp;output=embed"
                        width="100%" height="550"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- image gallery -->

    <div id="hotelImage" class="modal" tabindex="" style=" padding-right: 17px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header">

                    <h5 class="modal-title">Hotel Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @if($gallery_images)
                            @php $i=1 @endphp
                            @foreach($gallery_images as $imgUp)

                                <div class="col-sm-6 col-lg-3 mb-5" id="galleryDiv_{{$imgUp->id}}">
                                    <div class="card">
                                    <!-- <div class="card-img-actions m-1"> <img class="card-img img-fluid" style="height: 130px" src="{{ url('storage/hotelsGalleryImages/'.$imgUp->image )}}?f=650x650&format=auto" alt="">
          </div> -->
                                        <div class="image-input image-input-outline" id="kt_image_{{$i++}}"
                                             style="background-image: url(assets/media/users/blank.png)">
                                            <div class="image-input-wrapper card-img img-fluid"
                                                 style="background-image: url({{ url('storage/hotelsGalleryImages/'.$imgUp->image )}}); height: 130px; background-repeat: no-repeat; width: 100%;"></div>

                                            <a href="javascript:void(0)"
                                               class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                               data-action="change" data-toggle="tooltip" title=""
                                               data-original-title="Remove image"
                                               onclick="deleteHotelGallery({{$imgUp->id}})">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <form class="form" action="{{ url('merchant/hotel/editHotelsGalleryDataMerchant') }}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$hotelsData['id']}}">
                        <div class="form-group row">
                            <div class="col-lg-12 pt-5">
                                <label for="exampleInputPassword1">Or Add New Images In Gallery :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gallery_images[]"
                                           id="gallery_images" accept=".jpg,.jpeg,.png" multiple>
                                    <label class="custom-file-label" for="gallery_images" value=""
                                           style="overflow: hidden;">Choose file</label>
                                </div>
                                @if ($errors->has('gallery_images'))
                                    <span class="text-danger">
                <strong>{{ $errors->first('gallery_images') }}</strong>
             </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer pt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary mr-2">Upload</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection
@section('pageScript')
    <script type="text/javascript">
        $('#hotelList').DataTable({
            "responsive": true
        });
        $('#hotelKeyList').DataTable({
            "responsive": true
        });
        $('#CapacityList').DataTable({
            "responsive": true
        });

        $(document).ready(function () {
            $('#gallery_images').change(function () {
                var i = $(this).next('label').clone();
                var names = [];
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    names.push($(this).get(0).files[i].name);

                    $(this).next('label').text(names);
                }
                console.log(names);
            });

        });

        function deleteHotelGallery($galleryId) {
            console.log('id is= ' + $galleryId);
            var div_id = "#galleryDiv_" + $galleryId; // Use # here
            var parent_div = $(div_id);
            console.log('parent div=' + parent_div);

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!"
            }).then(function (result) {
                if (result.value) {
                    $.get("delete/" + $galleryId).then(function (data, status) {
                        if (data.status == 200) {
                            Swal.fire(data.message, {
                                icon: "success",
                            });
                            parent_div.remove();
                        }
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        }

        function statusChange(id, status) {
            // console.log(id,status);
            // debugger;
            var active = $("input[name=" + id + "]").val();
            var user_id = id;
            if (status == 'ACTIVE') {
                status = 'INACTIVE';

            } else {
                status = 'ACTIVE';
            }
            $.ajax({
                url: '/merchant/hotel/hotelView',
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    id: user_id,

                },
                dataType: 'json',
                success: function (response) {
                }
            });
        };

    </script>

@endsection
