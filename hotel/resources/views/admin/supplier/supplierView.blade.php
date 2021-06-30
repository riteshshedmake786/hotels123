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
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Supplier Details</a>
          <!--end::Item-->
          <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/supplierView') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Supplier List</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
           Supplier View</a>
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
                    <img src="{{asset('supplier_assets/media/users/download.png')}}" alt="image"/>
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
                    <div class="d-flex mr-3">
                        <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">Atlantis The Palm</a>
                        <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                    </div>

                    <div class="my-lg-0 my-3">
                        <button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#exampleModalLong">Trade Licence</button>
                    </div>
                    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <i aria-hidden="true" class="ki ki-close"></i>
				                </button>
				            </div>
				            <div class="modal-body">
				               <embed src="{{ Storage::url('public/supplierUser') }}/{{ $supplier['image']}}" type="application/pdf" width="100%" height="1000px" />
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
				            </div>
				        </div>
				    </div>
				</div>
                </div>
                <!--end::Title-->

                <!--begin::Content-->
                <div class="d-flex flex-wrap justify-content-between mt-1">
                    <div class="d-flex flex-column flex-grow-1 pr-8">
                        <div class="d-flex flex-wrap mb-4">
                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$supplier['email']}}</a>
                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$supplier['location']}}</a>
                        </div>
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
          <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Total Includes</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>164,700</span>
          </div>
        </div>
        <!--end::Item-->
          <!--begin::Item-->
          <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
            <i class="fas fa-house-user display-4 text-muted font-weight-bold"></i>
          </span>
          <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Total Includes</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>164,700</span>
          </div>
        </div>
        <!--end::Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
          <i class="far fa-star display-4 text-muted font-weight-bold"></i>
        </span>
        <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Grade</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>782,300</span>
        </div>
      </div>
      <!--end::Item-->
      <!--begin::Item-->
      <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
        <i class="fas fa-keyboard display-4 text-muted font-weight-bold"></i>
      </span>
      <div class="d-flex flex-column flex-lg-fill"> <span class="text-dark-75 font-weight-bolder font-size-sm">KeyFact</span> <a href="#" class="text-primary font-weight-bolder">View</a> </div>
    </div>
    <!--end::Item-->
    <!--begin::Item-->
    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
      <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
    </span>
    <div class="d-flex flex-column"> <span class="text-dark-75 font-weight-bolder font-size-sm">Featured</span> <a href="#" class="text-primary font-weight-bolder">View</a> </div>
  </div>
  <!--end::Item-->
   <!--begin::Item-->
      <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
        <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
      </span>
      <div class="d-flex flex-column flex-lg-fill"> <span class="text-dark-75 font-weight-bolder font-size-sm">capacity</span> <a href="#" class="text-primary font-weight-bolder">View</a> </div>
    </div>
    <!--end::Item-->
    
</div>
</div>
</div>
<!--end::Card-->
  <!--begin::Card-->  
    <div class="card card-custom gutter-b">
    	<div class="card-header flex-wrap py-3">
    		<div class="card-title">
    			<h1 class="card-label">
    				HOTEL LIST
    			</h1>
    		</div>
    		<div class="card-toolbar">
    			<!--begin::Dropdown-->
<div class="dropdown dropdown-inline mr-2">
	<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>		Export
	</button>

	<!--begin::Dropdown Menu-->
	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
		<!--begin::Navigation-->
		<ul class="navi flex-column navi-hover py-2">
			<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
		        Choose an option:
		    </li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-print"></i></span>
					<span class="navi-text">Print</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-copy"></i></span>
					<span class="navi-text">Copy</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-excel-o"></i></span>
					<span class="navi-text">Excel</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-text-o"></i></span>
					<span class="navi-text">CSV</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
					<span class="navi-text">PDF</span>
				</a>
			</li>
		</ul>
		<!--end::Navigation-->
	</div>
	<!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->
<a href="#" class="btn btn-primary font-weight-bolder">
	<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="9" cy="15" r="6"/>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>	New Record
</a>
<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered table-checkable" id="supplierListTable">
			                    <thead>
                              <tr>
                                              <th>Record ID</th>
                                              <th>Order ID</th>
                                              <th>Country</th>
                                              <th>Ship City</th>
                                              <th>Ship Address</th>
                                              <th>Company Agent</th>
                                              <th>Company Name</th>
                                              <th>Ship Date</th>
                                              <th>Status</th>
                                              <th>Type</th>
                                              <th>Actions</th>
                                  </tr>
                    </thead>

                        <tbody>
                            <tr>
                                              <td>1</td>
                                              <td>64616-103</td>
                                              <td>Brazil</td>
                                              <td>São Félix do Xingu</td>
                                              <td>698 Oriole Pass</td>
                                              <td>Hayes Boule</td>
                                              <td>Casper-Kerluke</td>
                                              <td>10/15/2017</td>
                                              <td>5</td>
                                              <td>1</td>
                                              <td>
                                              	<a href="" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
                                                <button href="#" class="btn btn-warning btn-sm" style=" margin-left: 13px;">Edit</button>                                   
                                              </a>
                                              <a href="" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
                                                <button href="#" class="btn btn-danger btn-sm" style=" margin-left: 13px;">Delete</button>                                   
                                              </a>
                                              
                                              </td>
                                  </tr>
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
	$('#supplierListTable').DataTable({
		"responsive": true
	});
</script>
@endsection



