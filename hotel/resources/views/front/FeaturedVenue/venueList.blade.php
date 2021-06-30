@extends('front.layout.header')
@section('content')
<div id="page" class="hfeed site">
    <section class="pt80 pb80 listingDetails Campaigns">
        <div class="container">
            <div class="row">
                <div class="entry-featured-carousel is--at-start">
                    <div class="entry-featured-gallery">
                        <img width="1200" height="600" class="entry-featured-image lazyloaded"
                            src="https://prestigiousvenues.com/wp-content/uploads/2017/03/Luxury-Event-Venue-Atlantis-The-Palm-Dubai-Prestigious-Venues.jpg"
                            itemprop="image" data-ll-status="loaded"><noscript><img width="1200" height="600"
                                class="entry-featured-image"
                                src="https://prestigiousvenues.com/wp-content/uploads/2017/03/Luxury-Event-Venue-Atlantis-The-Palm-Dubai-Prestigious-Venues.jpg"
                                itemprop="image" /></noscript>
                        <img width="1200" height="600" class="entry-featured-image lazyloaded"
                            src="https://prestigiousvenues.com/wp-content/uploads/2017/03/Atlantis-The-Palm-Dubai-Event-Destination-Prestigious-Venues.jpg"
                            itemprop="image" data-ll-status="loaded"><noscript><img width="1200" height="600"
                                class="entry-featured-image"
                                src="https://prestigiousvenues.com/wp-content/uploads/2017/03/Atlantis-The-Palm-Dubai-Event-Destination-Prestigious-Venues.jpg"
                                itemprop="image" /></noscript>
                        <img width="1200" height="600" class="entry-featured-image"
                            src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201200%20600'%3E%3C/svg%3E"
                            itemprop="image"
                            data-lazy-src="https://prestigiousvenues.com/wp-content/uploads/2017/03/White-Beach-Restaurant-Atlantis-The-Palm-Prestigious-Venues.jpg"><noscript><img
                                width="1200" height="600" class="entry-featured-image"
                                src="https://prestigiousvenues.com/wp-content/uploads/2017/03/White-Beach-Restaurant-Atlantis-The-Palm-Prestigious-Venues.jpg"
                                itemprop="image" /></noscript>
                        <img width="1200" height="600" class="entry-featured-image"
                            src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201200%20600'%3E%3C/svg%3E"
                            itemprop="image"
                            data-lazy-src="https://prestigiousvenues.com/wp-content/uploads/2020/04/Underwater-Suite-Living-Room-Atlantis-The-Palm-Prestigious-Venues.jpg"><noscript><img
                                width="1200" height="600" class="entry-featured-image"
                                src="https://prestigiousvenues.com/wp-content/uploads/2020/04/Underwater-Suite-Living-Room-Atlantis-The-Palm-Prestigious-Venues.jpg"
                                itemprop="image" /></noscript>

                    </div>
                    <div class="gallery-arrow gallery-arrow-prev is--ready"><svg width="25" height="23"
                            viewBox="0 0 25 23" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.394 12.81c.04-.043.08-.084.114-.13.02-.02.04-.047.055-.07l.025-.034c.258-.345.412-.773.412-1.24 0-.464-.154-.89-.412-1.237-.01-.02-.022-.036-.035-.05l-.045-.06c-.035-.044-.073-.09-.118-.13L15.138.61c-.814-.813-2.132-.813-2.946 0-.814.814-.814 2.132 0 2.947l5.697 5.7H2.08c-1.148 0-2.08.93-2.08 2.083 0 1.15.932 2.082 2.084 2.085H17.89l-5.7 5.695c-.814.815-.814 2.137 0 2.95.814.815 2.132.815 2.946 0l9.256-9.255c-.004-.003 0-.006 0-.006z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>

                    </div>
                    <div class="gallery-arrow gallery-arrow-next is--ready"><svg width="25" height="23"
                            viewBox="0 0 25 23" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.394 12.81c.04-.043.08-.084.114-.13.02-.02.04-.047.055-.07l.025-.034c.258-.345.412-.773.412-1.24 0-.464-.154-.89-.412-1.237-.01-.02-.022-.036-.035-.05l-.045-.06c-.035-.044-.073-.09-.118-.13L15.138.61c-.814-.813-2.132-.813-2.946 0-.814.814-.814 2.132 0 2.947l5.697 5.7H2.08c-1.148 0-2.08.93-2.08 2.083 0 1.15.932 2.082 2.084 2.085H17.89l-5.7 5.695c-.814.815-.814 2.137 0 2.95.814.815 2.132.815 2.946 0l9.256-9.255c-.004-.003 0-.006 0-.006z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>

                    </div>
                </div>
                <div class="single_job_listing" data-latitude="25.1250783" data-longitude="55.1139311"
                    data-categories="Venues" data-icon="">

                    <div class="grid facetwp-template">
                        <div class="grid__item  column-content  entry-content">
                            <header class="entry-header">
                                <nav class="single-categories-breadcrumb">
                                    <a href="#">Listings</a> &gt;&gt;
                                    <a href="#">UAE</a> &gt;&gt;<a href="#">Dubai</a>
                                </nav>
                                <h1 class="entry-title" itemprop="name">
                                    {{ $hotelList[0]->name }},{{ $hotelList[0]->city_name }}</h1>
                                <span class="entry-subtitle">{{ $hotelList[0]->sub_heading }}</span>
                            </header><!-- .entry-header -->
                            <div class="col-lg-8 col-md-12 col-sm-12 ">
                                <div class="listing-sidebar  listing-sidebar--main">
                                    <div id="enhancedtextwidget-7" class="widget  widget_text enhanced-text-widget">
                                        <h2 class="widget_sidebar_title">Overview</h2>
                                        <div class="textwidget widget-text">
                                            <div class="read-more-text" style="max-height: none;">
                                                <p> {!! $hotelList[0]->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enhancedtextwidget-3" class="widget  widget_text enhanced-text-widget">
                                        <h2 class="widget_sidebar_title">Venues</h2>
                                        <div class="textwidget widget-text">
                                            <div class="section group">
                                                @if($venueList->count() > 0)
                                                    @foreach($venueList as $image=>$fi)
                                                    <div class="col span_1_of_2">
                                                        <center style="display:inline-block;">
                                                            <a href="{{ url('/venueListDetails/'.$fi->id) }}">
                                                                <div class="space_holder cmagics-underline">
                                                                    <span class="alignnone">
                                                                        <img src="{{ asset('uploads/hotels_featured_images/'.$fi->feature_image) }}"
                                                                            alt="img" class="lazyloaded"
                                                                            data-ll-status="loaded" width="1200"
                                                                            height="600"><br>
                                                                        <div class="space-data-holder">
                                                                            <span
                                                                                class="space-more-link">{{ $fi->title }}</span><br><span
                                                                                class="space-more-sub">
                                                                                {{ $fi->sub_title }}</span><br>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </center>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-warning">
                                                        <strong>Sorry!</strong> No Venues Found.
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enhancedtextwidget-5" class="widget  widget_text enhanced-text-widget">
                                        <h2 class="widget_sidebar_title">Review</h2>
                                        <div class="textwidget widget-text">
                                            <div class="read-more-text" data-readmore="" aria-expanded="false"
                                                id="rmjs-1" style="max-height: none; height: 300px;">
                                                <p>Atlantis The Palm Dubai has 1,539 guest rooms including 166 suites
                                                    all
                                                    with a
                                                    distinctive aquatic theme. Each hotel room has spectacular views of
                                                    the
                                                    Arabian
                                                    Gulf
                                                    or The Palm itself. The facilities offered in the Atlantis The Palm,
                                                    Dubai
                                                    event
                                                    spaces are impressive. With the largest conference centre in Dubai,
                                                    Atlantis
                                                    The
                                                    Palm can easily host up to 2,000 guests in theatre style.</p>
                                                <p>The suites are a unique collection of Super Suites representing the
                                                    ultimate
                                                    in
                                                    luxury, featuring indulgent spaces, lavishly designed interiors and
                                                    impeccable
                                                    service. Each of the Super Suites reflects the grandeur of the
                                                    resort
                                                    with
                                                    beautifully appointed bathrooms, supreme dining areas and in-room
                                                    amenities.
                                                    The
                                                    Lost Chambers Suites are exclusive to Atlantis, with both bedroom
                                                    and
                                                    bath
                                                    views
                                                    that look directly into the mesmerising underwater world of the
                                                    Ambassador
                                                    Lagoon.
                                                    There simply isn't anything to compare with this breathtaking
                                                    accommodation.
                                                </p>
                                                <p>With 17 restaurants, bars and lounges Atlantis serves a variety of
                                                    tantalising
                                                    cuisines from around the world. Whether it's a large-scale
                                                    celebration
                                                    or an
                                                    intimate setting, Atlantis has the perfect dining venues whatever
                                                    the
                                                    occasion.
                                                    Shui
                                                    Qi Spa presents a memorable experience, within awe-inspiring and
                                                    serene
                                                    surroundings. Set over two magnificent floors within the Royal
                                                    Towers of
                                                    Atlantis,
                                                    the Spa provides a sublime range of treatments, bathing options,
                                                    traditional
                                                    and
                                                    water therapies.</p>
                                                <p>The huge variety of indoor function space seamlessly caters for large
                                                    conferences,
                                                    gala dinners, meetings and weddings. The Royal Terrace, Zero Entry
                                                    Pool
                                                    and
                                                    Asateer
                                                    are outdoor event spaces that can be used to create something
                                                    spectacular.
                                                    Atlantis
                                                    The Palm, Dubai transforms an occasion into an experience and is a
                                                    luxurious
                                                    events
                                                    destination.</p>
                                            </div><a class="btn-more btn gradient-box" href="#"
                                                data-readmore-toggle="rmjs-1" aria-controls="rmjs-1">SHOW <i
                                                    class="fa fa-chevron-down" aria-hidden="true"></i>
                                                MORE</a>
                                        </div>
                                    </div>
                                    <div id="enhancedtextwidget-8" class="widget  widget_text enhanced-text-widget">
                                        <h2 class="widget_sidebar_title">History</h2>
                                        <div class="textwidget widget-text">
                                            <div class="read-more-text" style="max-height: none;">
                                                <p>Atlantis, The Palm is the flagship resort on The Palm and the first
                                                    resort to
                                                    open
                                                    its doors on Dubai's revolutionary Palm Island. Created by Kerzner
                                                    International
                                                    Holdings Limited, this 1,539-room resort opened in September 2008.
                                                    With
                                                    its
                                                    enviable
                                                    location atop the crescent of The Palm, Atlantis continues to
                                                    redefine
                                                    tourism
                                                    in
                                                    Dubai as the area's first truly integrated entertainment resort.
                                                    Reflecting
                                                    Executive Chairman Sol Kerzner's vision to transport guests into a
                                                    dazzling,
                                                    imaginative world, the resort encompasses a 46 hectare site with 17
                                                    hectares
                                                    of
                                                    water themed amusement at Aquaventure, an open-air marine habitat,
                                                    luxury
                                                    boutiques,
                                                    a Spa and Fitness Club, as well as 5,600 square metres of meeting
                                                    and
                                                    function
                                                    space.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- / .column-1 -->


                        </div>
                    </div>
                </div>
            </div>
    </section>

    @endsection