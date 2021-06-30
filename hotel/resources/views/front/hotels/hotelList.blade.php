@extends('front.layout.header')
@section('content')
<div id="page" class="hfeed site">
    <!-- <header id="masthead" class="site-header" role="banner">
    <div class="site-branding  site-branding--image"><a href="https://prestigiousvenues.com/" class="custom-logo-link"
            rel="home"><img width="350" height="161"
                src="https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events.png"
                class="custom-logo lazyloaded" alt="Prestigious Venues" sizes="(max-width: 350px) 100vw, 350px"
                srcset="https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events.png 350w, https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events-300x138.png 300w"
                data-ll-status="loaded"><noscript><img width="350" height="161"
                    src="https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events.png"
                    class="custom-logo" alt="Prestigious Venues"
                    srcset="https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events.png 350w, https://prestigiousvenues.com/wp-content/uploads/2016/11/cropped-Prestigious-Venues-Luxury-Venues-For-Events-300x138.png 300w"
                    sizes="(max-width: 350px) 100vw, 350px" /></noscript></a></div>
    <div class="header-facet-wrapper">
        <div class="facetwp-facet facetwp-facet-search facetwp-type-search" data-name="search" data-type="search"><label
                class="facetwp-filter-title"></label>
            <div class="facet-wrapper"><span class="facetwp-input-wrap"><i class="facetwp-icon"></i><input type="text"
                        class="facetwp-search" value="" placeholder="Search..."></span></div>
        </div>
    </div>
    <ul id="menu-main-menu" class="primary-menu">
        <li id="menu-item-7386"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7386">
            <a title="Find the best venue – send us your event brief"
                href="https://prestigiousvenues.com/event-enquiries" class=" ">Find A Venue</a>
            <ul class="sub-menu">
                <li id="menu-item-147" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147"><a
                        title="Submit your event brief" href="https://prestigiousvenues.com/event-enquiries"
                        class=" "><i class="fa  fa-pencil-square-o fa-fw"></i> Send Event Enquiry</a></li>
                <li id="menu-item-120" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-120"><a
                        title="Recommended Venues For Events" href="https://prestigiousvenues.com/search" class=" "><i
                            class="fa  fa-map-marker fa-fw"></i> Recommended Venues</a></li>
                <li id="menu-item-7464" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7464">
                    <a title="Why clients use Prestigious Venues to find their venues"
                        href="https://prestigiousvenues.com/rewards-for-using-us" class=" "><i
                            class="fa  fa-gift fa-fw"></i> Rewards For Using Us</a>
                </li>
            </ul>
        </li>
        <li id="menu-item-7498"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7498">
            <a title="Explore the best event spaces" href="https://prestigiousvenues.com/best-event-spaces"
                class=" ">Explore</a>
            <ul class="sub-menu">
                <li id="menu-item-7383" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7383">
                    <a title="A collection of event spaces to spark inspiration"
                        href="https://prestigiousvenues.com/best-event-spaces" class=" "><i
                            class="fa  fa-search fa-fw"></i> Best Event Spaces</a>
                </li>
                <li id="menu-item-7384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7384">
                    <a title="Venues outstanding for particular type of events"
                        href="https://prestigiousvenues.com/event-themes" class=" "><i
                            class="fa  fa-birthday-cake fa-fw"></i> Event Themes</a>
                </li>
                <li id="menu-item-6811" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6811">
                    <a title="A blog about venue &amp; event ideas"
                        href="https://prestigiousvenues.com/venue-event-ideas" class=" ">&nbsp;<i
                            class="fa  fa-lightbulb-o fa-lg"></i>&nbsp; Venue &amp; Event Ideas</a>
                </li>
                <li id="menu-item-2416" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2416">
                    <a title="Approved and recommended event suppliers"
                        href="https://prestigiousvenues.com/find-event-suppliers" class=" "><i
                            class="fa  fa-plug fa-fw"></i> Approved Suppliers</a>
                </li>
            </ul>
        </li>
        <li id="menu-item-7499"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7499">
            <a title="About Prestigious Venues and how to contact us" href="https://prestigiousvenues.com/about-us"
                class=" ">About</a>
            <ul class="sub-menu">
                <li id="menu-item-7385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7385">
                    <a title="About Prestigious Venues" href="https://prestigiousvenues.com/about-us" class=" "><i
                            class="fa  fa-flag fa-fw"></i> About Us</a>
                </li>
                <li id="menu-item-308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-308"><a
                        title="Contact us" href="https://prestigiousvenues.com/contact" class=" "><i
                            class="fa  fa-phone fa-fw"></i> Contact</a></li>
            </ul>
        </li>
        <li id="menu-item-204"
            class="nmr-logged-out menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-204">
            <a title="Login / Register" href="https://prestigiousvenues.com/login" class=" "><i
                    class="fa  fa-lock fa-fw"></i></a>
            <ul class="sub-menu is--forced-placed">
                <li id="menu-item-594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-594"><a
                        title="Login or register for a new account" href="https://prestigiousvenues.com/login"
                        class=" "><i class="fa  fa-lock fa-fw"></i> Login / Register</a></li>
            </ul>
        </li>
    </ul>
    </nav>
</header> -->
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
                                <!-- <div class="single-meta">
                                <a class="listing-contact  listing--phone" href="tel:+ 971 4 426 0000"
                                    itemprop="telephone">+
                                    971 4 426 0000</a>
                                <a class="listing-contact  listing--twitter"
                                    href="https://twitter.com/http://www.twitter.com/ATLANTIS" itemprop="url">
                                    Twitter</a>
                                <a class="listing-contact  listing--website" href="http://www.atlantisthepalm.com"
                                    itemprop="url" target="_blank" rel="nofollow">www.atlantisthepalm.com</a>
                            </div> -->
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
                                        <h2 class="widget_sidebar_title">Includes</h2>
                                        <div class="textwidget widget-text">
                                            <div class="section group">
                                                <div class="col span_1_of_2">
                                                    @foreach($hotelList as $image=>$fi)
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
                                                                            class="space-more-sub">at
                                                                            {{ $fi->name }},{{ $fi->city_name }}</span><br>
                                                                    </div>

                                                                </span>


                                                            </div>
                                                        </a>
                                                    </center>
                                                    @endforeach
                                                </div>
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