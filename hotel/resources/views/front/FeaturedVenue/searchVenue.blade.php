@extends('front.layout.header')
@section('content')

<style>

.rating {
    position: relative;
    display: flex;
    width: 2.875rem;
    height: 2.875rem;
    margin-top: -1.75rem;
    margin-left: 0.75rem;
    justify-content: center;
    align-items: center;
    border: .25rem solid #fff;
    border-radius: 50%;
    color: #fff;
    background-color: rebeccapurple
}

.image {
    max-width: 100%
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: none;
    border-radius: .25rem
}

.card-title {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 500;
    color: #653399
}

.card-text {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 100;
    font-size: 13px
}

.marker {
    color: red
}

.star-rating {
    color: #f7b944
}

</style>


<div id="page-content">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Venue Listing</a></li>
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
                                <input type="text" class="form-control" id="form-filter-destination" name="destination"
                                    placeholder="Destination">
                            </div>
                            <!--end form-group-->
                            <div class="center">
                                <a href="#filter-advanced-search" class="link icon" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="filter-advanced-search">Advanced Search<i
                                        class="fa fa-plus"></i></a>
                            </div>
                            <div class="collapse" id="filter-advanced-search">
                                <div class="wrapper">
                                    <h2>Filter<span data-show-after-time="1000" data-container="body"
                                            data-toggle="popover" data-placement="right" title="Try Filters!"
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
                                            <li><label><input type="checkbox"
                                                        name="hotel">Apartmets<span>67</span></label>
                                            </li>
                                            <li><label><input type="checkbox"
                                                        name="apartment">Hotels<span>31</span></label>
                                            </li>
                                            <li><label><input type="checkbox"
                                                        name="breakfast-only">Boats<span>68</span></label>
                                            </li>
                                            <li><label><input type="checkbox"
                                                        name="spa-wellness">Villas<span>52</span></label></li>
                                        </ul>
                                        <div class="collapse" id="all-property-types">
                                            <ul class="checkboxes">
                                                <li><label><input type="checkbox" name="ski-center">Ski
                                                        Center<span>67</span></label>
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
                                            <li><label><input type="checkbox" name="wi-fi">Wi-fi<span>12</span></label>
                                            </li>
                                            <li><label><input type="checkbox" name="free-parking">Free
                                                    Parking<span>48</span></label>
                                            </li>
                                            <li><label><input type="checkbox" name="airport">Airport
                                                    Shuttle<span>36</span></label></li>
                                            <li><label><input type="checkbox" name="family-rooms">Family
                                                    Rooms<span>56</span></label>
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
                                <button type="submit" class="btn btn-primary btn-rounded btn-block">Search</button>
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
			
			
			
			
			
			
			
			
			
			
			<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div> <img src="https://i.imgur.com/7cNRozs.jpg" class="img-responsive image"> </div>
                <p class="rating">9.2</p>
                <div class="card-body">
                    <h5 class="card-title">Hotel Single View</h5>
                    <p class="card-text"><i class="fa fa-map-marker marker"></i> Singla street, New Delhi, 110034</p>
                    <p class="card-text"><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i></p>
                    <p class="card-text">$ 1,399</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div> <img src="https://i.imgur.com/CS59IJZ.jpg" class="img-responsive image"> </div>
                <p class="rating">9.6</p>
                <div class="card-body">
                    <h5 class="card-title">Hotel Tutors Vally</h5>
                    <p class="card-text"><i class="fa fa-map-marker marker"></i> Tutor street,Frankfurt,Germany,34565</p>
                    <p class="card-text"><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i></p>
                    <p class="card-text">$ 2,399</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div> <img src="https://i.imgur.com/LITAKvq.jpg" class="img-responsive image"> </div>
                <p class="rating">8.2</p>
                <div class="card-body">
                    <h5 class="card-title">Hotel Architect View</h5>
                    <p class="card-text"><i class="fa fa-map-marker marker"></i> Views street, New york, 11003</p>
                    <p class="card-text"><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i><i class="fa fa-star star-rating"></i></p>
                    <p class="card-text">$ 1,699</p>
                </div>
            </div>
        </div>
    </div>
