@extends('merchant.layout.main')
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
					Merchant Users</a>
					<!--end::Item-->
					<!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
					Merchant List</a>
					<!--end::Item-->
				</div>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Heading-->
		</div>
		<!--end::Info-->
	</div>
</div>

<!--begin::Card-->
<div class=" container  d-flex align-items-stretch justify-content-between">
	<div class="card card-custom gutter-b" style="margin-top: 50px; width: 100%;">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">Merchant Table</h3>
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-checkable " id="merchantListTable">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Email</th>
						<th>Company Name</th>
						<th>Location</th>
						<th>Landline No.</th>
						<th>Mobile No.</th>
						<th>Action</th>

					</tr>
				</thead>

				<tbody>
					@php
					$i = 1;
					@endphp
					@foreach($merchantData as $merchant)

					<tr>
						<td>{{$i++}}</td>
						<td>{{$merchant['email']}}</td>
						<td>{{$merchant['company_name']}}</td>
						<td>{{$merchant['location']}}</td>
						<td>{{$merchant['landline_no']}}</td>
						<td>{{$merchant['mobile_no']}}</td>
						<td>
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
								<i class="far fa-eye"></i>
							</a>
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
								<i class="far fa-edit"></i>
							</a>
							<a data-toggle="modal" data-target="#exampleModalCenter_{{$merchant['id']}}" class="btn btn-sm btn-clean btn-icon" title="">
								<i class="fas fa-book"></i>
							</a>
						
                              <div id="exampleModalCenter_{{$merchant['id']}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" style="width: 100%;">Title<span class="float-right"></span></h5>
                                          <button type="button" class="close" data-dismiss="modal">×</button>
                                       </div>
                                       <div class="modal-body">
                                       	<embed src="{{ asset('storage/merchantUser/'.$merchant['m_img'])}}" frameborder="0" width="100%" height="400px">
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
	$('#merchantListTable').DataTable({
		"responsive": true
	});
</script>
@endsection