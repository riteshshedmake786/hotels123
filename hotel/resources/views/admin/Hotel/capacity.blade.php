@extends('admin.layout.main')
@section('content')

<div class="subheader py-2  subheader-transparent " id="kt_subheader">
  <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-1">
      <!--begin::Heading-->
      <div class="d-flex flex-column">
        <!--begin::Breadcrumb-->
        <div class="d-flex align-items-center font-weight-bold my-2">
          <!--begin::Item-->
          <a href="#" class="opacity-75 hover-opacity-100"> <i class="flaticon2-shelter text-dark icon-1x"></i> </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Details                           </a>
          <!--end::Item-->
          <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotel/hotelList') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">Hotel List</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotelview') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel View</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Capacity </a>
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
      <!--begin::Details-->
      <div class="d-flex mb-9">
        <!--begin: Pic-->
        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
          <div class="symbol symbol-50 symbol-lg-120"> 
            @if(!empty($hotelsData->featured_image))
            <img src="{{url('storage/hotelsFeaturedImages/'.$hotelsData->featured_image)}}" alt="image" /> 
            @else
            <img src="{{asset('supplier_assets/media/users/hotel.jpg')}}" alt="image" /> 
            @endif
          </div>
          <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
            <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
          </div>
        </div>
        <!--end::Pic-->
        <!--begin::Info-->
        <div class="flex-grow-1">
          <!--begin::Title-->
       
            <div class="d-flex justify-content-between flex-wrap mt-1">
              <div class="d-flex mr-3"> <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$hotelsData->name}}</a>
               <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a> 
              </div>
              <div class="my-lg-0 my-3">
                <button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#hotelImage">Gallery</button>
                <button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#hotelViewPageMap">Map</button>
              </div>
            </div>

            <!--begin::Content-->
            <div class="d-flex flex-wrap justify-content-between mt-1">
              <div class="d-flex flex-column flex-grow-1 pr-8">
                <div class="d-flex flex-wrap mb-4"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-new-email mr-2 font-size-lg"></i>admin@std.com</a> 
                  <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Dubai</a> 
                </div><span class="font-weight-bold text-dark-50 text-justify">
                  <?php echo $hotelsData->description?></span>
                </div>
              </div>
              <!--end::Content-->
            </div>
            <!--end::Info-->
          </div>
          <!--end::Details-->
          <div class="separator separator-solid"></div>
          <!--begin::Items-->
           <div class="d-flex align-items-center flex-wrap mt-8 icon-wrap">
            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
              <i class=" display-4 text-muted font-weight-bold"></i>
            </span>
            <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm"></span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span></span>
            </div>
          </div>
          <!--end::Item-->
           <!--begin::Item-->
          <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
            <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
          </span>
          <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Total Includes</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$inclued_count}}</span>
          </div>
        </div>
        <!--end::Item-->
          
        <!--begin::Item-->
        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
          <i class="far fa-star display-4 text-muted font-weight-bold"></i>
        </span>
        <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Grade</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$hotelsData->grade}}</span>
        </div>
        </div>
      <!--end::Item-->

      <!--begin::Item-->
      <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
        <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
      </span>
      <div class="d-flex flex-column flex-lg-fill"> <span class="text-dark-75 font-weight-bolder font-size-sm">capacity</span><span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$hotelsData->capacity}}</span> </div>
    </div>
    <!--end::Item-->
