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
          Hotel Details                            </a>
          <!--end::Item-->
          <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotelMerchantList') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel List</a>
           <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('merchant/hotelMerchantView') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel View</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Edit Hotel include</a>
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
<div class="d-flex flex-column-fluid">
<!--begin::Container-->
<div class=" container ">
   <!--begin::Row-->
   <div class="row">
      <div class="col-lg-12">
         <!--begin::Card-->
         <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
               <h3 class="card-title">
                  Edit Hotel Merchant Includes
               </h3>
            </div>
            <!--begin::Form-->
            <form  action="{{url('merchant/hotel/submit_hotels_merchant')}}" class="form" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   <div class="card-body">
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Title :</label>
                        <input type="text" name="hotel_title" class="form-control" placeholder="Enter Hotel Include" value="{{ old('hotel_title') }}">
                        @if ($errors->has('hotel_title'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('hotel_title') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Sub Title :</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="Enter Sub Heading" value="{{ old('sub_title') }}">
                        @if ($errors->has('sub_title'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('sub_title') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-lg-6">
                        <label class="form-control-label" for="type">Type :</label>
                        <select id="city" class="form-control" name="type" required="">
                           <option value="">Select</option>
                           <option value="1" {{ (old('is_paid') == '0') ? 'selected' : '' }}> 1</option>
                        </select>
                        @if ($errors->has('city'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('city') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label for="exampleInputPassword1">Featured Image :</label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="featured_img" accept=".jpg,.jpeg,.png" id="featured_img">
                           <label class="custom-file-label" for="featured_img" value="">Choose file</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-lg-6">
                        <label class="form-control-label" for="Status">Status :</label>
                        <select id="status" class="form-control" name="status" required="">
                           <option value="">Select</option>
                           <option value="Active">Active</option>
                           <option value="NO">Inactive</option>
                           <option value="NO">Blocked</option>
                           <option value="NO">Onhold</option>
                        </select>
                        @if ($errors->has('status'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('status') }}</strong>
                           </span>
                        @endif
                     </div>
                      <div class="col-lg-6">
                        <label>Description :</label>
                        <textarea name="description" id="description" class="form-control required summernote" cols="30" rows="10"></textarea>
                        @if ($errors->has('description'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('description') }}</strong>
                           </span>
                        @endif
                     </div>
                     
                  </div>
               </div>
               <div class="card-footer">
                  <div class="row">
                     <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--end::Card-->
      </div>
   </div>
   <!--end::Container-->
</div>
</div>
@endsection
@section('pageScript')
<script type="text/javascript">
   $('#capacity_attributes').DataTable({
      "responsive": true
   });

$(document).ready(function() {
   $('#featured_img').change(function() {
     var i = $(this).next('label').clone();
     var name = $('#featured_img')[0].files[0].name;
     console.log(name);
     $(this).next('label').text(name);
   });

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
</script>
@endsection