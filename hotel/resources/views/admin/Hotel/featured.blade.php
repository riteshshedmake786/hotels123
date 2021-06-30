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
          Hotel Details                           </a>
          <!--end::Item-->
          <!--begin::Item--> <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotel/hotelList') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">Hotel List</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="{{ url('admin/hotelview') }}" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel View</a>
          <span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Featured </a>
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
            @if(!empty($hotelsData->featured_image))
            <img src="{{url('storage/hotelsFeaturedImages/'.$hotelsData->featured_image)}}" alt="image" /> 
            @else
            <img src="{{asset('supplier_assets/media/users/hotel.jpg')}}" alt="image" /> 
            @endif
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
            <div class="d-flex mr-3"> <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$hotelsData->name}}</a>
             <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a> 
           </div>
           <div class="my-lg-0 my-3">
            <button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#hotelImage">Gallery</button>
            <button type="button" class="btn btn-sm btn-info font-weight-bolder text-uppercase" data-toggle="modal" data-target="#hotelViewPageMap">Map</button>
          </div>
        </div>

        <!--begin::Content-->
        <div class="d-flex flex-wrap justify-content-between mt-1">
          <div class="d-flex flex-column flex-grow-1 pr-8">
            <div class="d-flex flex-wrap mb-4"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-new-email mr-2 font-size-lg"></i>admin@std.com</a> 
              <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Dubai</a> 
            </div><span class="font-weight-bold text-dark-50 text-justify">
              <?php echo $hotelsData->description?></span>
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
      <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Total Includes</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$inclued_count}}</span>
      </div>
    </div>
    <!--end::Item-->
    
    <!--begin::Item-->
    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
      <i class="far fa-star display-4 text-muted font-weight-bold"></i>
    </span>
    <div class="d-flex flex-column text-dark-75"> <span class="font-weight-bolder font-size-sm">Grade</span> <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$hotelsData->grade}}</span>
    </div>
  </div>
  <!--end::Item-->

  <!--begin::Item-->
  <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2"> <span class="mr-4">
    <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
  </span>
  <div class="d-flex flex-column flex-lg-fill"> <span class="text-dark-75 font-weight-bolder font-size-sm">capacity</span><span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>{{$hotelsData->capacity}}</span> </div>
</div>
<!--end::Item-->
</div>
</div>
</div> 
<!--end::Card-->
<!--begin::Card-->
<div class="card card-custom gutter-b">

  <div class="card-body">
    <!--begin::Example-->
    <div class="example">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link " id="HotelIncludes"  href="{{url('admin/hotel/hotelView/'.$hotelsData->id)}}"> <span class="nav-icon"><i class="fas fa-house-user"></i></span> <span class="nav-text">Hotel Venue List</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="KeyFact"  href="{{url('admin/hotel/keyFact/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="fas fa-key"></i></span> <span class="nav-text">Key Facts</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="Capacity"  href="{{url('admin/hotel/capacity/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text"> Hotel Capacity</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="featured"  href="{{url('admin/hotel/featured/'.$hotelsData->id)}}" aria-controls="profile"> <span class="nav-icon"><i class="flaticon2-layers-1"></i></span> <span class="nav-text">Hotel Featured</span> </a>
        </li>
      </ul>
      <div class="tab-content mt-5" id="myTabContent">
        <div class="card card-custom gutter-b" style="box-shadow: none;">
          <div class="card-header flex-wrap py-3">
            <div class="card-title">
              <h1 class="card-label">
                Hotel Featured
              </h1> </div>
              <a href="#" class="btn btn-primary font-weight-bolder" style=" height: 37px;">
                <span class=""></span>Submit
              </a>
            </div>   
            <div class="card-body">
              <form class="form" action="{{url('admin/hotel/submitFeatureForm')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                <div class="form-group row">
                  <div class="col-12 col-form-label">
                    <div class="form-group row">
                      <?php $i = 0; ?>

                      @foreach($featureList as $key => $fList)
                      <div class="form-group col-md-3">
                        <div class="checkbox-inline">
                          <input type="hidden" name="feature_attribute_id[]" value="{{isset($fList->id) ? $fList->id : ''}}">
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox_{{$i}}" value="true" {{isset($fList->description) && $fList->description=='1' ? 'checked' : ''}} />
                            <span></span>
                            {{$fList->title}}
                          </label>
                          <?php $i++; ?>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="btn-group-toggle text-right" data-toggle="buttons">
                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
               </div>
             </form> 
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

<!-- map model -->
<div class="modal fade" id="hotelViewPageMap" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$hotelsData->name}}
          <span class="float-right">(Latitude - {{ $hotelsData->lat }} | Longitude - {{ $hotelsData->long }})</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i> </button>
      </div>
      <div class="modal-body">
        <iframe src = "https://maps.google.com/maps?q={{$hotelsData->lat}},{{$hotelsData->long}}&hl=es;z=30&amp;output=embed" width="100%" height="550"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- image gallery -->

<div id="hotelImage" class="modal" tabindex="" style=" padding-right: 17px;">
  <div class="modal-dialog modal-lg">
   <div class="modal-content modal-lg">
    <div class="modal-header">

     <h5 class="modal-title">Hotel Gallery</h5>
     <button type="button" class="close" data-dismiss="modal">×</button>
   </div>
   <div class="modal-body">
     <div class="row">
      @if($gallery_images)
      @php $i=1 @endphp
      @foreach($gallery_images as $imgUp)

      <div class="col-sm-6 col-lg-3 mb-5" id="galleryDiv_{{$imgUp->id}}">
       <div class="card">
                      <!-- <div class="card-img-actions m-1"> <img class="card-img img-fluid" style="height: 130px" src="{{ url('storage/hotelsGalleryImages/'.$imgUp->image )}}?f=650x650&format=auto" alt="">
                      </div> -->
                      <div class="image-input image-input-outline" id="kt_image_{{$i++}}" style="background-image: url(assets/media/users/blank.png)">
                        <div class="image-input-wrapper card-img img-fluid" style="background-image: url({{ url('storage/hotelsGalleryImages/'.$imgUp->image )}}); height: 130px; background-repeat: no-repeat; width: 100%;"></div>
                        
                        <a href="javascript:void(0)" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Remove image" onclick="deleteHotelGallery({{$imgUp->id}})">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
                <form class="form" action="{{ url('admin/hotel/editHotelsGalleryData') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{$hotelsData['id']}}">
                  <div class="form-group row">
                   <div class="col-lg-12 pt-5">
                    <label for="exampleInputPassword1">Or Add New Images In Gallery :</label>
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
              </div>
              <div class="card-footer pt-4">
                <div class="row">
                 <div class="col-lg-12">
                  <button type="submit" class="btn btn-primary mr-2">Upload</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
            </div>
          </form>
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
      console.log('id is= '+ $galleryId);
        var div_id = "#galleryDiv_"+ $galleryId; // Use # here
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
              if(data.status == 200) {
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
    </script>
    @endsection