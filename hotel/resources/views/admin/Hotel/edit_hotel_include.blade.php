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
           <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotelListview') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
            Hotel View</a>
           <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Edit Hotel Venue</a>
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
                  Edit Hotel Venue
               </h3>
            </div>
            <!--begin::Form-->
            <form  action="{{url('admin/hotel/updateHotelsInclude')}}" class="form" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
               <div class="card-body">
                <input type="hidden" name="id" value="{{$hotelSubEntity['id']}}">
                <input type="hidden" name="hotel_id" value="{{$hotelSubEntity['hotel_id']}}">
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label>Venue Name :</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Hotel Venue" value="{{$hotelSubEntity['title']}}">
                        @if ($errors->has('title'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('title') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label>Venue Sub Title :</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="Enter Sub Heading" value="{{$hotelSubEntity['sub_title']}}">
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
                        <select id="type" class="form-control" name="type" required="">
                           <option value="">Select</option>
                           @foreach($typeList as $t)
                            <option value="{{ $t->id }}" {{ isset($hotelSubEntity->type) && ($hotelSubEntity->type == $t->id) ? 'selected' : '' }}>{{ $t->name }}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('type'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('type') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="col-lg-6">
                        <label class="form-control-label" for="include_type">Include Type :</label>
                        <select id="include_type" class="form-control" name="include_type" required="">
                          <option value="">Select</option>
                          <option value="indoor" {{ ($hotelSubEntity['include_type'] == 'indoor') ? 'selected' : '' }}>Indoor</option>
                          <option value="outdoor" {{ ($hotelSubEntity['include_type'] == 'outdoor') ? 'selected' : '' }}>Outdoor</option>
                        </select>
                        @if ($errors->has('include_type'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('include_type') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <label class="form-control-label" for="event_type">Event Type :</label>
                        <select id="event_type" class="form-control" name="event_type" required="">
                           <option value="">Select</option>
                           @foreach($eventList as $e)
                            <option value="{{ $e->id }}" {{ isset($hotelSubEntity->event_type) && ($hotelSubEntity->event_type == $e->id) ? 'selected' : '' }}>{{ $e->title }}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('event_type'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('event_type') }}</strong>
                           </span>
                        @endif
                     </div>

                      <div class="col-lg-6">
                        <label class="form-control-label" for="Status">Status :</label>
                        <select id="status" class="form-control" name="status" required="">
                          <option value="">Select</option>
                          <option value="ACTIVE" {{ ($hotelSubEntity['status'] == 'ACTIVE') ? 'selected' : '' }}>ACTIVE</option>
                          <option value="INACTIVE" {{ ($hotelSubEntity['status'] == 'INACTIVE') ? 'selected' : '' }}>INACTIVE</option>
                          <option value="BLOCKED" {{ ($hotelSubEntity['status'] == 'BLOCKED') ? 'selected' : '' }}>BLOCKED</option>
                          <option value="ONHOLD" {{ ($hotelSubEntity['status'] == 'ONHOLD') ? 'selected' : '' }}>ONHOLD</option>
                        </select>
                        @if ($errors->has('status'))
                           <span class="text-danger">
                              <strong>{{ $errors->first('status') }}</strong>
                           </span>
                        @endif
                     </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-6">
                        <label for="exampleInputPassword1">Venue Image :</label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="feature_image" accept=".jpg,.jpeg,.png" id="feature_image">
                           <label class="custom-file-label" for="feature_image" value="" style="overflow: hidden;">Choose file</label>
                          </div>
                          @if ($errors->has('feature_image'))
                             <span class="text-danger">
                                <strong>{{ $errors->first('feature_image') }}</strong>
                             </span>
                          @endif

                        <img src="{{ asset('storage/hotels_sub_entity/'.$hotelSubEntity['feature_image'])}}" width="70" height="70">
                     </div>
                     <div class="col-lg-6">
                        <label>Description :</label>
                        <textarea name="description" id="description" class="form-control required summernote" cols="30" rows="10"><?php echo $hotelSubEntity['description']?></textarea>
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
   $('#feature_image').change(function() {
     var i = $(this).next('label').clone();
     var name = $('#feature_image')[0].files[0].name;
     console.log(name);
     $(this).next('label').text(name);
   });
});
</script>
@endsection