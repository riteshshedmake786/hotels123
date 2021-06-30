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
                        <a href="#" class="opacity-75 hover-opacity-100"> <i
                                class="flaticon2-shelter text-dark icon-1x"></i> </a>
                        <!--end::Item-->
                        <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                            href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                            Hotels Attribute</a>
                        <!--end::Item-->
                        <!--begin::Item--><span class="label label-dot label-sm bg-dark opacity-75 mx-3"></span> <a
                            href="#" class="text-dark text-hover-dark opacity-75 hover-opacity-100">
                            Hotel Event Type </a>
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
                                Add Hotel Event Type
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="post" action="{{ url('admin/event_type/add') }}" id="form1"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="capId" name="id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                           value="{{ old('title') }}" required>
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
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                               accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="image" value="{{ old('image') }}"
                                               style="overflow: hidden;">Choose file</label>

                                    </div>
                                    <div id="image_view">

                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">
        <strong>{{ $errors->first('image') }}</strong>
      </span>
                                    @endif
                                </div>
								
								
								<div class="form-group">
                                    <label class="form-control-label" for="image">Indoor Image</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="indoor_image" id="indoor_image"
                                               accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="image" value="{{ old('indoor_image') }}"
                                               style="overflow: hidden;">Choose file</label>

                                    </div>
                                    <div id="image_view1">

                                    </div>
                                    @if ($errors->has('indoor_image'))
                                        <span class="text-danger">
        <strong>{{ $errors->first('indoor_image') }}</strong>
      </span>
                                    @endif
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="form-control-label" for="image">Outdoor Image</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="outdoor_image" id="outdoor_image"
                                               accept=".jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="image" value="{{ old('outdoor_image') }}"
                                               style="overflow: hidden;">Choose file</label>

                                    </div>
                                    <div id="image_view2">

                                    </div>
                                    @if ($errors->has('outdoor_image'))
                                        <span class="text-danger">
        <strong>{{ $errors->first('outdoor_image') }}</strong>
      </span>
                                    @endif
                                </div>
								
								
								
					 <div class="form-group validated">
                        <label class="form-control-label" for="status">Type</label>
                        <select class="form-control" id="type" name="type" required>
                        
                            <option value="Social" {{ (old('type') == 'Social') ? 'selected' : '' }}> Social</option>
                            <option value="Corporate" {{ (old('type') == 'Corporate') ? 'selected' : '' }}>Corporate</option>
                        </select>
                        @if ($errors->has('type'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                      </div>
								
								
								
                                <div class="form-group d-none" id="is_deleted_div">
                                    <label>Is Deleted</label>
                                    <div class="checkbox-list">
                                        <label
                                            class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary checkbox-lg">
                                            <input type="checkbox" name="is_deleted" id="is_deleted"
                                                   value="1" {{ (old('is_deleted') == 1) ? 'checked' : '' }}>
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
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Event Type List</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable" id="event_attributes">
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
                                @foreach($eventType as $eAtt)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $eAtt->title }}   </td>
                                        <td>
										
                                            <img class="image_fade"
                                                 src="{{ asset('storage/eventTypeImg/'.$eAtt->image)}}"
                                                 style="width:100px; height: 68px;">
												 
									   </td>
                                        <td><span
                                                class="label label-lg font-weight-bold {{ $eAtt->is_deleted == 0 ? 'label-light-primary' : 'label-light-danger' }} label-inline">{{ $eAtt->is_deleted == 0 ? 'No' : 'Yes' }}</span>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                               title="Edit details" onclick="editEventType({{$eAtt->id}})">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <!-- <div id="" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                               <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                     <div class="modal-header">
                                                        <h5 class="modal-title" style="width: 100%;">Title<span class="float-right"></span></h5>
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                     </div>
                                                     <div class="modal-body">
                                                        <embed src="" frameborder="0" width="100%" height="400px">
                                                     </div>
                                                  </div>
                                               </div>
                                             </div> -->
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
            $('#event_attributes').DataTable({
                "responsive": true
            });

            $('#image').change(function () {
                var i = $(this).prev('label').clone();
                var file = $('#image')[0].files[0].name;
                $(this).next('label').text(file);
            });
        });

        function editEventType($id) {
			
			
			 // alert($id);
			  
            $('#image_view').empty();
			
			$('#image_view1').empty();
			
			$('#image_view2').empty();

            $.get("{{ url('/admin/event_type/edit/')}}/" + $id, function (data, status) {


               
			   
                var imgSrc = "{{ asset('storage/EventTypeImg')}}" + "/" + data.image;
				
				var imgSrc1 = "{{ asset('storage/EventTypeImg')}}" + "/" + data.indoor_image;
				 
				var imgSrc2 = "{{ asset('storage/EventTypeImg')}}" + "/" + data.outdoor_image;
            
                $('#image_view').append('<img src="' + imgSrc + '" style="width:100px;">');
				
				$('#image_view1').append('<img src="' + imgSrc1 + '" style="width:100px;">');
				
				$('#image_view2').append('<img src="' + imgSrc2 + '" style="width:100px;">');
				

                $('#is_deleted_div').removeClass('d-none');
                $('#is_deleted_div').addClass('d-block');

              
				
				var conceptName = $('#type').val(data.type);


                if (data.is_deleted == 0) {
                    $('#is_deleted').prop('checked', false);
                } else {
                    $('#is_deleted').prop('checked', true);
                }



                $('#title').val(data.title);
                //$('#is_deleted').val(data.is_deleted);
                $('#capId').val(data.id);
                $('#form-heading').text('Edit Hotel Event');
                $('.btn-primary').text('Update');
                $('#form1').attr('action', '{{ url("/admin/event_type/update") }}');
            });
        }
    </script>
@endsection
