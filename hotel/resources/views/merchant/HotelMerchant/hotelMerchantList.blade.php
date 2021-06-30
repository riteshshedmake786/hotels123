@extends('merchant.layout.main') 
@section('content')
<div class="subheader py-2  subheader-transparent " id="kt_subheader">
  <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-1" style="margin-left: -732px;">
      <!--begin::Heading-->
      <div class="d-flex flex-column">
        <!--begin::Breadcrumb-->
        <div class="d-flex align-items-center font-weight-bold my-2">
          <!--begin::Item-->
          <a href="#" class="opacity-75 hover-opacity-100"> <i class="flaticon2-shelter text-dark icon-1x"></i> </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Details                       </a>
          <!--end::Item-->
          <!--begin::Item-->
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel  List</a>
          <!--end::Item-->
        </div>
        <!--end::Breadcrumb-->
      </div>
      <!--end::Heading-->
    </div>
    <!--end::Info--> <button class="btn btn-primary font-weight-bold btn-pill" onclick="history.back(-1)"> <i class="fas fa-arrow-left"></i></i> Back</button>
  </div>
</div>
<!--begin::Card-->
<div class=" container  d-flex align-items-stretch justify-content-between">
  <div class="card card-custom gutter-b" style="margin-top: 10px; width: 100%;">
    <div class="card-header flex-wrap py-3">
      <div class="card-title">
        <h3 class="card-label">Hotel Table</h3>
      </div>
      <!--begin::Button-->
      @if($userexit)
       <button class="btn btn-primary font-weight-bolder" id="addForm" value="{{ $userexit }}" style="height: 36px;"><span class="fas fa-plus-circle" ></span>Add</button>
      @else
      <a href="{{ url('/merchant/hotel/add_hotel')}}" class="btn btn-primary font-weight-bolder" style=" height: 37px;">
       <span class="fas fa-plus-circle" ></span>Add Hotel
     </a>
      @endif
      

    
     <!--end::Button-->
   </div>
   <div class="card-body">
     <!--begin: Datatable-->
     <table class="table table-bordered table-checkable " id="HotelListMerchantTable">
      <thead>
       <tr>
        <th class="text-center">Sr. No.</th>
        <th class="text-center">Name</th>
        <th class="text-center">City</th>
        <th class="text-center">Location</th>
        <th class="text-center">HotelBy</th>
        <th class="text-center">Featured</th>
        <th class="text-center">status</th>
        <th class="text-center">Action</th>

      </tr>
    </thead>

    <tbody>
      @php
      $i = 1;
      @endphp      
      @foreach($hotelListData as $hld)

      <tr>
        <td>{{$i++}}</td>
        <td>{{$hld->name}}</td>
        <td>{{$hld->city_name}}</td>
        <td><button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#hotelMerchantListMap_{{$i}}">Map</button>
          <div class="modal fade" id="hotelMerchantListMap_{{$i}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$hld->name}} | 
                    <span class="float-right">{{$hld->city_name}}:{{$hld->city_name}} : (Latitude - {{ $hld->lat }} | Longitude - {{ $hld->long }})</span>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i> </button>
                </div>
                <div class="modal-body">
                  <iframe src = "https://maps.google.com/maps?q={{$hld->lat}},{{$hld->long}}&hl=es;z=30&amp;output=embed" width="100%" height="550"></iframe>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td><span class="label label-lg font-weight-bold label-light-primary label-inline">{{$hld->added_by}}</span></td>
        <td>
          <span class="label label-lg font-weight-bold {{ $hld->is_featured == 1 ? 'label-light-success' : 'label-light-danger' }} label-inline">{{ $hld->is_featured == 1 ? 'Yes' : 'No' }}</span>
        </td>
        <td>
          @if($hld->status=='ACTIVE')
            <span class="label label-lg font-weight-bold label-light-success label-inline">{{$hld->status}}</span>
            @endif
            @if($hld->status=='INACTIVE')
            <span class="label label-lg font-weight-bold label-light-warning label-inline">{{$hld->status}}</span>
            @endif
            @if($hld->status=='BLOCKED')
            <span class="label label-lg font-weight-bold label-light-danger label-inline">{{$hld->status}}</span>
            @endif
            @if($hld->status=='ONHOLD')
            <span class="label label-lg font-weight-bold label-light-info label-inline">{{$hld->status}}</span>
            @endif
        </td>
        <td>
          <a href="{{ url('/merchant/hotel/hotelMerchantView')}}/{{$hld->id}}" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
           <button  class="btn btn-primary btn-sm">View</button>
         </a>
         <a href="{{ url('merchant/hotel/edit_hotel_merchant/')}}/{{$hld->id}}" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
          <button  class="btn btn-warning btn-sm" style=" margin-left: 13px;">Edit</button>
        </a>
        <a href="{{ url('/admin/hotelView')}}" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
          <button  class="btn btn-danger btn-sm"style=" margin-left: 38px;" >Delete</button>
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

<!--end::Card-->
@endsection
@section('pageScript')
<script type="text/javascript">
 $('#HotelListMerchantTable').DataTable({
  "responsive": true
});
$('#addForm').click(function(){
    Swal.fire("Hotel Notification!", "One Merchant Can Added Only One Hotel .", "warning");
});
</script>
@endsection
