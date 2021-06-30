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
          Hotel  Menu View</a>
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
            <img src="{{url('storage/hotels_sub_entity/'.$listSubEntity->feature_image)}}" alt="image" /> @else
            <img src="{{asset('supplier_assets/media/users/hotel.jpg')}}" alt="image" /> 
            @endif
          </div>
          <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none"> <span class="font-size-h3 symbol-label font-weight-boldest">JM</span> </div>
        </div>
        <!--end::Pic-->
        <!--begin::Info-->
        <div class="flex-grow-1">
          <!--begin::Title-->
          <div class="d-flex justify-content-between flex-wrap mt-1">
            <div class="d-flex mr-3"><a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"  style="padding-left: 17px;">{{$listSubEntity->title}}</a> <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a> </div>
            <!--begin::Content-->
            <div class="d-flex flex-wrap justify-content-between mt-1">
              <div class="d-flex flex-column flex-grow-1 pr-8">
                <div class="d-flex flex-wrap mb-4"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"  style="padding-left: 17px;"><i class="flaticon2-new-email mr-2 font-size-lg"></i>Merchant@123.com</a> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$listSubEntity->sub_title}}</a></div> <span class="font-weight-bold text-dark-50 text-justify">{{$listSubEntity->description}} </span> </div>
              </div>
              <!--end::Content-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Details-->
            <div class="separator separator-solid"></div>
          </div>
        </div>
      </div>
        <div class="card card-custom gutter-b">

          <div class="card-body">
            <!--begin::Example-->
            <div class="example">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                <a class="nav-link" id="Capacity"  href="{{url('merchant/hotel/hotelMerchantIncludeView/'.$hotels_sub_entity_id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Capacity</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="Menu"  href="{{url('merchant/hotel/menuMerchant/'.$hotels_sub_entity_id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Menu</span> </a>
              </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent"> 
              <div class="card card-custom gutter-b" style="box-shadow: none;">
                <div class="card-header flex-wrap py-3">
                  <div class="card-title">
                    <h1 class="card-label">
                      Hotel Menu List
                    </h1> </div>
                    <a href="#" class="btn btn-primary font-weight-bolder" style=" height: 37px;" data-toggle="modal" data-target="#addMenuViewModal">
                      <span class="fas fa-plus-circle"></span> &nbsp; Add Menu
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
                          <th>File</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                         @php
                          $i=1;
                          @endphp
                          @foreach($menuList as $menuItem)
                        <tr>
                          <td class="text-center">{{$i++}}</td>
                          <td class="text-center">{{$menuItem->title}}</td>
                          <td>
                            <img src="{{ asset('storage/hotels_sub_entity_menu/'.$menuItem->image)}}" alt="image" style="width: 100px; height:  70px;"/></td>
                          <td>
                            <button href="#" class="btn btn-danger btn-sm"style=" margin-left: 38px;" data-toggle="modal" data-target="#hotelImage_{{$menuItem->id}}">PDF</button>
                            <div id="hotelImage_{{$menuItem->id}}" class="modal" tabindex="" style=" padding-right: 17px;">
                                <div class="modal-dialog modal-lg">
                                 <div class="modal-content modal-lg">
                                  <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">×</button>
                                 </div>
                                   <div class="modal-body">
                                    <iframe src="{{ asset('storage/hotels_sub_entity_menu/'.$menuItem->doc_file)}}" width="100%" height="550"></iframe>  
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <a href="javascript::void(0);" class="btn btn-sm btn-clean btn-icon mr-2" title="View details" onclick="editMenu({{$menuItem->id}} )">
                              <button href="#" class="btn btn-warning btn-sm" style=" margin-left: 13px;">Edit</button>
                            </a>
                            <a href="javascript::void(0);" class="btn btn-sm btn-clean btn-icon mr-2" title="View details" onclick="deleteMenu({{$menuItem->id}})">
                              <button href="#" class="btn btn-danger btn-sm"style=" margin-left: 38px;" >Delete</button>
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
      <div class="modal fade" id="addMenuViewModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Menu Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i aria-hidden="true" class="ki ki-close"></i>
             </button>
           </div>
           <div class="modal-body">
             <form action="{{url('merchant/hotel/submitIncludeMenuMerchant')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <input type="hidden" name="hotels_sub_entity_id" value="{{$hotels_sub_entity_id}}">
              <div class="row">
                <div class="form-group validated col-md-3">
                  <label class="form-control-label" for="capacity_attribute_id">Title</label>
                  <input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title[]" >
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">Image</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="image[]" >
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">File</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="doc_file[]" accept=".doc" >
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
  <div class="modal fade" id="menuEditModal" tabindex="-1" role="dialog" data-backdrop="static"
    aria-hidden="true" aria-labelledby="staticBackdrop">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
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
        $('#social_input').append('<div class="row div_f_'+f+'" data-id="'+f+'"><div class="form-group validated col-md-3"><label class="form-control-label" for="capacity_attribute_id">Title</label><input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title[]" ></div><div class="form-group col-md-4" id="website_input"><label for="exampleTextarea">Image</label><input type="file" class="form-control" id="exampleTextarea" name="image[]" ></div><div class="form-group col-md-4" id="website_input"><label for="exampleTextarea">File</label><input type="file" class="form-control" id="exampleTextarea" name="doc_file[]" accept=".doc" ></div><div class="form-group m-auto"><button type="button" class="btn btn-outline-danger btn-icon btn-circle" onclick="dltTrTrabgle('+f+')"><i class="flaticon2-cancel-music"></i></button> </div></div>');
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

    function editMenu($id){
    var id = $id;
    console.log(id);
    $.post("editFormHotelsIncludeMenuMerchant", {id: id , _token: '{!! csrf_token() !!}'})
    .done(function( data ) {
        if(data.html != '') {
          console.log('hi json = ' + data.html)
          $('#menuEditModal .modal-body').html('');
          $('#menuEditModal .modal-body').html(data.html);
          $('#menuEditModal').modal(
            {
              backdrop: 'static',
              keyboard: false,
              show: true, // added property here
            }
          );
        }
      })
      .fail(function() {
        swal.fire("Error!", "'error'", "error");
      });
}


$(document).on('click', '#saveEdit', function(){

  var id =$('#menuEditModal [name="id"]').val();
  var title= $('#menuEditModal [name="title"]').val();
  var image= $('#menuEditModal [name="image"]').val();
  var doc_file= $('#menuEditModal [name="doc_file"]').val();

  if (title == "") {
    swal.fire('Please select the title', 'Required error', 'error');
  } else if (image == ""){
    swal.fire('Please enter the image', 'Required error', 'error');
  }
  else if (doc_file == ""){
    swal.fire('Please enter the d', 'Required error', 'error');
  } else {
        $.post( "submitFormHotelsIncludeMenuMerchant", { id: id, title:title, image: image,doc_file:doc_file, _token: '{!! csrf_token() !!}' })
        .done(function( data ) {
          $('#menuEditModal textarea').val('');
            $('#menuEditModal select').selectpicker('deselectAll').selectpicker('refresh');
            $('#menuEditModal').modal('hide');
            $("#editData").remove();
            location.reload();
          })
        .fail(function() {
          swal.fire('error', 'error', 'error');
        });
      }
});

function deleteMenu($id){
    var id = $id;
    console.log(id);
    $.post("deleteAdminHotelsIncludeMemuMerchant", {id: id , _token: '{!! csrf_token() !!}'})
    .done(function( data ) {
      location.reload();
    })
    .fail(function() {
      swal.fire("Error!", "'error'", "error");
    });
  }
</script>
@endsection 