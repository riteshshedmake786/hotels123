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
          Hotel Attribute </a>
          <!--end::Item-->
          <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
          Hotel Features Attribute </a>
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
         <div class="col-lg-5">
            <!--begin::Mixed Widget 14-->
            <div class="card card-custom gutter-b example example-compact">
               <div class="card-header">
                  <h3 id="form-heading" class="card-title">
                     Add Hotel Feature Attribute
                  </h3>
               </div>
               <!--begin::Form-->
               <form class="form" method="post" action="{{ url('admin/feature_attributes/add') }}" id="form1" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" id="feaId" name="id">
                  <div class="card-body">
                     <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required>
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label class="form-control-label" for="image">Default Image</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image" accept=".jpg,.jpeg,.png">
                            <label class="custom-file-label" for="image"  value="{{ old('image') }}" style="overflow: hidden;">Choose file</label>
                           
                        </div>
                        <div id="image_view">
                                
                        </div>
                        @if ($errors->has('image'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group d-none" id="is_deleted_div">
                        <label>Is Deleted</label>
                        <div class="checkbox-list">
                           <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary checkbox-lg">
                              <input type="checkbox" name="is_deleted" id="is_deleted" value="1" {{ (old('is_deleted') == 1) ? 'checked' : '' }}>
                              <span></span>
                           </label>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     <button type="reset" class="btn btn-secondary">Cancel</button>
                  </div>
               </form>
               <!--end::Form-->
            </div>
            <!--end::Mixed Widget 14-->
         </div>
         <div class="col-lg-7">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom gutter-b" >
               <div class="card-header flex-wrap py-3">
                  <div class="card-title">
                     <h3 class="card-label">Feature Attributes List</h3>
                  </div>
               </div>
               <div class="card-body">
                  <!--begin: Datatable-->
                  <table class="table table-bordered table-checkable" id="feature_attributes">
                     <thead>
                        <tr>
                           <th>Sr. No.</th>
                           <th>Title</th>
                           <th>Default Image</th>
                           <th>Is Deleted</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                          $i = 1;
                        @endphp
                        @foreach($featureAttribute as $fAtt)
                        <tr>
                          <td>{{$i++}}</td>
                           <td>{{ $fAtt->title }}</td>
                           <td>
                              <img class="image_fade" src="{{ asset('storage/featureAttributeImg/'.$fAtt->image)}}" style="width:100px; height: 68px;">
                           </td>
                           <td><span class="label label-lg font-weight-bold {{ $fAtt->is_deleted == 0 ? 'label-light-primary' : 'label-light-danger' }} label-inline">{{ $fAtt->is_deleted == 0 ? 'No' : 'Yes' }}</span></td>
                           <td>
                              <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details" onclick="editFeatureAttribute({{$fAtt->id}})">
                              <i class="far fa-edit"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <!--end: Datatable-->
               </div>
            </div>
            <!--end::Advance Table Widget 4-->
         </div>
      </div>
      <!--end::Row-->
   </div>
   <!--end::Container-->
</div>
@endsection
@section('pageScript')
<script type="text/javascript">
   $(document).ready(function () {
      $('#feature_attributes').DataTable({
      	"responsive": true
      });

      $('#image').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#image')[0].files[0].name;
        $(this).next('label').text(file);
      });
   });

   function editFeatureAttribute($id){
      $('#image_view').empty();

     $.get("/admin/feature_attributes/edit/"+$id, function( data, status ) {

         var imgSrc = "{{ asset('storage/featureAttributeImg')}}"+"/"+data.image;
         console.log(imgSrc);
         $('#image_view').append('<img src="'+imgSrc+'" style="width:100px;">');

         $('#is_deleted_div').removeClass('d-none');
         $('#is_deleted_div').addClass('d-block');

         console.log(data.is_deleted);

         if (data.is_deleted == 0) {
            $('#is_deleted').prop('checked',false);
         }else{
            $('#is_deleted').prop('checked',true);
         }

          $('#title').val(data.title);
          //$('#is_deleted').val(data.is_deleted);
          $('#feaId').val(data.id);
          $('#form-heading').text('Edit Hotel Feature Attribute');
          $('.btn-primary').text('Update');
          $('#form1').attr('action', '{{ url("/admin/feature_attributes/update") }}');
     });
   }
</script>
@endsection