@extends('supplier.layout.main')
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
                    <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#"
                        class="text-dark text-hover-dark opacity-75 hover-opacity-100">
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

                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="HotelIncludesList" role="tabpanel"
                        aria-labelledby="HotelIncludes">
                        <div class="card card-custom gutter-b" style="box-shadow: none;">
                            <div class="card-header flex-wrap py-3">
                                <div class="card-title" >
                                    <h1 class="card-label">
                                        Product List
                                    </h1>
                                </div>
                                <form method="post" action="{{ url('/supplier/addNewProducts')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product_id}}">
                                    <button class="btn btn-primary font-weight-bolder" style="height: 37px;">
                                        <span class="fas fa-plus-circle"></span> Add Products
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
                                           
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach($supplierProducts as $data)
                                        <tr style="text-align:center;">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->products }}</td>
                                           
                                            <td>
                                                <a href="{{ url('supplier/edit_supplier_products')}}/{{$data->id}}" class="btn btn-sm btn-clean btn-icon mr-2"
                                                    title="View details">
                                                    <button class="btn btn-warning btn-sm"
                                                        style=" margin-left: 13px;">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('supplier/delete_supplier_products')}}/{{$data->id}}" class="btn btn-sm btn-clean btn-icon mr-2"
                                                    title="View details">
                                                    <button class="btn btn-warning btn-sm"
                                                        style=" margin-left: 13px;">Delete</button>
                                                </a>
                                            </td>
                                            <td>
                                                @if($data->status=='ACTIVE')
                                                <div class="togglebutton">
                                                    <label class="switch">
                                                        <input type="checkbox" id="active" name="{{ $data->id }}"
                                                            onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                            value="{{ $data->id }}" @if($data->status == 'ACTIVE')
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
                                                        <input type="checkbox" id="active" name="{{ $data->id }}"
                                                            onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                            value="{{ $data->id }}" @if($data->status == 'ACTIVE')
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
                                                        <input type="checkbox" id="active" name="{{ $data->id }}"
                                                            onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                            value="{{ $data->id }}" @if($data->status == 'ACTIVE')
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
                                                        <input type="checkbox" id="active" name="{{ $data->id }}"
                                                            onchange="statusChange({{ $data->id }},'{{ $data->status }}')"
                                                            value="{{ $data->id }}" @if($data->status == 'ACTIVE')
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


<!-- image gallery -->


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
    }).then(function(result) {
        if (result.value) {
            $.get("delete/" + $galleryId).then(function(data, status) {
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
        url: '/supplier/productView',
        method: 'post',
        data: {
            _token: "{{ csrf_token() }}",
            status: status,
            id: user_id,

        },
        dataType: 'json',
        success: function(response) {}
    });
};
</script>

@endsection