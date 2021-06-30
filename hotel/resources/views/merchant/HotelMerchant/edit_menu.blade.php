@extends('merchant.layout.main')
@section('content')

    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="card card-custom gutter-b" style="box-shadow: none;">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title w-100">
                                <h1 class="m-auto">
                                    Add your Menu’s
                                </h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-custom gutter-b example example-compact" id="menu_form">
                                <div class="card card-custom gutter-b">
                                    <form action="{{url('merchant/hotel/submitIncludeMenuMerchant')}}" runat="server"
                                          method="post"
                                          enctype="multipart/form-data" name="menu_form">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="hotels_sub_entity_id" value="{{$hotels_sub_entity_id}}">
                                        <input type="hidden" name="menu_id" value="{{$id}}">
                                        <div class="bg-warning-o-100 card-header">
                                            <label class="col-sm-2" for="capacity_attribute_id">Menu Category </label>
                                            <input type="text" placeholder="Enter Menu Category Title"
                                                   class="col-sm-6 form-check-inline form-control pl-3"
                                                   id="category_title" name="category_title" value="{{ $category_title ?? '' }}" autocomplete="off">
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group validated col-md-4">
                                                    <input type="text" placeholder="Enter Menu Title"
                                                           class="form-control" id="menu_title" name="title"
                                                           style="margin-top: 8px;" value="{{ $title ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6" id="website_inputmenu">
                                                    <label for="exampleTextarea">Menu Cover Image</label>
                                                    <input type="file" name="image" id="profile_image"
                                                           onchange="loadPreview(this);" class="form-control"
                                                           accept="image/*">
                                                    <img src="{{ asset('storage/hotels_sub_entity_menu/'.$image)}}"
                                                         alt="image" style="height:  70px;"/>
                                                </div>
                                                <div class="form-group col-md-5" id="website_inputmenu">
                                                    <label for="exampleTextarea">Menu PDF</label>
                                                    <input type="file" class="form-control" id="exampleTextarea"
                                                           name="doc_file" accept=".pdf">
                                                    <div href="#" class="btn btn-danger btn-sm" style=" margin-left: 38px;"
                                                            data-toggle="modal" data-target="#hotelImage_{{$id}}">PDF
                                                    </div>
                                                    <div id="hotelImage_{{$id}}" class="modal" tabindex=""
                                                         style=" padding-right: 17px;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content modal-lg">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal">×
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <iframe
                                                                        src="{{ asset('storage/hotels_sub_entity_menu/'.$doc_file)}}"
                                                                        width="100%" height="550"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group validated col-md-7">
                                                    <label class="form-control-label" for="menu_cost"><span
                                                            class="font-weight-boldest">Original Cost (Per Person) </span><span
                                                            class="small">(All prices are inclusive of municipality fee, service charge and 5% VAT)</span></label>
                                                    <input onkeypress="return isNumberKey(event)" type="text"
                                                           placeholder="Enter cost" class="form-control col-sm-3"
                                                           id="menu_cost_0" name="cost" value="{{ $cost ?? '' }}">
                                                </div>
                                                <div class="form-group validated col-md-5">
                                                    <label class="form-control-label" for="discount_percentage">Special
                                                        Discount for hotels venues minimum starts from 15%</label>
                                                    <select name="discount" class="form-control col-sm-5"
                                                            onchange="calculateprice(this, 0)">
                                                        <option selected style="display: none">Select discount %
                                                        </option>
                                                        <option value="15" @if($discount == "15.00") selected @endif>15 %</option>
                                                        <option value="20" @if($discount == "20.00") selected @endif>20 %</option>
                                                        <option value="25" @if($discount == "25.00") selected @endif>25 %</option>
                                                        <option value="30" @if($discount == "30.00") selected @endif>30 %</option>
                                                        <option value="35" @if($discount == "35.00") selected @endif>35 %</option>
                                                    </select>
                                                </div>

                                                <div class="form-group validated col-md-3">
                                                    <label class="form-control-label" for="menu_discount">Discounted
                                                        Price (Per Person): </label>
                                                    <input disabled type="text" class="form-control" value=""
                                                           id="menu_discount_0" name="discounted_price">
                                                </div>
                                                <div id="show_discount_0" style="display: none;">
                                                    <div class="col-sm-5 pl-10">
                                                        <label class="form-control-label font-weight-boldest">10 AED for
                                                            HotelsVenues</label>
                                                        <input disabled type="text"
                                                               class="form-control font-weight-boldest font-size-h4 text-center"
                                                               value="+ 10">
                                                    </div>
                                                    <div class="form-group validated">
                                                        <label class="form-control-label">Will show on your ads at home
                                                            page</label>
                                                        <input disabled type="text" class="form-control" value=""
                                                               id="customer_discount_0" name="customer_discount">
                                                    </div>
                                                </div>
{{--                                                <div class="form-group ml-auto">--}}
{{--                                                    <button type="button" class="btn btn-outline-success" data-count="0"--}}
{{--                                                            id="addSocialmenu">--}}
{{--                                                        <i class="flaticon2-plus"></i> Add New Menu--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-sm-12 text-center">--}}
{{--                                                    <div class="btn btn-outline-dark w-25" onclick="openPreview()">--}}
{{--                                                        Preview--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div id="social_inputmenu"></div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group pl-6">
                                                <button type="Submit" class="btn btn-primary mr-2">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <div class="modal fade in" id="preview-modal" tabindex="-1" role="dialog" aria-labelledby="preview-modal">
                <div class="wrapper">
                    <div class="inner">
                        <div class="modal-dialog width-400px sign-in-modal" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="text-center">Preview</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img id="preview_img"
                                                 src="https://w3adda.com/wp-content/uploads/2019/09/No_Image-128.png"
                                                 class="w-100"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            @section('pageScript')
                <script>
                    function loadPreview(input, id) {
                        id = id || '#preview_img';
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $(id).attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    function openPreview() {
                        var menu_cost = document.menu_form.cost.value;
                        var menu_discount = document.menu_form.discount.value;
                        var title = document.menu_form.title.value;
                        console.log("MENU", menu_cost, menu_discount, title);
                        $('#preview-modal').modal('show');
                    }

                    function isNumberKey(evt) {
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if (charCode != 46 && charCode > 31
                            && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }

                    function calculateprice(data, i) {
                        var menu_cost = $('input[id=menu_cost_' + i + ']')[0].value;
                        var total = parseFloat(menu_cost);
                        total = total - ((parseFloat(data.value) / 100) * total);
                        document.getElementById("show_discount_" + i).style.display = "flex";
                        $('input[id=menu_discount_' + i + ']').val(total);
                        $('input[id=customer_discount_' + i + ']').val(parseFloat(total) + 10);
                    }
                </script>
                <script type="text/javascript">
                    var f = 1;
                    $(document).ready(function () {
                        $('#addSocial').on('click', function () {
                            var count = $(this).attr('data-count');
                            var counter = parseInt(count) + 1;
                            if (counter < 5) {
                                $(this).attr('data-count', counter);
                                $('#removeaddSocial').attr('data-count', counter);

                            }
                        });
                        $('#removeaddSocial').on('click', function () {
                            count1 = $(this).attr('data-count');
                            var counter = parseInt(count1) - 1;
                            if (counter >= 0) {
                                $(this).attr('data-count', counter);
                                $('#addSocial').attr('data-count', counter);
                                if ($('#social_input > div').length > 1) {
                                    $('#social_input > div').last().remove();
                                    $('#website_input > div').last().remove();
                                }
                            }
                        });
                    });

                    function dltTrTrabgle(v) {
                        $('.div_f_' + v).remove();
                    }
                </script>
                <script type="text/javascript">
                    var f = 1;
                    $(document).ready(function () {
                        $('#addSocialmenu').on('click', function () {
                            var count = $(this).attr('data-count');
                            var counter = parseInt(count) + 1;
                            if (counter < 5) {
                                $(this).attr('data-count', counter);
                                $('#removeaddSocialmenu').attr('data-count', counter);
                                $('#social_inputmenu').append('<div  style="position: relative;" class="menu_items div_f_' + f +
                                    '" data-id="' + f +
                                    '"><span type="button" class="" onclick="dltTrTrabgle(' + f + ')" style="\n' +
                                    '    position: absolute;\n' +
                                    '    top: 10px;\n' +
                                    '    right: 10px;\n' +
                                    '"><i class="flaticon2-cancel-music text-danger"></i></span><div class="form-group validated col-md-4 row">' +
                                    '<input type="text" placeholder="Enter Menu Title ' + (f + 1) + '" class="form-control" id="exampleTextarea" name="title[]" style="margin-top: 8px;"></div>' +
                                    '<div class="row">' +
                                    '<div class="form-group col-md-6" id="website_inputmenu">' +
                                    '<label for="exampleTextarea">Menu ' + (f + 1) + ' Cover Image</label>' +
                                    '<input type="file" name="image[]" id="profile_image" onchange="loadPreview(this);" class="form-control" accept="image/*"></div>' +
                                    '<div class="form-group col-md-5" id="website_inputmenu">' +
                                    '<label for="exampleTextarea">Menu ' + (f + 1) + ' PDF</label>' +
                                    '<input type="file" class="form-control" id="exampleTextarea" name="doc_file[]" accept=".pdf"></div>' +
                                    '<div class="form-group validated col-md-7">' +
                                    '<label class="form-control-label" for="menu_cost_' + (f + 1) + '"><span class="font-weight-boldest">Original Cost (Per Person) </span><span class="small">(All prices are inclusive of municipality fee, service charge and 5% VAT)</span></label>' +
                                    '<input onkeypress="return isNumberKey(event)" type="text" placeholder="Enter cost" class="form-control col-sm-3" id="menu_cost_' + (f) + '" name="cost[]"></div>' +
                                    '<div class="form-group validated col-md-5">' +
                                    '<label class="form-control-label" for="discount_percentage">Special Discount for hotels venues minimum starts from 15%</label>' +
                                    '<select name="discount" class="form-control col-sm-5" onchange="calculateprice(this,' + f + ')">\n' +
                                    '                                                    <option selected style="display: none">Select discount %</option>\n' +
                                    '                                                    <option value="15">15 %</option>\n' +
                                    '                                                    <option value="20">20 %</option>\n' +
                                    '                                                    <option value="25">25 %</option>\n' +
                                    '                                                    <option value="30">30 %</option>\n' +
                                    '                                                    <option value="35">35 %</option>\n' +
                                    '                                                </select></div>' +
                                    '<div class="form-group validated col-md-3"><label class="form-control-label" for="menu_discount">Discounted Price (Per Person): </label>\n' +
                                    '<input disabled type="text" class="form-control" value="" id="menu_discount_' + f + '" name="discounted_price"></div><div id="show_discount_' + f + '" style="display: none;">\n' +
                                    '<div class="col-sm-5 pl-10">\n' +
                                    '                                                    <label class="form-control-label font-weight-boldest">10 AED for HotelsVenues</label>\n' +
                                    '                                                    <input disabled type="text" class="form-control font-weight-boldest font-size-h4 text-center" value="+ 10" >\n' +
                                    '                                                </div>\n' +
                                    '                                                <div class="form-group validated">\n' +
                                    '                                                    <label class="form-control-label">Will show on your ads at home page</label>\n' +
                                    '                                                    <input disabled type="text" class="form-control" value="" id="customer_discount_' + f + '" name="customer_discount">\n' +
                                    '                                                </div>' +
                                    '</div>\n' +
                                    '</div>' +
                                    '</div></div>');
                                f++;
                            }
                        });
                        $('#removeaddSocialmenu').on('click', function () {
                            count1 = $(this).attr('data-count');
                            var counter = parseInt(count1) - 1;
                            if (counter >= 0) {
                                $(this).attr('data-count', counter);
                                $('#addSocialmenu').attr('data-count', counter);
                                if ($('#social_inputmenu > div').length > 1) {
                                    $('#social_inputmenu > div').last().remove();
                                    $('#website_inputmenu > div').last().remove();
                                }
                            }
                        });
                    });

                    function dltTrTrabgle(v) {
                        $('.div_f_' + v).remove();
                    }
                </script>
                <script>
                    $(document).ready(function () {
                        $('#capacity').click(function () {
                            $('#capacity_form').css({
                                "display": "inherit"
                            });
                        });
                        $('#menu').click(function () {
                            $('#menu_form').css({
                                "display": "inherit"
                            });
                        });
                    });
                </script>
@endsection
