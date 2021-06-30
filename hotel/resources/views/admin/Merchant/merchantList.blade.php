@extends('admin.layout.main')
@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
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
					<a href="#" class="opacity-75 hover-opacity-100"> <i class="flaticon2-shelter text-dark icon-1x"></i> </a>
					<!--end::Item-->
					<!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
					Merchant</a>
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
		<button class="btn btn-primary font-weight-bold btn-pill" onclick="history.back(-1)">
                        <i class="fas fa-arrow-left"></i></i> Back
                     </button>
	</div>
</div>

<!--begin::Card-->
<div class=" container align-items-stretch justify-content-between">
	<div class="card card-custom gutter-b">
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
						<th>Name</th>
						<th>Location</th>
						<th>Landline No.</th>
						<th>Mobile No.</th>
						<th>Action</th>
						<th>Status</th>
						

					</tr>
				</thead>

				<tbody>
					@php
					$i = 1;
					@endphp
					@foreach($merchantData as $index=>$merchant)

					<tr>
						<td>{{$i++}}</td>
						<td>{{$merchant['email']}}</td>
						<td>{{$merchant['company_name']}}</td>
						<td>{{$merchant['location']}}</td>
						<td>{{$merchant['landline_no']}}</td>
						<td>{{$merchant['mobile_no']}}</td>
						<td style="text-align:center;">
							<a href="{{ url('/admin/merchantView')}}/{{$merchant['id']}}" class="btn btn-sm btn-clean btn-icon " title="View details">
							<button href="#" class="btn btn-primary btn-sm">View</button>
							</a>
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon " title="Edit details">
							<button href="#" class="btn btn-warning btn-sm" >Edit</button>
							</a>
							<!-- <a href="{{ url('/admin/merchantDelete')}}/{{$merchant['id']}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Delete details">
							<button  class="btn btn-danger btn-sm"style=" margin-left: 38px;" >Delete</button>
							</a> -->
						
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
						
						
						<td>
						@foreach($hotel as $key=>$h)
							@if($h->if_is_merchant_id == $merchant['id'] && $h->status=='ACTIVE')
								<div class="togglebutton">
								   <label class="switch">
										<input type="checkbox" id="active" name="{{ $h->id }}"
											onchange="statusChange({{ $h->id }},'{{ $h->status }}')"
											value="{{ $h->id }}" 
						
											@if($h->status == 'ACTIVE')
											checked
											@endif>
										<span class="slider round" data-label-off="No" data-label-on="Yes"></span>
									</label>
								</div>
							@endif
							@if($h->if_is_merchant_id == $merchant['id'] && $h->status=='INACTIVE')
								<div class="togglebutton">
								   <label class="switch">
										<input type="checkbox" id="active" name="{{ $h->id }}"
											onchange="statusChange({{ $h->id }},'{{ $h->status }}',
											'{{ $h->is_deleted }}')"
											value="{{ $h->id }}" 
						
											@if($h->status == 'ACTIVE')
											checked
											@endif>
										<span class="slider round" data-label-off="No" data-label-on="Yes"></span>
									</label>
								</div>
							@endif
							@if($h->if_is_merchant_id == $merchant['id'] && $h->status=='BLOCKED')
								<div class="togglebutton">
								    <label class="switch">
										<input type="checkbox" id="active" name="{{ $h->id }}"
											onchange="statusChange({{ $h->id }},'{{ $h->status }}',
											'{{ $h->is_deleted }}')"
											value="{{ $h->id }}" 
						
											@if($h->status == 'ACTIVE')
											checked
											@endif>
										<span class="slider round" data-label-off="No" data-label-on="Yes"></span>
									</label>
								</div>
							@endif
							@if($h->if_is_merchant_id == $merchant['id'] && $h->status=='ONHOLD')
								<div class="togglebutton">
								   <label class="switch">
										<input type="checkbox" id="active" name="{{ $h->id }}"
										    onchange="statusChange({{ $h->id }},'{{ $h->status }}'
											'{{ $h->is_deleted }}')"
											value="{{ $h->id }}" 
						
											@if($h->status == 'ACTIVE')
											checked
											@endif>
										<span class="slider round" data-label-off="No" data-label-on="Yes"></span>
									</label>
								</div>
							@endif
						@endforeach
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

	function statusChange(id, status,is_deleted) {
		// console.log('abc',id,status);
		// alert(status);
		// debugger;
		var active = $("input[name=" + id + "]").val();
		var user_id = id;
		if (status == 'ACTIVE') {
			status = 'INACTIVE';
			is_deleted = 0;
		} else {
			status = 'ACTIVE';
			is_deleted = 1;
		}
		$.ajax({
			url: '/admin/merchantDelete',
			method: 'post',
			data: {
				_token: "{{ csrf_token() }}",
				status: status,
				id: user_id,
				is_deleted: is_deleted
			},
			dataType: 'json',
			success: function(response) {}
		});
};
</script>
@endsection