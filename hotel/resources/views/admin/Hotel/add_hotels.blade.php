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
          Hotel Details                            </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotel/hotelList') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel List</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Add Hotel</a>
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
                  Add Hotel
               </h3>
            </div>
            <!--begin::Form-->
            <form class="form" action="{{ url('admin/hotel/addHotelsData') }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="card-body">
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Hotel Name :</label>
                        <input type="text" name="hotel_name" class="form-control" placeholder="Enter Hotel name" value="{{ old('name') }}">
                        @if ($errors->has('hotel_name'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('hotel_name') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Hotel Sub Heading :</label>
                        <input type="text" name="sub_heading" class="form-control" placeholder="Enter Sub Heading" value="{{ old('sub_heading') }}">
                        @if ($errors->has('sub_heading'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('sub_heading') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Location :</label>
                        <div class="input-group">
                           <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{ old('location') }}">
                        </div>
                        @if ($errors->has('location'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('location') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label class="form-control-label" for="country">Country :</label>
                        <select id="country" class="form-control" name="country" >
                           <option value="">Select</option>
                           @foreach($Countri as $c)
                           <option value="{{$c->id}}">{{$c->name}}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('country'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('country') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label class="form-control-label" for="state">State :</label>
                        <select id="state" class="form-control" name="state" >
                           <option value="">Select</option>
                           @foreach($State as $st)
                           <option value="{{$st->id}}">{{$st->name}}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('state'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('state') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label class="form-control-label" for="city">City :</label>
                        <select id="city" class="form-control" name="city" >
                           <option value="">Select</option>
                           @foreach($City as $ci)
                           <option value="{{$ci->id}}">{{$ci->name}}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('city'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('city') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Latitude :</label>
                        <div class="input-group">
                           <input type="text" name="latitude" class="form-control" placeholder="Enter Latitude" value="{{ old('latitude') }}">
                        </div>
                        @if ($errors->has('latitude'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('latitude') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Longitude :</label>
                        <div class="input-group">
                           <input type="text" name="longitude" class="form-control" placeholder="Enter Longitude" value="{{ old('longitude') }}">
                        </div>
                        @if ($errors->has('longitude'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('longitude') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Phone Number :</label>
                        <div class="input-group">
                           <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
                        </div>
                        @if ($errors->has('phone_number'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('phone_number') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Capacity :</label>
                        <div class="input-group">
                           <input type="number" name="capacity" class="form-control" placeholder="Enter Capacity" value="{{ old('capacity') }}">
                        </div>
                        @if ($errors->has('capacity'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('capacity') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label for="exampleInputPassword1">Hotel Gallery :</label>
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
                     <div class="col-lg-6">
                        <label for="exampleInputPassword1">Hotel Image :</label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="featured_image" accept=".jpg,.jpeg,.png" id="featured_image">
                           <label class="custom-file-label" for="featured_image" value="" style="overflow: hidden;">Choose file</label>
                        </div>
                        @if ($errors->has('featured_image'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('featured_image') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Description :</label>
                        <textarea name="description" id="description" class="form-control required summernote" cols="30" rows="10"></textarea>
                        @if ($errors->has('description'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('description') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Summary :</label>
                        <textarea name="summary" id="summary" class="form-control required summernote" cols="30" rows="10"></textarea>
                        @if ($errors->has('summary'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('summary') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <!-- <div class="col-lg-6">
                        <div class="form-group">
                           <label>Is Deleted :</label>
                           <div class="radio-inline">
                              <label class="radio">
                              <input type="radio" name="radios2">
                              <span></span>
                              Yes
                              </label>
                              <label class="radio">
                              <input type="radio" name="radios2">
                              <span></span>
                              No
                              </label>
                           </div>
                        </div>
                     </div> -->
                      <div class="col-lg-6">
                        <label class="form-control-label" for="Status">Status :</label>
                        <select id="status" class="form-control" name="status" >
                           <option value="">Select</option>
                           <option value="ACTIVE">ACTIVE</option>
                           <option value="INACTIVE">INACTIVE</option>
                           <option value="BLOCKED">BLOCKED</option>
                           <option value="ONHOLD">ONHOLD</option>
                        </select>
                        @if ($errors->has('status'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('status') }}</strong>
                           </span>
                        @endif
                     </div>

                     <!-- <div class="col-lg-6">
                        <label class="form-control-label" for="hotel_by">Hotel By:</label>
                        <select id="by" class="form-control " name="by" >
                           <option value="">Select</option>
                           <option value="Admin">Admin</option>
                           <option value="Supplier">Supplier</option>
                           <option value="merchant">merchant</option>
                        </select>
                        @if ($errors->has('by'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('by') }}</strong>
                           </span>
                        @endif
                     </div> -->

                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Is Featured :</label>
                           <div class="radio-inline">
                              <label class="radio">
                              <input type="radio" value='1' name="is_featured">
                              <span></span>
                              Yes
                              </label>
                              <label class="radio">
                              <input type="radio" value='0' name="is_featured">
                              <span></span>
                              No
                              </label>
                           </div>
                           @if ($errors->has('is_featured'))
                              <span class="text-danger">
                                 <strong>{{ $errors->first('is_featured') }}</strong>
                              </span>
                           @endif
                        </div>
                     </div>
                  </div>
                     <div class="form-group row">
                     <div class="col-lg-6">
                        <label for="exampleInputPassword1">Banner Image :</label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="banner_img" accept=".jpg,.jpeg,.png" id="banner_img">
                           <label class="custom-file-label" for="banner_img" value="" style="overflow: hidden;">Choose file</label>
                        </div>
                        @if ($errors->has('banner_img'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('banner_img') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label class="form-control-label" for="grade">Grade :</label>
                        <select id="grade" class="form-control" name="grade" >
                           <option value="">Select</option>
                           <option value="1">One Star</option>
                           <option value="2">Two Stars</option>
                           <option value="3">Three Stars</option>
                           <option value="4">Four Stars</option>
                           <option value="5">Five Stars</option>
                        </select>
                        @if ($errors->has('grade'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('grade') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                 </div>
               <div class="card-footer">
                  <div class="row">
                     <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button type="reset" class="btn btn-secondary"><a href="{{ url('/admin/hotelList')}}">Cancel</a></button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--end::Card-->
      </div>
   </div>
</div>
   <!--end::Container-->
</div>
@endsection
@section('pageScript')

<script type="text/javascript">
   $('#capacity_attributes').DataTable({
      "responsive": true
   });

$(document).ready(function() {
   $('#featured_image').change(function() {
     var i = $(this).next('label').clone();
     var name = $('#featured_image')[0].files[0].name;
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
   $('#banner_img').change(function() {
     var i = $(this).next('label').clone();
     var name = $('#banner_img')[0].files[0].name;
     console.log(name);
     $(this).next('label').text(name);
   });
  
});
</script>
@endsection