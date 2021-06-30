@extends('front.layout.header')
@section('content')
<img src="{{ asset('uploads/hotels_featured_images/'.$venueDetails[0]->feature_image) }}" alt="image" width="1350"
    height="300">
<section class="pt80 pb80 listingDetails Campaigns">
    <div class="container">
        <div class="row">
            <!-- Tab line -->
            <div class="col-lg-8 col-md-12 col-sm-12 ">
                <ul class="nav nav-tabs tab-line">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-de-2">
                            Venue
                        </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-de-3">
                            Capacity
                        </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-de-4">
                            Menus
                        </a></li>
                    <li class="nav-item"><a id="lnkGallery" class="nav-link" data-toggle="tab" href="#tab-de-5">
                            Gallery
                        </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-de-6">
                            Reviews
                        </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane booking-search show active" id="tab-de-2">
                        <div class="text-block NopaddingDetails">
                            <h4 class="mb-4"> Venue Overview </h4>
                            <p> {!! $venueDetails[0]->description !!} </p>
                        </div>
                        <div class="text-block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="listing-item">
                                        <article class="TravelGo-category-listing fl-wrap">
                                            <div class="TravelGo-category-content fl-wrap title-sin_item">
                                                <div class="TravelGo-category-content-title fl-wrap NeedHelp">
                                                    <div class="TravelGo-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="#">
                                                                Need Help?</a></h3>
                                                        <div class="TravelGo-category-location fl-wrap"></div>
                                                    </div>
                                                </div>
                                                <div class="NeedhelpSection">
                                                    <p>
                                                        We would be more than happy to help you. Our team advisor are
                                                        24/7 at your service to help you.
                                                    </p>
                                                    <ul>
                                                        <li><span><i class="fa fa-phone"></i></span>
                                                            +965 22453743</li>
                                                        <li><span><i class="fa fa-whatsapp"></i></span>
                                                            +965 66665670
                                                        </li>
                                                        <li><span><i class="fa fa-envelope"></i></span>
                                                            info@HotelsVenues.com</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-de-4">
                        <div class="text-block NopaddingDetails">
                            <div class="row gallery ml-n1 mr-n1">
                                <div class="accordion toggle-icon-round" style="width: 100%" id="accordion4">
                                    <div class="accordion-item">
                                        <div class="accordion-title">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-1"
                                                aria-expanded="false"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <div>
                                                    <div>
                                                        Special Events
                                                        <div style="font-size: 10px;">
                                                            # of attendance : Undefined
                                                        </div>
                                                    </div>
                                                    <div style="font-size: 10px;">
                                                        Price/Person
                                                        :
                                                        -
                                                    </div>
                                                </div>
                                                <div style="font-size: 10px; color: #b8860b">
                                                    The menu is available upon request
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-title">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-2"
                                                aria-expanded="false"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <div>
                                                    <div>
                                                        Wedding Buffet
                                                        <div style="font-size: 10px;">
                                                            # of attendance : Undefined
                                                        </div>
                                                    </div>
                                                    <div style="font-size: 10px;">
                                                        Price/Person
                                                        :
                                                        -
                                                    </div>
                                                </div>
                                                <div style="font-size: 10px; color: #b8860b">
                                                    The menu is available upon request
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-de-3">
                        <div class="text-block" style="padding-bottom: unset;">
                            <h4 class="mb-4">Layouts Capacity</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="border-color: #b8860b;" class="text-center" scope="col">#
                                                    </th>
                                                    <th style="border-color: #b8860b;" class="text-center" scope="col">
                                                        Seating Setup</th>
                                                    <th style="border-color: #b8860b;" class="text-center" scope="col">
                                                        Maximum</th>
                                                    <th style="border-color: #b8860b;" class="text-center" scope="col">
                                                        Social Distancing</th>
                                                    <th style="border-color: #b8860b;" class="text-center" scope="col">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($includeHotelCapacity as $capacity)
                                                <tr>
                                                    <th scope="row" style="text-align: center; vertical-align: middle;">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $capacity->capacity_name }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $capacity->capacity_value }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $capacity->socialdistancing_capacity }}
                                                    </td>
                                                    <td style="border: solid 1px #eee; padding: 3px; width: 150px;">
                                                        <div class="portfolio-card isotope-item digital">
                                                            <div class="portfolio-card-body">
                                                                <div class="portfolio-card-header">
                                                                    <img src="{{ asset('uploads/hotels_featured_images/'.$capacity->capacity_image) }}"
                                                                        class="img-responsive" alt="image" />
                                                                </div>
                                                                <div class="portfolio-card-footer">
                                                                    <a class="full-screen"
                                                                        href="uploads/hotels_featured_images/{{ $capacity->capacity_image }}"
                                                                        data-fancybox="Layputportfolio"
                                                                        data-caption="aperiam sorem"><i
                                                                            class="fa fa-compress"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-block">
                            <h4 class="mb-4">Venue Facilities</h4>
                            <div class="row">
                                <div class="col-md-12">
                                @if($facilities->facilities !== "")
                                    @if(count($facilities->facilities) > 0)
                                        @foreach ($facilities->facilities as $facility)
                                            <i class="fa fa-wifi text-secondary w-1rem mr-3 text-center"
                                                style="width: 20px;"></i>
                                            <span class="text-sm">{{ $facility->title}}</span>
                                        @endforeach
                                    @endif
                                @else
                                        <div class="alert alert-warning">
                                            <strong>Sorry!</strong> No Facilities are available.
                                        </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-de-5">
                        <div class="text-block NopaddingDetails">
                            <h5 class="mb-4">
                                Images
                            </h5>
                            <div class="row gallery ml-n1 mr-n1">
                                <section class="portfolio">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12" style="padding-left: unset; padding-right: unset;">
                                                <div class="portfolio-wrap grid items-3 items-padding"
                                                    style="margin-top: unset; margin-bottom: unset;">
                                                    <div class="portfolio-card isotope-item digital">
                                                        <div class="form-group row">
                                                            <div class='list-group gallery'>
                                                                {{--            @if($galleryimage->count())--}}
                                                                @foreach($gallery_images as $image)
                                                                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                                                    <a 
                                                                        href="uploads/hotels_gallery_images/{{ $image->image }}"
                                                                        data-fancybox="images"><br>
                                                                        <img src="{{ asset('uploads/hotels_gallery_images/'.$image->image) }}"
                                                                            class="img-responsive" alt="gallery" /><br>
                                                                    </a>
                                                                </div>
                                                                @endforeach
                                                                {{--            @endif--}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-de-6">
                        <div class="text-block NopaddingDetails">
                            <h5 class="mb-4">
                                Listing Reviews
                            </h5>

                            <div class="media d-block d-sm-flex review">
                                <div class="text-md-center mr-4 mr-xl-5">
                                    <img src="/travelgo/images/ReviewImage.jpg" alt="HotelsVenues.com"
                                        class="avatar avatar-xl p-2 mb-2">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 mb-1">
                                        Admin team</h6>
                                    <div class="mb-2">
                                        <i class="fa fa-xs fa-star text-primary"></i>
                                        <i class="fa fa-xs fa-star text-primary"></i>
                                        <i class="fa fa-xs fa-star text-primary"></i>
                                        <i class="fa fa-xs fa-star text-primary"></i>
                                        <i class="fa fa-xs fa-star text-primary"></i>
                                    </div>
                                    <p class="text-muted text-sm">
                                        Your review is important to us.
                                    </p>
                                    <p class="text-muted text-sm">
                                        22/02/2020
                                    </p>
                                </div>
                            </div>

                            <div class="rebiew_section">
                                <div id="leaveReviewVenue" class="mt-4 collapse show" style="">
                                    <h5 class="mb-4">Leave a review</h5>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="ctl00$ContentPlaceHolder1$namebyVenue" type="text"
                                                    id="ContentPlaceHolder1_namebyVenue" required=""
                                                    class="form-control" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="rating" id="ratingbyVenue"
                                                    class="custom-select focus-shadow-0" style="height: 40px">
                                                    <option value="5">★★★★★ (5/5)</option>
                                                    <option value="4">★★★★☆ (4/5)</option>
                                                    <option value="3">★★★☆☆ (3/5)</option>
                                                    <option value="2">★★☆☆☆ (2/5)</option>
                                                    <option value="1">★☆☆☆☆ (1/5)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="ctl00$ContentPlaceHolder1$emailbyVenue" type="email"
                                            id="ContentPlaceHolder1_emailbyVenue" required="" class="form-control"
                                            placeholder="Enter your  email">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="ctl00$ContentPlaceHolder1$reviewbyVenue"
                                            id="ContentPlaceHolder1_reviewbyVenue" rows="4" required=""
                                            class="form-control" placeholder="Enter your review"></textarea>
                                    </div>
                                    <button id="ContentPlaceHolder1_btnPostReviewByVenue" type="button"
                                        class="btn btn-primary" onclick="PostReviewVenue(8, this);">
                                        Post review</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 right_Details">
                <div class="p-4 shadow ml-lg-4 rounded sticky-top">
                    <h1 style="color: #b8860b; padding-bottom: unset; font-size: 22px;">
                        {{ $venueDetails[0]->title }}
                    </h1>
                    <br>
                    <p>
                        {{ $venueDetails[0]->sub_title }}
                    </p>
                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i><i id="ContentPlaceHolder1_listarNoFor"
                            class="fa fa-star"></i><i id="ContentPlaceHolder1_listarNofaive" class="fa fa-star"></i>
                    </div>
                    <p style="font-size: 12px;">
                        <i class="fas fa-map-marker-alt"></i>&nbsp;
                       
                    </p>
                    <hr class="my-4" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                    <div>
                        <button id="eventenquiry" class="btn btn-primary btn-block"
                            style="color: #fff; cursor: pointer; margin-bottom: unset;">
                            Event Enquiry</button>
                    </div>
                    <hr class="my-4" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                    <div>
                        @if($isfavorite) 
                            <p style="margin-bottom: -15px;"><a href="{{ url('/favoriteRemove/'.$venueDetails[0]->id)}}" id="ContentPlaceHolder1_btnAddToFavoriets"
                                        style="cursor: pointer;" class="text-secondary text-sm"
                                        onclick="AddToFavorites(8, this)"><i id="ContentPlaceHolder1_lnkheart"
                                            class="fa fa-heart" style="font-size: 18px;"></i>&nbsp;Remove Favorites</a></p>
                        @else
                            <p style="margin-bottom: -15px;"><a href="{{ url('/favorite/'.$venueDetails[0]->id)}}" id="ContentPlaceHolder1_btnAddToFavoriets"
                                style="cursor: pointer;" class="text-secondary text-sm"
                                onclick="AddToFavorites(8, this)"><i id="ContentPlaceHolder1_lnkheart"
                                    class="fa fa-heart" style="font-size: 18px;"></i>&nbsp;Add To Favorites</a></p>
                        @endif
                    </div> 
                    <div class="TravelGo-category-opt"
                        style="background-color: transparent !important; background: unset !important;">
                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                        </div>
                        <div class="rate-class-name">
                            <div class="score" style="color: #555555 !important;">
                                <!-- <strong style="color: #555555 !important;">
                                    Best Price</strong> -->
                            </div>
                            <span class="fa fa-thumbs-up"
                                style="font-size: 20px; box-shadow: 0px 0px 0px 3px rgba(121, 119, 121, 0.38);"></span>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <div id="ContentPlaceHolder1_minPrice" style="font-size: 12px; text-align: center;">
                            <div style="margin-bottom: 10px;">
                                Avg. Venue/Price
                                <em style="font-size: 9px; color: #b8860b;">
                                    Negotiable</em>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr id="ContentPlaceHolder1_trMinPriceFullDay"
                                            style="display:flex;justify-content:space-between;border-top: solid 1px #eee;">
                                            <th scope="row" style="border-top: unset;">
                                                Minimum Cost</th>
                                            <td style="border-top: unset;">
                                                215<small>KWD</small>
                                            </td>
                                        </tr>

                                        <tr id="ContentPlaceHolder1_trMinPriceHalfDay" style="display: none;">
                                            <!-- <th scope="row" style="border-top: unset;">
                                                Half Day</th>
                                            <td style="border-top: unset;">
                                            </td> -->
                                        </tr>

                                        <tr id="ContentPlaceHolder1_trMinPriceyHour" style="display: none;">
                                            <!-- <th scope="row" style="border-top: unset;">
                                                By Hours</th>
                                            <td style="border-top: unset;">
                                            </td> -->
                                        </tr>

                                        <tr id="ContentPlaceHolder1_trMinPriceyWeek" style="display: none;">
                                            <!-- <th scope="row" style="border-top: unset;">
                                                Week (5 Days)</th>
                                            <td style="border-top: unset;">
                                            </td> -->
                                        </tr>

                                        <tr id="ContentPlaceHolder1_trMinPriceyMonth" style="display: none;">
                                            <!-- <th scope="row" style="border-top: unset;">
                                                Month</th>
                                            <td style="border-top: unset;">
                                            </td> -->
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- <em style="font-size: 11px;">
                                All-Inclusive Tax</em> -->
                        </div>
                    </div>
                    <br>
                    <br>
                </div><br>
                <div class="grid__item  column-sidebar" id="enquiryform" style="display:none">
                    <div class="listing-sidebar  listing-sidebar--top  listing-sidebar--secondary">
                        <div id="text-2" class="widget  widget_text">
                            <h2 class="widget_sidebar_title">Event Enquiry</h2>
                            <div class="textwidget">
                                <link data-minify="1" rel="stylesheet"
                                    href="https://prestigiousvenues.com/wp-content/cache/min/1/wp-content/plugins/formidable/css/formidableforms.css?ver=1620982151"
                                    type="text/css" media="all">
                                <div class="frm_forms  with_frm_style frm_center_submit frm_style_pv-enquiry-style"
                                    id="frm_form_11_container">
                                    <form enctype="multipart/form-data" method="post"
                                        class="frm-show-form  frm_pro_form">
                                        <div class="frm_form_fields ">
                                            <fieldset>
                                                <legend class="frm_hidden">Enquiry</legend>
                                                <div class="frm_fields_container">
                                                    <input type="hidden" name="frm_action" value="create">
                                                    <input type="hidden" name="form_id" value="11">
                                                    <input type="hidden" name="frm_hide_fields_11"
                                                        id="frm_hide_fields_11" value="">
                                                    <input type="hidden" name="form_key" value="11s5g">
                                                    <input type="hidden" name="item_meta[0]" value="">
                                                    <input type="hidden" id="frm_submit_entry_11"
                                                        name="frm_submit_entry_11" value="8ac4c532c1"><input
                                                        type="hidden" name="_wp_http_referer"
                                                        value="/venue/atlantis-the-palm-dubai">

                                                    <div id="frm_field_103_container"
                                                        class="frm_form_field frm_section_heading form-field ">
                                                        <div class="card-header collapsed card-link"
                                                            data-toggle="collapse" data-target="#collapseid">
                                                            <h3
                                                                class="frm_pos_top frm_section_spacing frm_trigger active">
                                                                1. Your Event Details<i class="fa fa-plus float-right"
                                                                    aria-expanded="false"
                                                                    aria-label="Toggle fields"></i>
                                                            </h3>

                                                            <div class="frm_toggle_container frm_grid_container"
                                                                style="">
                                                                <div id="frm_field_106_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container horizontal_radio">
                                                                    <label class="frm_primary_label">Event
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <div class="frm_opt_container">
                                                                        <div class="frm_radio" id="frm_radio_106-103-0">
                                                                            <label for="field_der48-0"> <input
                                                                                    type="radio" name="item_meta[106]"
                                                                                    id="field_der48-0" value="Corporate"
                                                                                    data-sectionid="103"
                                                                                    data-reqmsg="This field cannot be blank."
                                                                                    data-invmsg="Event is invalid"
                                                                                    aria-invalid="false">
                                                                                Corporate</label>
                                                                        </div>
                                                                        <div class="frm_radio" id="frm_radio_106-103-1">
                                                                            <label for="field_der48-1"> <input
                                                                                    type="radio" name="item_meta[106]"
                                                                                    id="field_der48-1" value="Private"
                                                                                    data-sectionid="103"
                                                                                    data-reqmsg="This field cannot be blank."
                                                                                    data-invmsg="Event is invalid"
                                                                                    aria-invalid="false">
                                                                                Private</label>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div id="frm_field_109_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_inline_container frm_first frm_half">
                                                                    <label for="field_oiu6r"
                                                                        class="frm_primary_label">Event
                                                                        Date
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_oiu6r"
                                                                        name="item_meta[109]" value=""
                                                                        data-sectionid="103" maxlength="10"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Event Date is invalid"
                                                                        class="frm_date" aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_110_container"
                                                                    class="frm_form_field form-field  frm_inline_container frm_half">
                                                                    <label for="field_5n3zb"
                                                                        class="frm_primary_label">Event
                                                                        Time
                                                                        <span class="frm_required"></span>
                                                                    </label>
                                                                    <select aria-labelledby="field_5n3zb_label"
                                                                        name="item_meta[110]" id="field_5n3zb"
                                                                        data-sectionid="103"
                                                                        data-invmsg="Event Time is invalid"
                                                                        aria-invalid="false">
                                                                        <option value="" selected="selected">
                                                                        </option>
                                                                        <option value="00:00">00:00</option>
                                                                        <option value="01:00">01:00</option>
                                                                        <option value="02:00">02:00</option>
                                                                        <option value="03:00">03:00</option>
                                                                        <option value="04:00">04:00</option>
                                                                        <option value="05:00">05:00</option>
                                                                        <option value="06:00">06:00</option>
                                                                        <option value="07:00">07:00</option>
                                                                        <option value="08:00">08:00</option>
                                                                        <option value="09:00">09:00</option>
                                                                        <option value="10:00">10:00</option>
                                                                        <option value="11:00">11:00</option>
                                                                        <option value="12:00">12:00</option>
                                                                        <option value="13:00">13:00</option>
                                                                        <option value="14:00">14:00</option>
                                                                        <option value="15:00">15:00</option>
                                                                        <option value="16:00">16:00</option>
                                                                        <option value="17:00">17:00</option>
                                                                        <option value="18:00">18:00</option>
                                                                        <option value="19:00">19:00</option>
                                                                        <option value="20:00">20:00</option>
                                                                        <option value="21:00">21:00</option>
                                                                        <option value="22:00">22:00</option>
                                                                        <option value="23:00">23:00</option>
                                                                    </select>


                                                                </div>
                                                                <div id="frm_field_118_container"
                                                                    class="frm_form_field form-field  frm_top_container horizontal_radio">
                                                                    <label class="frm_primary_label">Date
                                                                        &amp; time
                                                                        flexible?
                                                                        <span class="frm_required"></span>
                                                                    </label>
                                                                    <div class="frm_opt_container">
                                                                        <div class="frm_radio" id="frm_radio_118-103-0">
                                                                            <label for="field_qwkj7-0"> <input
                                                                                    type="radio" name="item_meta[118]"
                                                                                    id="field_qwkj7-0" value="Yes"
                                                                                    data-sectionid="103"
                                                                                    data-invmsg="Date &amp; time flexible? is invalid"
                                                                                    aria-invalid="false">
                                                                                Yes</label>
                                                                        </div>
                                                                        <div class="frm_radio" id="frm_radio_118-103-1">
                                                                            <label for="field_qwkj7-1"> <input
                                                                                    type="radio" name="item_meta[118]"
                                                                                    id="field_qwkj7-1" value="No"
                                                                                    data-sectionid="103"
                                                                                    data-invmsg="Date &amp; time flexible? is invalid"
                                                                                    aria-invalid="false">
                                                                                No</label>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div id="frm_field_120_container"
                                                                    class="frm_form_field form-field  frm_inline_container frm_first frm_half">
                                                                    <label for="field_h0j2k"
                                                                        class="frm_primary_label">Desired
                                                                        Location
                                                                        <span class="frm_required"></span>
                                                                    </label>
                                                                    <input type="text" id="field_h0j2k"
                                                                        name="item_meta[120]" value=""
                                                                        data-sectionid="103"
                                                                        data-invmsg="Desired Location is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_121_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_inline_container frm_half frm_other_container">
                                                                    <label for="field_j4q4a"
                                                                        class="frm_primary_label">Event
                                                                        Type
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <select name="item_meta[121]" id="field_j4q4a"
                                                                        data-sectionid="103"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Event Type is invalid"
                                                                        aria-invalid="false">
                                                                        <option value="Please select..." class="">
                                                                            Please select... </option>
                                                                        <option value="Anniversary" class="">
                                                                            Anniversary </option>
                                                                        <option value="Birthday" class="">
                                                                            Birthday </option>
                                                                        <option value="Christmas Party" class="">
                                                                            Christmas Party </option>
                                                                        <option value="Conference" class="">
                                                                            Conference </option>
                                                                        <option value="Corporate Incentive" class="">
                                                                            Corporate Incentive </option>
                                                                        <option value="Engagement" class="">
                                                                            Engagement </option>
                                                                        <option value="Exhibition" class="">
                                                                            Exhibition </option>
                                                                        <option value="Fashion Event" class="">
                                                                            Fashion Event </option>
                                                                        <option value="Filming" class="">
                                                                            Filming </option>
                                                                        <option value="Gala Dinner" class="">
                                                                            Gala Dinner </option>
                                                                        <option value="Meeting" class="">
                                                                            Meeting </option>
                                                                        <option value="Networking" class="">
                                                                            Networking </option>
                                                                        <option value="Party" class="">
                                                                            Party </option>
                                                                        <option value="Presentation" class="">
                                                                            Presentation </option>
                                                                        <option value="Press Conference" class="">
                                                                            Press Conference </option>
                                                                        <option value="Private Dining" class="">
                                                                            Private Dining </option>
                                                                        <option value="Product Launch" class="">
                                                                            Product Launch </option>
                                                                        <option value="Reception" class="">
                                                                            Reception </option>
                                                                        <option value="Seminar" class="">
                                                                            Seminar </option>
                                                                        <option value="Sporting Event" class="">
                                                                            Sporting Event </option>
                                                                        <option value="Summer Party" class="">
                                                                            Summer Party </option>
                                                                        <option value="Training Event" class="">
                                                                            Training Event </option>
                                                                        <option value="Wedding" class="">
                                                                            Wedding </option>
                                                                        <option value="Other" class="frm_other_trigger">
                                                                            Other </option>
                                                                    </select>
                                                                    <label for="field_j4q4a-otext"
                                                                        class="frm_screen_reader frm_hidden">Event
                                                                        Type</label><input type="text"
                                                                        id="field_j4q4a-otext"
                                                                        class="frm_other_input frm_pos_none"
                                                                        name="item_meta[other][121]" value="">


                                                                </div>
                                                                <div id="frm_field_122_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_inline_container frm_first frm_half">
                                                                    <label for="field_v3bsd"
                                                                        class="frm_primary_label">Number of
                                                                        guests
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_v3bsd"
                                                                        name="item_meta[122]" value=""
                                                                        data-sectionid="103"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Number of guests is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_241_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_top_container frm_half">
                                                                    <label for="field_qmvfg"
                                                                        class="frm_primary_label">Maximum
                                                                        Budget
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <select name="item_meta[241]" id="field_qmvfg"
                                                                        data-sectionid="103"
                                                                        data-placeholder="Please select..."
                                                                        placeholder="Please select..."
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Maximum Budget is invalid"
                                                                        aria-invalid="false">
                                                                        <option value="">
                                                                            Please select... </option>
                                                                        <option value="10000" class="">
                                                                            £10,000 </option>
                                                                        <option value="20,000" class="">
                                                                            £20,000 </option>
                                                                        <option value="30,000" class="">
                                                                            £30,000 </option>
                                                                        <option value="40,000" class="">
                                                                            £40,000 </option>
                                                                        <option value="50,000" class="">
                                                                            £50,000 </option>
                                                                        <option value="60,000" class="">
                                                                            £60,000 </option>
                                                                        <option value="70,000" class="">
                                                                            £70,000 </option>
                                                                        <option value="80,000" class="">
                                                                            £80,000 </option>
                                                                        <option value="90,000" class="">
                                                                            £90,000 </option>
                                                                        <option value="100,000" class="">
                                                                            £100,000 </option>
                                                                        <option value="200,000" class="">
                                                                            £200,000 </option>
                                                                        <option value="500,000" class="">
                                                                            £500,000 </option>
                                                                        <option value="1,000,000" class="">
                                                                            £1,000,000 </option>
                                                                    </select>
                                                                </div>
                                                                <div id="frm_field_190_container"
                                                                    class="frm_form_field form-field  frm_top_container">
                                                                    <label for="field_4bg30"
                                                                        class="frm_primary_label">Additional
                                                                        Information
                                                                        <span class="frm_required"></span>
                                                                    </label>
                                                                    <textarea name="item_meta[190]" id="field_4bg30"
                                                                        rows="5" data-sectionid="103"
                                                                        data-invmsg="Additional Information is invalid"
                                                                        aria-invalid="false"
                                                                        aria-describedby="frm_desc_field_4bg30"></textarea>
                                                                    <div id="frm_desc_field_4bg30"
                                                                        class="frm_description">
                                                                        If you have
                                                                        any
                                                                        particular requirements for your
                                                                        venue type,
                                                                        event format, seating, AV, catering,
                                                                        decoration, entertainment,
                                                                        transport, etc,
                                                                        please tell us here.</div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="frm_field_101_container"
                                                        class="frm_form_field frm_section_heading form-field ">
                                                        <div class="card-header collapsed card-link"
                                                            data-toggle="collapse" data-target="#collapseid2">
                                                            <h3 class="frm_pos_top frm_section_spacing frm_trigger">
                                                                2. Your Details<i class="fa fa-plus float-right"
                                                                    aria-expanded="false"
                                                                    aria-label="Toggle fields"></i>
                                                            </h3>

                                                            <div class="frm_toggle_container frm_grid_container"
                                                                style="display:none;">
                                                                <div id="frm_field_530_container"
                                                                    class="frm_form_field  frm_html_container form-field">
                                                                    Prestigious Venues validates all event
                                                                    enquiries. To help us speed up this
                                                                    process,
                                                                    please provide your corporate details.
                                                                </div>
                                                                <div id="frm_field_107_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_7mat7"
                                                                        class="frm_primary_label">First
                                                                        name
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_7mat7"
                                                                        name="item_meta[107]" value=""
                                                                        data-sectionid="101"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="First name is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_108_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_zelbk"
                                                                        class="frm_primary_label">Last
                                                                        name
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_zelbk"
                                                                        name="item_meta[108]" value=""
                                                                        data-sectionid="101"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Last name is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_116_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_d8ytf"
                                                                        class="frm_primary_label">Job
                                                                        Title
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_d8ytf"
                                                                        name="item_meta[116]" value=""
                                                                        data-sectionid="101"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Job Title is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_115_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_b5dm6"
                                                                        class="frm_primary_label">Company
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="text" id="field_b5dm6"
                                                                        name="item_meta[115]" value=""
                                                                        data-sectionid="101"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Company is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                                <div id="frm_field_113_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_ekp7"
                                                                        class="frm_primary_label">Telephone
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="tel" id="field_ekp7"
                                                                        name="item_meta[113]" value=""
                                                                        data-sectionid="101"
                                                                        style="width:115px !important"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Phone Number is invalid"
                                                                        class="auto_width" aria-invalid="false"
                                                                        pattern="((\+\d{1,3}(-|.| )?\(?\d\)?(-| |.)?\d{1,5})|(\(?\d{2,6}\)?))(-|.| )?(\d{3,4})(-|.| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">


                                                                </div>
                                                                <div id="frm_field_114_container"
                                                                    class="frm_form_field form-field  frm_required_field frm_left_container">
                                                                    <label for="field_g0v3y"
                                                                        class="frm_primary_label">Email
                                                                        <span class="frm_required">*</span>
                                                                    </label>
                                                                    <input type="email" id="field_g0v3y"
                                                                        name="item_meta[114]" value=""
                                                                        data-sectionid="101"
                                                                        data-reqmsg="This field cannot be blank."
                                                                        aria-required="true"
                                                                        data-invmsg="Email Address is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="frm_field_99_container"
                                                        class="frm_form_field frm_section_heading form-field ">
                                                        <div class="card-header collapsed card-link"
                                                            data-toggle="collapse" data-target="#collapseid3">
                                                            <h3 class="frm_pos_top frm_section_spacing frm_trigger">
                                                                3. Venue / Supplier Details<i
                                                                    class="fa fa-plus float-right" aria-expanded="false"
                                                                    aria-label="Toggle fields"></i>
                                                            </h3>

                                                            <div class="frm_toggle_container frm_grid_container"
                                                                style="display:none;">
                                                                <div id="frm_field_141_container"
                                                                    class="frm_form_field form-field  frm_top_container">
                                                                    <label for="field_oqjrc"
                                                                        class="frm_primary_label">Desired
                                                                        Venue /
                                                                        Supplier
                                                                        <span class="frm_required"></span>
                                                                    </label>
                                                                    <input type="text" id="field_oqjrc"
                                                                        name="item_meta[141]"
                                                                        value="Atlantis The Palm, Dubai"
                                                                        data-sectionid="99"
                                                                        data-frmval="Atlantis The Palm, Dubai"
                                                                        data-invmsg="Desired Venue / Supplier is invalid"
                                                                        aria-invalid="false">


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="item_meta[142]" id="field_1oijk"
                                                            value="" data-frmval="">
                                                        <input type="hidden" name="item_meta[413]" id="field_vd1c5"
                                                            value="PV08102094" data-frmval="PV08102094"
                                                            data-invmsg="Entry ID is invalid">
                                                        <input type="hidden" name="item_meta[414]" id="field_ypupm"
                                                            value="PrestigiousVenues.com - Atlantis The Palm, Dubai"
                                                            data-frmval="PrestigiousVenues.com - Atlantis The Palm, Dubai"
                                                            data-invmsg="Enquiry Source is invalid">
                                                        <input type="hidden" name="item_meta[472]" id="field_30u4b"
                                                            value="Event Bookings" data-frmval="Event Bookings"
                                                            data-invmsg="Business Category is invalid">
                                                        <input type="hidden" name="item_meta[473]" id="field_ey5ns"
                                                            value="0" data-invmsg="Max Budget is invalid">
                                                        <input type="hidden" name="item_meta[478]" id="field_vviog"
                                                            value="pv" data-frmval="pv"
                                                            data-invmsg="Password is invalid">
                                                        <input type="hidden" name="item_meta[479]" id="field_ofyrz"
                                                            value="1" data-frmval="1"
                                                            data-invmsg="Loyalty Rewards Points is invalid">
                                                        <input type="hidden" name="item_meta[480]" id="field_v7j72"
                                                            value="Enquiry" data-frmval="Enquiry"
                                                            data-invmsg="Event Status is invalid">
                                                        <input type="hidden" name="item_key" value="">
                                                        <div class="frm_verify">
                                                            <label for="frm_email_11">
                                                                If you are human, leave this field blank.
                                                            </label>
                                                            <input type="email" class="frm_verify" id="frm_email_11"
                                                                name="frm_verify" value="">
                                                        </div>
                                                        <input type="hidden" name="frm_register[email]"
                                                            value="114"><input type="hidden"
                                                            name="frm_register[username]" value=""><input type="hidden"
                                                            name="frm_register[password]" value="478"><input
                                                            type="hidden" name="frm_register[subsite_title]"
                                                            value="username"><input type="hidden"
                                                            name="frm_register[subsite_domain]" value="blog_title">
                                                        <div class="frm_submit">

                                                            <input type="submit" value="Send Enquiry"
                                                                class="frm_final_submit"
                                                                formnovalidate="formnovalidate">
                                                            <img width="16" height="11"
                                                                class="frm_ajax_loading lazyloaded"
                                                                src="https://prestigiousvenues.com/wp-content/plugins/formidable/images/ajax_loader.gif"
                                                                alt="Sending" data-ll-status="loaded"><noscript><img
                                                                    width="16" height="11" class="frm_ajax_loading"
                                                                    src="https://prestigiousvenues.com/wp-content/plugins/formidable/images/ajax_loader.gif"
                                                                    alt="Sending" /></noscript>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('#eventenquiry').click(function() {
        $('#enquiryform').css({
            "display": "inherit"
        });
    });

});
$(document).ready(function() {
    $(".card-header collapsed card-link").click(function(e) {
        e.preventDefault();
        $("#collapseid").toggleClass("toggled");
    });
});
$(document).ready(function() {
    $('.card-header').click(function() {
        $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
    });
});
</script>
@endsection