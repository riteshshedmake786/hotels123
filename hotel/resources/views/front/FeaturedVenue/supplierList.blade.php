@extends('front.layout.header')
@section('content')


    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Supplier Listing</a></li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="title">
                            <h1>Supplier Listing</h1>
                        </div>
                        <!--end title-->
                        @foreach($supplierList as $key=>$value)
                            <div class="item list" data-map-latitude="{{ $value->lat }}"
                                 data-map-longitude="{{ $value->long }}" data-id="{{ $value->id }}">

                                <div class="image-wrapper">
                                    <div class="mark-circle description"
                                         data-toggle="tooltip"
                                         data-placement="right"
                                         title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis erat vel quam aliquet hendrerit semper eget elit. Aenean tincidunt ultrices bibendum. Proin nisi erat, iaculis non pulvinar a, scelerisque ut est. ">
                                        <i class="fa fa-question"></i>
                                    </div>
                                    <div class="mark-circle map" data-toggle="tooltip"
                                         data-placement="right"
                                         title="Show on map">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    @if($value->is_featured == 1)
                                        <div class="mark-circle top" data-toggle="tooltip"
                                             data-placement="right" title="Top accommodation">
                                            <i class="fa fa-thumbs-up"></i>
                                        </div>
                                    @endif
                                    <div class="image">
                                        <a href="{{ url('/productList/'.$value->id) }}" class="wrapper">
                                            <div class="gallery">
                                                <img src="assets/img/items/01.jpg" alt="">
                                                <img src="#" class="owl-lazy" alt="" data-src="assets/img/items/02.jpg">
                                                <img src="#" class="owl-lazy" alt="" data-src="assets/img/items/03.jpg">
                                            </div>
                                        </a>
                                        <div class="map-item">
                                            <button class="btn btn-close"><i class="fa fa-close"></i></button>
                                            <div class="map-wrapper"></div>
                                        </div>
                                        <!--end map-item-->
                                        <div class="owl-navigation"></div>
                                        <!--end owl-navigation-->
                                    </div>
                                </div>
                                <!--end image-->
                                <div class="description">
                                    <div class="meta">
                                        <span><i class="fa fa-star"></i>{{ $value->grade }}</span>
                                        <span><i class="fa fa-bed"></i></span>
                                    </div>
                                    <!--end meta-->
                                    <div class="info">
                                        <a href="{{ url('/productList/'.$value->id) }}"><h3>{{ $value->name }}</h3></a>
                                        <figure class="location">{{ $value->city_name }}</figure>
                                        <figure class="label label-info"></figure>
                                        <figure class="live-info"></figure>
                                        <p>
                                            {!! $value->description !!}
                                        </p>
                                        <div class="price-info">

                                            <a href="{{ url('/productList/'.$value->id) }}" class="btn btn-rounded btn-default btn-framed btn-small pull-right">View
                                                detail</a>
                                        </div>

                                    </div>
                                    <!--end info-->
                                </div>
                                <!--end description-->
                            </div>
                        @endforeach
                            <!--end item-->

{{--                            <div class="center">--}}
{{--                                <ul class="pagination">--}}
{{--                                    <li class="prev">--}}
{{--                                        <a href="#"><i class="arrow_left"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="active"><a href="#">1</a></li>--}}
{{--                                    <li><a href="#">2</a></li>--}}
{{--                                    <li><a href="#">3</a></li>--}}
{{--                                    <li><a href="#">4</a></li>--}}
{{--                                    <li><a href="#">5</a></li>--}}
{{--                                    <li class="next">--}}
{{--                                        <a href="#"><i class="arrow_right"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <!-- end pagination-->--}}
{{--                            </div>--}}
                            <!-- end center-->
                    </div>
                    <!--end main-content-->
                </div>
                <!--end col-md-9-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>

@endsection
@section('pageScript')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        openModal();

        function openModal() {
            console.log('work');
            $('#venueEnquiryModal').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        }

        function homePage() {
            window.location = '/';
        }

        $("#venueEnquiryModal input").prop('required', true);
        $("#venueEnquiryModal select").prop('required', true);
        $("#venueEnquiryModal textarea").prop('required', true);

        function MobileNumber(event) {
            var regex = new RegExp("^[0-9+]");
            var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submitBtn').click(function () {

            var fname = $('#first_name').val();
            var lname = $('#last_name').val();
            var mob_no = $('#mobile_no').val();
            var event_id = $('#event_type_id').val();
            var msg = $('#message').val();
            console.log('starting ajax');
            if (fname && lname && mob_no && event_id && msg != '') {
                $.ajax({
                    url: "/venueList/venue_enquiry_submit",
                    type: "post",
                    data: {
                        first_name: fname,
                        last_name: lname,
                        mobile_no: mob_no,
                        event_type_id: event_id,
                        message: msg
                    },
                    success: function (data) {
                        //var dataParsed = JSON.parse(data);
                        $('#venueEnquiryModal').modal('hide');
                    }
                });
            }

        });
    </script>
@endsection
