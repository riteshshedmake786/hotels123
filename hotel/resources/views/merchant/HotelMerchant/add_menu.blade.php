@extends('merchant.layout.main')
@section('content')
<div class=" container ">
   <!--begin::Row-->
   <div class="row">
      <div class="col-lg-12">
         <!--begin::Card-->
         <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
               <h3 class="card-title">
               Add Menu 
               </h3>
            </div>
            <form action="{{url('merchant/hotel/submitIncludeMenuMerchant')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              
            <input type="hidden" name="hotels_sub_entity_id" value="{{$hotels_sub_entity_id}}">
              <div class="row">
                <div class="form-group validated col-md-3">
                  <label class="form-control-label" for="capacity_attribute_id">Title</label>
                  <input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title[]" >
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">Image</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="image[]" >
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">File</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="doc_file[]" accept=".doc" >
                </div>
                <div class="form-group m-auto">
                  <button type="button" class="btn btn-outline-success btn-icon btn-circle" data-count="0" id="addSocial"><i class="flaticon2-plus"></i></button>
                </div>
              </div>

              <div id="social_input"></div>

              <div class="form-group">
               <button type="Submit" class="btn btn-primary mr-2">Submit</button>
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
             </div>
           </form>

            <!--end::Form-->
         </div>
         <!--end::Card-->
      </div>
   </div>
   <!--end::Container-->
</div>
@endsection
@section('pageScript')
<script type="text/javascript">
  var f = 1;
 $(document).ready(function(){
  $('#addSocial').on('click',function(){
      var count = $(this).attr('data-count');
      var counter = parseInt(count) + 1;
      if(counter < 5){
        $(this).attr('data-count', counter);
        $('#removeaddSocial').attr('data-count', counter);
        $('#social_input').append('<div class="row div_f_'+f+'" data-id="'+f+'"><div class="form-group validated col-md-3"><label class="form-control-label" for="capacity_attribute_id">Title</label><input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title[]" ></div><div class="form-group col-md-4" id="website_input"><label for="exampleTextarea">Image</label><input type="file" class="form-control" id="exampleTextarea" name="image[]" ></div><div class="form-group col-md-4" id="website_input"><label for="exampleTextarea">File</label><input type="file" class="form-control" id="exampleTextarea" name="doc_file[]" accept=".doc" ></div><div class="form-group m-auto"><button type="button" class="btn btn-outline-danger btn-icon btn-circle" onclick="dltTrTrabgle('+f+')"><i class="flaticon2-cancel-music"></i></button> </div></div>');
        f++;
      }  
    });
    $('#removeaddSocial').on('click', function(){
        count1 = $(this).attr('data-count');
        var counter = parseInt(count1) - 1;
        if(counter >= 0){
        $(this).attr('data-count', counter);
        $('#addSocial').attr('data-count', counter);
        if($('#social_input > div').length > 1) {
        $('#social_input > div').last().remove();
        $('#website_input > div').last().remove();
        }
      }
   });
});

 function dltTrTrabgle(v){
    $('.div_f_'+v).remove();
  }  
</script>
@endsection