</div>



                <div class="main-content">
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                    <div class="title">
                        <h1>Venue Listing</h1>
                    </div>
                    <!--end title-->
                    @foreach($searchVenue as $key=>$value)
                    <div class="item list" data-map-latitude="" data-map-longitude=""
                        data-id="{{ $value->id }}">

                        <div class="image-wrapper">
                            <div class="mark-circle description" data-toggle="tooltip" data-placement="right"
                                title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis erat vel quam aliquet hendrerit semper eget elit. Aenean tincidunt ultrices bibendum. Proin nisi erat, iaculis non pulvinar a, scelerisque ut est. ">
                                <i class="fa fa-question"></i>
                            </div>
                            <div class="mark-circle map" data-toggle="tooltip" data-placement="right"
                                title="Show on map">
                                <i class="fa fa-map-marker"></i>
                            </div>
                         
                            <div class="mark-circle top" data-toggle="tooltip" data-placement="right"
                                title="Top accommodation">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                          
                            <div class="image">
                                <a href="" class="wrapper">
                                    <div class="gallery">
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
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-bed"></i></span>
                            </div>
                            <!--end meta-->
                            <div class="info">
							
							 <a href="{{ url('/hotelVenues/') }}">
                                    <h3>{{ $value->title }}</h3>
                                </a>
								
								
                                @if(Auth::guard('merchant')->user())
                                <a href="{{ url('/hotelVenues/') }}">
                                    <h3>{{ $value->title }}</h3>
                                </a>
                                @else
                                <a data-toggle="modal" data-tab="true" data-target="#sign-in-modal"
                                    class="font-color-gold cursor-pointer">
                                    <h3>{{ $value->title }}</h3>
                                </a>
                                @endif
                                <figure class="location">{{ $value->sub_title }}</figure>
                                <figure class="label label-info"></figure>
                                <figure class="live-info"></figure>
                                <p>
                                    {!! $value->description !!}
                                </p>
                                <div class="price-info">
                                    @if(Auth::guard('merchant')->user())
                                    <a href="{{ url('/hotelVenues/') }}"
                                        class="btn btn-rounded btn-default btn-framed btn-small pull-right">View
                                        detail</a>
                                    @else
                                    <a data-toggle="modal" data-tab="true" data-target="#sign-in-modal"
                                        class="btn btn-rounded btn-default btn-framed btn-small pull-right">
                                      View detail</a>
                                    @endif
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
<div class="modal fade in" id="sign-in-modal" tabindex="-1" role="dialog" aria-labelledby="sign-in-modal">
    <div class="wrapper">
        <div class="inner">
            <div class="modal-dialog width-400px sign-in-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h1 class="text-center">Sign In</h1>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div id="exTab2" class="">
                            <h4>Are you a</h4>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#1" class="active display-inline-block" data-toggle="tab">
                                        <h4>User</h4>
                                    </a>
                                    <h4 class="display-inline-block">, &nbsp;</h4>
                                </li>
                                <li>
                                    <a class="display-inline-block" href="#2" data-toggle="tab">
                                        <h4>Hotels </h4>
                                    </a>
                                    <h4 class="display-inline-block"> or &nbsp;</h4>
                                </li>
                                <li>
                                    <a class="display-inline-block" style="cursor: not-allowed;">
                                        <h4>Supplier</h4>
                                    </a>
                                    <h4 class="display-inline-block"> ? </h4>
                                </li>
                            </ul>

                            <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                    <form class="form" role="form" method="POST" action="{{ url('/user/login-user') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                type="email" name="email" autocomplete="off"
                                                value="{{ old('email') }}" />
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between mt-n5">
                                                <label
                                                    class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                            </div>
                                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                type="password" name="password" autocomplete="off" />
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="clearfix action">
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary btn-rounded">Sign In
                                                </button>
                                            </div>
                                            <div class="form-group pull-left">
                                                <label>
                                                    <div class="icheckbox"><input type="checkbox" name="1"
                                                            style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                            style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="2">
                                    <form class="form" role="form" method="POST" action="{{ url('/merchant/login') }}">
                                        {{ csrf_field() }}
                                        <div class="pb-13 pt-lg-0 pt-5">
                                            <div class="form-group">
                                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>

                                                <input
                                                    class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                    type="email" name="email" autocomplete="off"
                                                    value="{{ old('email') }}" />

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between mt-n5">
                                                    <label
                                                        class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                                </div>
                                                <input
                                                    class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                    type="password" name="password" autocomplete="off" />
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="clearfix action">
                                                <div class="form-group pull-right">
                                                    <button type="submit" class="btn btn-primary btn-rounded">Sign In
                                                    </button>
                                                </div>
                                                <div class="form-group pull-left">
                                                    <label>
                                                        <div class="icheckbox"><input type="checkbox" name="1"
                                                                style="position: absolute; opacity: 0;">
                                                            <ins class="iCheck-helper"
                                                                style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                        </div>
                                                        Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="3">
                                    <form class="form" role="form" method="POST" action="{{ url('/supplier/login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>

                                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                type="email" name="email" autocomplete="off"
                                                value="{{ old('email') }}" />

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <!--end::Form group-->
                                        <!--begin::Form group-->
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between mt-n5">
                                                <label
                                                    class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                            </div>
                                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                                type="password" name="password" autocomplete="off" />

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="clearfix action">
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary btn-rounded">Sign In
                                                </button>
                                            </div>
                                            <div class="form-group pull-left">
                                                <label>
                                                    <div class="icheckbox"><input type="checkbox" name="1"
                                                            style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                            style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal-body-->
                    <div class="modal-footer">
                        <div class="center">
                            <div class="h6">Forgot Password?
                                <button id="resetpassword" class="btn btn-link font-color-darkgoldenrod">
                                    Reset here
                                </button>
                            </div>
                            <div>New to HotelsVenue? <a href="#">
                                    <h4>
                                        <button id="registernewclicked" class="btn btn-link font-color-darkgoldenrod">
                                            Register New Account
                                        </button>
                                    </h4>
                                </a></div>
                        </div>
                    </div>
                    <!--end modal-footer-->
                </div>
                <!--end modal-content-->
            </div>
            <!--end modal-dialog-->
        </div>
    </div>
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

$('#submitBtn').click(function() {

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
            success: function(data) {
                //var dataParsed = JSON.parse(data);
                $('#venueEnquiryModal').modal('hide');
            }
        });
    }

});
$('document').ready(function() {
    $('#signinclicked').click(function() {

        $('#sign-in-modal').modal('show');
    });
});
</script>
@endsection