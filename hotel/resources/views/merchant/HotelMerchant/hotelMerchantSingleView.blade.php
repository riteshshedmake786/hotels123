@extends('merchant.layout.main')
@section('content')
<div class="subheader py-2  subheader-transparent " id="kt_subheader">
  <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-1" style="margin-left: -510px;">
      <!--begin::Heading-->
      <div class="d-flex flex-column">
        <!--begin::Breadcrumb-->
        <div class="d-flex align-items-center font-weight-bold my-2">
          <!--begin::Item-->
          <a href="#" class="opacity-75 hover-opacity-100"> <i class="flaticon2-shelter text-dark icon-1x"></i> </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
            Hotel Venue                         </a>
          <!--end::Item-->
          <!--begin::Item-->
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('merchant/hotelMerchantVenue') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel  Venue List</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel  Venue single List</a>
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
            @if(!empty($listSubEntity->feature_image))
            <img src="{{url('storage/hotels_sub_entity/'.$listSubEntity->feature_image)}}" alt="image" /> 
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
            <div class="d-flex mr-3"> <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$listSubEntity->title}}</a>
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
              <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$listSubEntity->sub_title}}</a> 
            </div><span class="font-weight-bold text-dark-50 text-justify">
              <?php echo $listSubEntity->description?></span>
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
      <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Total Includes</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span></span>
      </div>
    </div>
    <!--end::Item-->
    
    <!--begin::Item-->
    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
      <i class="far fa-star display-4 text-muted font-weight-bold"></i>
    </span>
    <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Grade</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$listSubEntity->grade}}</span>
    </div>
  </div>
  <!--end::Item-->

  <!--begin::Item-->
  <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
    <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
  </span>
  <div class="d-flex flex-column flex-lg-fill"> <span class="text-dark-75 font-weight-bolder font-size-sm">capacity</span><span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$listSubEntity->capacity}}</span> </div>
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
              <a class="nav-link active" id="Capacity"  href="{{url('merchant/hotel/capacityMerchant/'.$hotels_sub_entity_id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Capacity</span> </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" id="Menu"  href="{{url('merchant/hotel/menuMerchant/'.$hotels_sub_entity_id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Menu</span> </a>
           </li>
         </ul>
         <div class="tab-content mt-5" id="myTabContent"> 
          <div class="card card-custom gutter-b" style="box-shadow: none;">
            <div class="card-header flex-wrap py-3">
              <div class="card-title">
                <h1 class="card-label">
                  Hotel Key Capacity List
                </h1> </div>
                <a href="#" class="btn btn-primary font-weight-bolder" style=" height: 37px;" data-toggle="modal" data-target="#addCapacityViewModal">
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
                   @foreach($inCapacityList as $list)
                   <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{$list->capacity_name}}</td>
                    <td class="text-center"><img src="{{ asset('storage/capacityAttributeImg/'.$list->capacity_image)}}" alt="image" style="width: 100px; height:  70px;"/></td>
                    <td class="text-center">{{$list->capacity_value}}</td>
                    <td>
                      <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="View details" onclick="editCapacity({{$list->id}} )">
                        <button class="btn btn-warning btn-sm" style=" margin-left: 13px;">Edit</button>
                      </a>
                      <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="View details" onclick="deleteCapacity({{$list->id}})">
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

      <!--end::Example-->
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCapacityViewModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Capacity Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <i aria-hidden="true" class="ki ki-close"></i>
       </button>
     </div>
     <div class="modal-body">
      <form action="{{url('merchant/hotel/submitHotelsIncludeCapacity')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="hotels_sub_entity_id" value="{{$hotels_sub_entity_id}}">
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

<!-- edit model -->
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
      if(counter < 5){
        $(this).attr('data-count', counter);
        $('#removeaddSocial').attr('data-count', counter);
        $('#social_input').append('<div class="row div_f_'+f+'" data-id="'+f+'"><div class="form-group validated col-md-5"><label class="form-control-label" for="capacity_attribute_id">Title</label><select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id[]" required=""><option value="">Select</option>@foreach($capacitykey as $ci)<option value="{{$ci->id}}">{{$ci->title}}</option>@endforeach</select></div><div class="form-group col-md-6" id="website_input"><label for="exampleTextarea">Capacity Value</label><input type="number" class="form-control"  name="capacity_value[]" ></div><div class="form-group m-auto"><button type="button" class="btn btn-outline-danger btn-icon btn-circle" onclick="dltTrTrabgle('+f+')"><i class="flaticon2-cancel-music"></i></button> </div></div>');
        f++;
      }  
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

  function editCapacity($id){
    var id = $id;
    console.log(id);
    $.post("include_hotel_edit_capacity", {id: id , _token: '{!! csrf_token() !!}'})
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
    var capacity_attribute_id= $('#capacityEditModal [name="capacity_attribute_id"]').val();
    var capacity_value= $('#capacityEditModal [name="capacity_value"]').val();

    if (capacity_attribute_id == "") {
      swal.fire('Please select the title', 'Required error', 'error');
    } else if (capacity_value == ""){
      swal.fire('Please enter the capacity', 'Required error', 'error');
    } else {
      $.post( "submit_include_hotel_edit_capacity", { id: id, capacity_attribute_id:capacity_attribute_id, capacity_value: capacity_value, _token: '{!! csrf_token() !!}' })
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


  function deleteCapacity($id){
    var id = $id;
    console.log(id);
    $.post("include_hotel_delete_capacity", {id: id , _token: '{!! csrf_token() !!}'})
    .done(function( data ) {
      location.reload();
    })
    .fail(function() {
      swal.fire("Error!", "'error'", "error");
    });
  }
</script>
@endsection