</div>
</div>
</div>
<!--end::Card-->
  <!--begin::Card-->
  <div class="card card-custom gutter-b">
   <div class="card-body">
      <!--begin::Example-->
      <div class="example">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link " id="HotelIncludes"  href="{{url('admin/hotel/hotelView/'.$hotelsData->id)}}"> <span class="nav-icon"><i class="fas fa-house-user"></i></span> <span class="nav-text">Hotel Venue List</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="KeyFact"  href="{{url('admin/hotel/keyFact/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="fas fa-key"></i></span> <span class="nav-text">Key Facts</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="Capacity"  href="{{url('admin/hotel/capacity/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text"> Hotel Capacity</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="featured"  href="{{url('admin/hotel/featured/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text"> Hotel Featured</span> </a>
          </li>
        </ul>
        <div class="tab-content mt-5" id="myTabContent"> 
              <div class="card card-custom gutter-b" style="box-shadow: none;">
              <div class="card-header flex-wrap py-3">
                <div class="card-title">
                  <h1 class="card-label">
                    Venue  Capacity List
                  </h1> </div>
                  <a href="#" class="btn btn-primary font-weight-bolder" style=" height: 37px;" data-toggle="modal" data-target="#addCapacityModal">
                    <span class="fas fa-plus-circle"></span> &nbsp;Add Capacity
                  </a>
              </div>
              <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable" id="hotelKeyList">
                  <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Value</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($capacityList as $list)
                    <tr>
                      <td class="text-center">{{$i++}}</td>
                      <td class="text-center">{{$list->capacity_name}}</td>
                      <td class="text-center"><img src="{{ asset('storage/capacityAttributeImg/'.$list->capacity_image)}}" alt="image" style="width: 100px; height:  70px;"/></td>
                      <td class="text-center">{{$list->capacity_value}}</td>
                      <td>
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="View details" onclick="editCapacity({{$list->hotel_id}}, {{$list->id}})">
                        <a class="btn btn-warning btn-sm" style=" margin-left: 13px;">Edit</a>
                        </a>
                        <a href="{{ url('/admin/hotelView')}}" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
                        <button class="btn btn-danger btn-sm"style=" margin-left: 38px;" >Delete</button>
                      </a>
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
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="addCapacityModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Capacity Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <i aria-hidden="true" class="ki ki-close"></i>
       </button>
     </div>
     <div class="modal-body">
      <form action="{{url('admin/hotel/submitCapacity')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
        <input type="hidden" name="hotel_sub_entity_id" value="">
        <div class="row">
          <div class="form-group validated col-md-5">
            <label class="form-control-label" for="capacity_attribute_id">Title</label>
            <select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id[]" required="">
              <option value="">Select</option>
               @foreach($capacitykey as $ci)
                 <option value="{{$ci->id}}">{{$ci->title}}</option>
                 @endforeach
            </select>
          </div>
          <div class="form-group col-md-6" id="website_input">
              <label for="exampleTextarea">Capacity Value</label>
              <input type="number" class="form-control"  name="capacity_value[]" rows="2">
          </div>
          <div class="form-group m-auto">
          <button type="button" class="btn btn-outline-success btn-icon btn-circle" data-count="0" id="addSocial"><i class="flaticon2-plus"></i></button>
          </div>
        </div>
        <div id="social_input"></div>
      <div class="form-group">
         <button type="Submit" class="btn btn-primary mr-2">Submit</button>
         <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>

<!-- map model -->
 <div class="modal fade" id="hotelViewPageMap" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">{{$hotelsData->name}}
      <span class="float-right">(Latitude - {{ $hotelsData->lat }} | Longitude - {{ $hotelsData->long }})</span>
      </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i> </button>
    </div>
    <div class="modal-body">
      <iframe src = "https://maps.google.com/maps?q={{$hotelsData->lat}},{{$hotelsData->long}}&hl=es;z=30&amp;output=embed" width="100%" height="550"></iframe>
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
                    <div class="image-input image-input-outline" id="kt_image_{{$i++}}" style="background-image: url(assets/media/users/blank.png)">
                        <div class="image-input-wrapper card-img img-fluid" style="background-image: url({{ url('storage/hotelsGalleryImages/'.$imgUp->image )}}); height: 130px; background-repeat: no-repeat; width: 100%;"></div>
                        
                        <a href="javascript:void(0)" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Remove image" onclick="deleteHotelGallery({{$imgUp->id}})">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
                @endif
               </div>
               <form class="form" action="{{ url('admin/hotel/editHotelsGalleryData') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{$hotelsData['id']}}">
                  <div class="form-group row">
                   <div class="col-lg-12 pt-5">
                      <label for="exampleInputPassword1">Or Add New Images In Gallery :</label>
                      <div class="custom-file">
                         <input type="file" class="custom-file-input" name="gallery_images[]" id="gallery_images" accept=".jpg,.jpeg,.png" multiple>
                         <label class="custom-file-label" for="gallery_images" value="" style="overflow: hidden;">Choose file</label>
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

   <div class="modal fade" id="capacityEditModal" tabindex="-1" role="dialog" data-backdrop="static"
    aria-hidden="true" aria-labelledby="staticBackdrop">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Capacity Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <i aria-hidden="true" class="ki ki-close"></i>
                 </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
  </div> 
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
  </script>
  <script type="text/javascript">
  
  var f = 1;
  $(document).ready(function(){
    $('#addSocial').on('click',function(){
      var count = $(this).attr('data-count');
      var counter = parseInt(count) + 1;
  
        $(this).attr('data-count', counter);
        $('#removeaddSocial').attr('data-count', counter);
        $('#social_input').append('<div class="row div_f_'+f+'" data-id="'+f+'"><div class="form-group validated col-md-5"><label class="form-control-label" for="capacity_attribute_id">Title</label><select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id[]" required=""><option value="">Select</option>@foreach($capacitykey as $ci)<option value="{{$ci->id}}">{{$ci->title}}</option>@endforeach</select></div><div class="form-group col-md-6" id="website_input"><label for="exampleTextarea">Capacity Value</label><input type="number" class="form-control"  name="capacity_value[]" ></div><div class="form-group m-auto"><button type="button" class="btn btn-outline-danger btn-icon btn-circle" onclick="dltTrTrabgle('+f+')"><i class="flaticon2-cancel-music"></i></button> </div></div>');
        f++;
    
    });
    $('#removeaddSocial').on('click', function(){
      count1 = $(this).attr('data-count');
      var counter = parseInt(count1) - 1;

//$(this).attr('data-count', counter);
if(counter >= 0){

  $(this).attr('data-count', counter);
  $('#addSocial').attr('data-count', counter);

  if ($('#social_input > div').length > 1) {
    $('#social_input > div').last().remove();
    $('#website_input > div').last().remove();
  }
}
});
  });

  function dltTrTrabgle(v){
    $('.div_f_'+v).remove();
  }  

  function editCapacity($hotel_id, $id){
    var hotel_id = $hotel_id;
    var id = $id;

    console.log(hotel_id);
    console.log(id);
    $.post("edit_capacity", {hotel_id: hotel_id, id: id , _token: '{!! csrf_token() !!}'})
    .done(function( data ) {
        if(data.html != '') {
          console.log('hi json = ' + data.html)
          $('#capacityEditModal .modal-body').html('');
          $('#capacityEditModal .modal-body').html(data.html);
          $('#capacityEditModal').modal(
            {
              backdrop: 'static',
              keyboard: false,
              show: true, // added property here
            }
          );
          $('.kt-selectpicker').selectpicker('render');
        }
      })
      .fail(function() {
        swal.fire("Error!", "'error'", "error");
      });

}

$(document).on('click', '#saveEdit', function(){

  var id =$('#capacityEditModal [name="id"]').val();
  var hotel_id =$('#capacityEditModal [name="hotel_id"]').val();
  var capacity_attribute_id= $('#capacityEditModal [name="capacity_attribute_id"]').val();
  var capacity_value= $('#capacityEditModal [name="capacity_value"]').val();
  console.log(id, hotel_id, capacity_attribute_id, capacity_value);

  if (capacity_attribute_id == "") {
    swal.fire('Please select the title', 'Required error', 'error');
  } else if (capacity_value == ""){
    swal.fire('Please enter the capacity', 'Required error', 'error');
  } else {
        $.post( "save_edit_capacity", { id: id, hotel_id: hotel_id, capacity_attribute_id:capacity_attribute_id, capacity_value: capacity_value, _token: '{!! csrf_token() !!}' })
        .done(function( data ) {
          $('#capacityEditModal textarea').val('');
            $('#capacityEditModal select').selectpicker('deselectAll').selectpicker('refresh');
            $('#capacityEditModal').modal('hide');
            $("#editData").remove();
            location.reload();
          })
        .fail(function() {
          swal.fire('error', 'error', 'error');
        });
      }
});

$(document).ready(function() {
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

  function deleteHotelGallery($galleryId) {
    console.log('id is= '+ $galleryId);
    var div_id = "#galleryDiv_"+ $galleryId; // Use # here
    var parent_div = $(div_id);
    console.log('parent div=' + parent_div);

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!"
    }).then(function(result) {
        if (result.value) {
            $.get("delete/" + $galleryId).then(function(data, status) {
              if(data.status == 200) {
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
  </script>
  @endsection