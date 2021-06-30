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
          Hotel Enquiry                         </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Enquiry Form</a>
          <!--end::Item-->
        </div>
        <!--end::Breadcrumb-->
      </div>
      <!--end::Heading-->
    </div>
    <!--end::Info-->
    <button class="btn btn-primary font-weight-bold btn-pill" onclick="history.back(-1)">
      <i class="fas fa-arrow-left"></i> Back
    </button>
  </div>
</div>
<!--begin::Card-->
<div class=" container align-items-stretch justify-content-between">
  <div class="card card-custom gutter-b">
    <div class="card-header flex-wrap py-3">
      <div class="card-title">
        <h3 class="card-label">Hotel Enquiry List</h3>
      </div>
    </div>
    <div class="card-body">
     <!--begin: Datatable-->
     <table class="table table-bordered table-checkable " id="HotelListTable">
      <thead>
       <tr>
        <th>Sr. No.</th>
        <th>Full Name</th>
        <!-- <th>Last Name</th> -->
        <th>Mobile No.</th>
        <th>Event Type</th>
        <th>Message</th>
        <!-- <th>Action</th> -->
      </tr>
      <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($hotelsEnquiryData as $hEData)
       <tr>
        <td>{{$i++}}</td>
        <td>{{ $hEData->first_name }} {{ $hEData->last_name }}</td>
        <td>{{ $hEData->mobile_no }}</td>
        <td>{{ $hEData->event_type_name }}</td>
        <td>{{ $hEData->message }}</td>
        <!-- <td><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
         <button class="btn btn-primary btn-sm">View</button>
       </a></td> -->
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
  $('#HotelListTable').DataTable({
    "responsive": true
  });
</script>
@endsection