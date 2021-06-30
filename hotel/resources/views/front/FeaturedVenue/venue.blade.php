@extends('front.layout.header')
@section('content')
<section class="" style="background: #f3f5f7;">
   <div class="container">
   <div class="row">
   <div class="col-lg-8">
      <div class="row">
         <div class="col-md-12">
            <h1 class="" style="color: #f77e1b;font-size: 45px;font-family: Times New Roman; font-weight: 600;" id="getvenue">{{ $hotelsData->name }}</h1>
            <span class="entry-subtitle">{{ $hotelsData->sub_heading }}</span>
         </div>
         <div class="mb-4" style="background: white;padding: 15px;color: black; margin-top: 20px;">
            <h2 style="line-height: 1.5;color: #000;font-size: 25px;font-weight: 800;font-family: playfair display,Arial,serif;border-bottom: 1px solid;">Overview</h2>
            <div class="textwidget widget-text">
               <div class="read-more-text" style="max-height: none;">
                  <p>{!! $hotelsData->summary !!}</p>
               </div>
            </div>
         </div>
         <div style="background: white;padding: 15px;font-size: 14px;color: black;" class="col-md-12 w-100">
            <div class="textwidget widget-text">
               <div class="read-more-text" style="max-height: none;text-align: center text-justify">
                  <p style="font-size: 16px; color: black;">{!! $hotelsData->description !!}</p>
               </div>
            </div>
            <div class="col-md-12 mb-3 room-single ftco-animate">
               <div class="row">
               @if(!$gallery_images->isEmpty() && !empty($gallery_images) && $gallery_images != null)
               @foreach($gallery_images as $gimg)
                  <div class="col-sm col-md-4 ftco-animate">
                     <div class="room">
                        <div class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('storage/hotelsGalleryImages/'.$gimg->image) }})"> </div>
                     </div>
                  </div>
               @endforeach
               @else
                  <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                     <h4>Hotels Gallery Not Found!</h4>
                  </div>
               @endif
               </div>
            </div>

         </div>
         <!-- <p class="capacity-header"></p>
            <center class="col-md-12 w-100" style="padding:20px;">
               <h4>Maximum Numbers</h4>
               <hr style="width:20%">
               <div>
                  <span class="capacity-item-holders">
                  <p class="room-capacity-labels-and-values" style="margin-bottom: 25px;font-size: 20px;font-weight: 700;text-align: center;"><span class="room-capacity-values">{{ $hotelsData->capacity }}</span><span class="room-capacity-labels">MAX CAPACITY</span></p>
               </span>
               </div>
               @if(!$capacityList->isEmpty() && !empty($capacityList) && $capacityList != null)
                  @foreach($capacityList as $cl)
                  <span class="capacity-item-holders">
                     <img class="capacity-display-icons" src="{{ asset('storage/capacityAttributeImg/'.$cl->capacity_image) }}">
                     <p class="room-capacity-labels-and-values" style="margin-bottom: 0.6rem;"><span class="room-capacity-values">{{ $cl->capacity_value }}</span><span class="room-capacity-labels text-uppercase">{{ $cl->capacity_name }}</span></p>
                  </span>
                  @endforeach
               @else
               <div class="row" style="padding-bottom: 20px;">
                  <div class="col-md-12 text-center">
                     <h4>Hotels Capacity Not Found!</h4>
                  </div>
               </div>
               @endif
            </center> -->
         <div style="background-color: #0e2636;padding: 25px;width: 100%; margin-top: 20px;" class="mb-4">
            <div id="enhancedtextwidget-3" class="widget  widget_text enhanced-text-widget">
               <h2 style="line-height: 1.5;color: #000;font-size: 25px;font-weight: 800;font-family: playfair display,Arial,serif;border-bottom: 1px solid; color: white;padding-bottom: 10px;">Hotel Venue</h2>
               <div class="col-md-12 room-single ftco-animate" style="padding: 10px;">
                  <div class="row">
                     @if(!$hotels_sub_entity->isEmpty() && !empty($hotels_sub_entity) && $hotels_sub_entity != null)
                        @foreach($hotels_sub_entity as $data)
                        <div class="col-sm col-md-6 ftco-animate">
                           <div class="room">
                              <a href="{{ url('/book_venue/'.$data->hotel_id.'/'.$data->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('storage/hotels_sub_entity/'.$data->feature_image)}});">
                                 <div class="icon d-flex justify-content-center align-items-center"> <span class="icon-search2"></span> </div>
                              </a>
                              <div class="p-3 text-center" style="background: #13344a;">
                                 <a href="{{ url('/book_venue/'.$data->hotel_id.'/'.$data->id)}}" class="hotelname">{{$data->title}}</a>
                                 <div class="card__tagline hotelname" itemprop="description" style="font-size:15px;">{{$data->sub_title}}</div>
                                 <div class="card__tagline hotelname " itemprop="description" style="font-size:15px; color: #f77e1b;">
                                 <?php
                                 echo ucfirst($data->include_type);
                                 ?></div>
                                 <hr>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     @else
                        <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                           <h4>Hotels Includes Not Found!</h4>
                        </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div style="background-color: #0e2636;padding: 25px;width: 100%;" class="mb-4">
            <div id="enhancedtextwidget-3" class="widget  widget_text enhanced-text-widget">
               <h2 style="line-height: 1.5;color: #000;font-size: 25px;font-weight: 800;font-family: playfair display,Arial,serif;border-bottom: 1px solid; color: white;padding-bottom: 10px;">Key Facts</h2>
               <div class="col-md-12 room-single ftco-animate" style="padding: 10px;">
                  <div class="row" style="padding:20px;">
                     @if(!$hotelKey->isEmpty() && !empty($hotelKey) && $hotelKey != null)
                        @foreach($hotelKey as $list)
                        <div class="mb-1"><span class="key-facts-labels">{{$list->key_name}}: </span> <span class="key-facts-values">{{$list->description}}</span> </div>
                        @endforeach
                     @else
                        <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                           <h4>Hotels Key Facts Not Found!</h4>
                        </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div  style="background-color: #0e2636;padding: 25px;width: 100%;" class="mb-4">
            <div id="enhancedtextwidget-4" class="widget widget_text enhanced-text-widget">
               <h2 style="line-height: 1.5;color: #000;font-size: 25px;font-weight: 800;font-family: playfair display,Arial,serif;border-bottom: 1px solid; color: white;padding-bottom: 10px;">Outstanding for</h2>
               <div class="textwidget widget-text">
                  @if(!$featureList->isEmpty() && !empty($featureList) && $featureList != null)
                     @foreach($featureList as $fl)
                     <a href="#">
                        <div class="event-type-icon">
                           <span class="events-labels-and-values">
                              <img src="{{asset('storage/featureAttributeImg/'.$fl->feature_image)}}" title="Board Meetings" alt="Board Meetings" class="events-display-icons lazyloaded" data-ll-status="loaded">
                              <noscript><img src="{{asset('storage/featureAttributeImg/'.$fl->feature_image)}}" title="Board Meetings" alt="Board Meetings" class="events-display-icons"/></noscript>
                              <span class="events-labels-pl">{{ $fl->feature_name }}</span>
                           </span>
                        </div>
                     </a>
                     @endforeach
                  @else
                     <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                        <h4>Hotels Features Not Found!</h4>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@endsection @section('pagescript')
<script>
   $(document).ready(function() {
     const urlParams = new URLSearchParams(window.location.search);
     const myParam = urlParams.get('HotelID');
     //alert(myParam);
     $('#getvenue').html(myParam.toUpperCase());
   });
</script>
<script>
   window.dataLayer = window.dataLayer || [];

   function gtag() {
     dataLayer.push(arguments);
   }
   gtag('js', new Date());
   gtag('config', 'UA-23581568-13');
</script> @endsection
