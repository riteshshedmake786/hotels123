@extends('front.layout.header')
@section('content')

    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Venue Listing</a></li>
                <li class="active">Detail</li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="box filter">
                            <h2>Search</h2>
                            <form id="form-filter" class="labels-uppercase">
                                <div class="form-group">
                                    <label for="form-filter-destination">Destination</label>
                                    <input type="text" class="form-control" id="form-filter-destination"
                                           name="destination" placeholder="Destination">
                                </div>
                                <!--end form-group-->
                                <div class="form-group-inline">
                                    <div class="form-group">
                                        <label for="form-filter-check-in">Check In</label>
                                        <input type="text" class="form-control date" id="form-filter-check-in"
                                               name="check-in" placeholder="Check In">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-filter-check-out">Nights</label>
                                        <input type="number" class="form-control" id="form-filter-check-out"
                                               name="check-out" placeholder="2">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end form-group-inline-->
                                <div class="center">
                                    <a href="#filter-advanced-search" class="link icon" data-toggle="collapse"
                                       aria-expanded="false" aria-controls="filter-advanced-search">Advanced Search<i
                                            class="fa fa-plus"></i></a>
                                </div>
                                <div class="collapse in" id="filter-advanced-search">
                                    <div class="wrapper">
                                        <h2>Filter<span data-show-after-time="1000" data-container="body"
                                                        data-toggle="popover" data-placement="right"
                                                        title="Try Filters!"
                                                        data-content="Get better results by using filters. Check what you like and what you don't."></span>
                                        </h2>
                                        <section>
                                            <h3>Rate (per night)</h3>
                                            <ul class="checkboxes list-unstyled">
                                                <li><label><input type="checkbox" name="hotel">$0 -
                                                        $50<span>12</span></label></li>
                                                <li><label><input type="checkbox" name="apartment">$50 -
                                                        $100<span>48</span></label></li>
                                                <li><label><input type="checkbox" name="breakfast-only">$150 -
                                                        $150<span>36</span></label></li>
                                                <li><label><input type="checkbox"
                                                                  name="spa-wellness">$150+<span>56</span></label></li>
                                            </ul>
                                            <!--end checkboxes-->
                                        </section>
                                        <!--end section-->
                                        <section>
                                            <h3>Property Type </h3>
                                            <ul class="checkboxes">
                                                <li><label><input type="checkbox" name="hotel">Apartmets<span>67</span></label>
                                                </li>
                                                <li><label><input type="checkbox" name="apartment">Hotels<span>31</span></label>
                                                </li>
                                                <li><label><input type="checkbox"
                                                                  name="breakfast-only">Boats<span>68</span></label>
                                                </li>
                                                <li><label><input type="checkbox"
                                                                  name="spa-wellness">Villas<span>52</span></label></li>
                                            </ul>
                                            <div class="collapse" id="all-property-types">
                                                <ul class="checkboxes">
                                                    <li><label><input type="checkbox" name="ski-center">Ski Center<span>67</span></label>
                                                    </li>
                                                    <li><label><input type="checkbox"
                                                                      name="cottage">Cottage<span>31</span></label></li>
                                                    <li><label><input type="checkbox"
                                                                      name="hostel">Hostel<span>68</span></label></li>
                                                    <li><label><input type="checkbox"
                                                                      name="boat">Boat<span>52</span></label></li>
                                                </ul>
                                            </div>
                                            <!--end checkboxes-->
                                            <a href="#all-property-types" class="link" data-toggle="collapse"
                                               aria-expanded="false" aria-controls="all-property-types">Show all</a>
                                        </section>
                                        <!--end section-->
                                        <section>
                                            <h3>Property Facility</h3>
                                            <ul class="checkboxes no-bottom-margin">
                                                <li><label><input type="checkbox"
                                                                  name="wi-fi">Wi-fi<span>12</span></label></li>
                                                <li><label><input type="checkbox" name="free-parking">Free Parking<span>48</span></label>
                                                </li>
                                                <li><label><input type="checkbox" name="airport">Airport
                                                        Shuttle<span>36</span></label></li>
                                                <li><label><input type="checkbox" name="family-rooms">Family Rooms<span>56</span></label>
                                                </li>
                                            </ul>
                                            <!--end checkboxes-->
                                        </section>
                                        <!--end section-->
                                    </div>
                                    <!--end filter-advanced-search-->
                                </div>
                                <!--end collapse-->
                                <div class="form-group center">
                                    <button type="submit" class="btn btn-primary btn-rounded form-control">Search
                                    </button>
                                </div>
                            </form>
                            <!--end form-filter-->
                        </div>
                        <!--end filter-->
                    </div>
                    <!--end sidebar-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="title">
                            <h1>Venue Listing</h1>
                        </div>
                        <!--end title-->
                        @if($hotelSearch)
                            @foreach($hotelSearch as $key=>$value)
                                <div class="item list" data-map-latitude="{{ $value->lat }}"
                                     data-map-longitude="{{ $value->long }}" data-id="{{ $value->id }}">
                                    @if($value->discount != '0.00')
                                        <div class="ribbon">
                                            <div class="offer-number">{{ $value->discount + 0 }}%</div>
                                            <figure>Offer</figure>
                                        </div>
                                    @endif
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
                                            <a href="detail.html" class="wrapper">
                                                <div class="gallery">
                                                    <img src="assets/img/items/01.jpg" alt="">
                                                    <img src="#" class="owl-lazy" alt=""
                                                         data-src="assets/img/items/02.jpg">
                                                    <img src="#" class="owl-lazy" alt=""
                                                         data-src="assets/img/items/03.jpg">
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
                                            <span><i class="fa fa-bed"></i>{{ $value->capacity }}</span>
                                        </div>
                                        <!--end meta-->
                                        <div class="info">
                                            <a href="detail.html"><h3>{{ $value->name }}</h3></a>
                                            <figure class="location">{{ $value->city_name }}</figure>
                                            <figure class="label label-info">Venue</figure>
                                            <figure class="live-info">{{ $value->event_title }}</figure>
                                            <p>
                                                {!! $value->description !!}
                                            </p>
                                            <div class="price-info">
                                                @if($value->discount == "0.00")
                                                    <span class="price">AED {{ $value->cost }}</span>
                                                @else
                                                    <span class="price font-weight-bolder">
                                                    AED <span class="small"
                                                              style="text-decoration: line-through;">{{ $value->cost }}</span> {{ $value->offeringPrice }}
                                                </span>
                                                @endif
                                                <a href="detail.html"
                                                   class="btn btn-rounded btn-default btn-framed btn-small pull-right">View
                                                    detail</a>
                                            </div>

                                        </div>
                                        <!--end info-->
                                    </div>
                                    <!--end description-->
                                </div>
                            @endforeach
                        @else
                            "No Venues Found"
                        @endif
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
    <script>
        $(document).ready(function () {
            $('#venue').on('click', function () {
                console.log('rupali');
                $("#room").show();
            });
        });
    </script>

@endsection
