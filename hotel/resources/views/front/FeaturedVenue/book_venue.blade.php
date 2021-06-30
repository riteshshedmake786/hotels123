@extends('front.layout.header')
@section('content')
<section style=" background: #f3f5f7;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12">
            <h1 class="" style="color: #f77e1b;font-size: 45px;font-family: Times New Roman; font-weight: 600;" id="getvenue">{{ $entityData->title }}</h1>
            <span class="entry-subtitle">{{ $entityData->sub_title }}</span>
          </div>
          <div style="background: white;padding: 15px;font-size: 14px;color: black; width: 100%; margin-top: 10px;">
            <div class="textwidget widget-text">
              <div class="read-more-text" style="max-height: none;text-align: center;">
                <p style="font-size: 16px; color: black;">{!! $entityData->description !!}</p>
              </div>
            </div>
            <div class="col-md-12 mb-3 room-single ftco-animate">
              <div class="row">
                <div class="col-sm col-md-12 ftco-animate">
                  <div class="room">
                    <div class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('storage/hotels_sub_entity/'.$entityData->feature_image) }})"> </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="capacity-header"></p>
            <center class="col-md-12" style="padding:20px;">
             @foreach($entityData->capacityData as $cap)
             <span class="capacity-item-holders">
               <img class="capacity-display-icons" src="{{ asset('storage/capacityAttributeImg/'.$cap->image) }}">
               <p class="room-capacity-labels-and-values" style="margin-bottom: 0.6rem;"><span class="room-capacity-values">{{ $cap->capacity_value }}</span><span class="room-capacity-labels text-uppercase"></span>{{ $cap->title }}</p>
             </span>
             @endforeach
           </center>
           <center>
            <h2>Menu Selection</h2>
            <hr style="width:20%">
            <div style="text-align:left;" class="frm_opt_container mb-4">
              <div class="frm_radio" id="frm_radio_106-103-0" style="font-size: 18px;"> </div>
              <div class="col-md-12 mb-3 room-single ftco-animate">
                <div class="row">
                  @if(!empty($entityData->menuList))
                  @foreach($entityData->menuList as $list)
                  <div class="col-sm col-md-4 ftco-animate">
                    <div class="room">
                      <div class="mb-4"> <span style=" padding: 10px;">
                        <img src="{{asset('front_assets/images/fingerdirection.png')}}" style="height: 17px;">
                        <a href="{{ asset('storage/hotels_sub_entity_menu/'.$list->doc_file)}}" target="_blank" style="color: black;text-decoration: underline;">{{$list->title}}</a>
                      </span>
                      <br> </div>
                      <div class="portfolio-hover">
                        <a href="{{ asset('storage/hotels_sub_entity_menu/'.$list->image)}}" data-lightbox="example-set"> <img src="{{ asset('storage/hotels_sub_entity_menu/'.$list->image)}}" class="img-fluid zoom-img" alt="adityaschool" style="height: 250px;" /> </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <p class="" style="color: #f77e1b;font-size:26px;font-family: Times New Roman; font-weight: 600; margin: auto;">No Menu List Found</p>
                  @endif
                </div>
              </div>
              <hr>
            </center>
          </div>
        </div>
      </div>
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box ftco-animate" style="margin-top: 9px;text-align: center">
          <div>
            <!--Earlier -->
            <hr>
            <h3 id="">Event Details</h3>
            <div id="feedback"></div>
            <hr>
            <form id="" action="" method="POST" style="margin-top: 9px;text-align: left">
              <div class="frm_toggle_container frm_grid_container" style="display: block;">
                <div id="frm_field_106_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_left_container horizontal_radio">
                  <label class="frm_primary_label">Event <span class="frm_required">*</span> </label>
                  <br>
                  <input type="radio" name="event" value="Corporate">
                  <label for="Corporate">Corporate</label>
                  <input type="radio" name="event" value="Social">
                  <label for="Social">Social</label>
                  <br>
                                        <!--<div class="frm_opt_container">     <div class="frm_radio" id="frm_radio_106-103-0"><label for="field_der48-0">     <input type="radio" name="event"> Corporate</label></div>
                                          <div class="frm_radio" id="frm_radio_106-103-1"><label for="field_der48-1">     <input type="radio" name="event value="Private" > Social</label></div></div>-->
                                        </div>
                                        <div id="frm_field_109_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_inline_container frm_first frm_half">
                                          <label for="field_oiu6r" class="frm_primary_label">Event Date <span class="frm_required">*</span> </label>
                                          <input type="text" id="date" name="date" value="" autocomplete="off" maxlength="10" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Event Date is invalid" class="form-control checkin_date"> </div>
                                          <div id="frm_field_110_container mb-3" class="frm_form_field form-field mb-3 frm_inline_container frm_half">
                                            <label for="field_5n3zb" class="frm_primary_label">Event Time <span class="frm_required"></span> </label>
                                            <select aria-labelledby="field_5n3zb_label" name="time" id="time" data-invmsg="Event Time is invalid">
                                              <option value="-Select-" class=""> Please select Time </option>
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
                                          <div id="frm_field_121_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_inline_container frm_half frm_other_container">
                                            <label for="field_j4q4a" class="frm_primary_label">Location <span class="frm_required">*</span> </label>
                                            <select id="location" name="location" data-placeholder="Select an option" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Event Type is invalid">
                                              <option value="-Select-" class=""> Please select Location </option>
                                              <option value="Dubai="> Dubai </option>
                                              <option value="Abu Dhabi" class=""> Abu Dhabi </option>
                                              <option value="Sharjah" class=""> Sharjah </option>
                                              <option value="Al Ain" class=""> Al Ain </option>
                                              <option value="Ajman" class=""> Ajman </option>
                                              <option value="RAK City" class=""> RAK City </option>
                                              <option value="Fujairah" class=""> Fujairah </option>
                                              <option value="Umm al-Quwain" class=""> Umm al-Quwain </option>
                                            </select>
                                          </div>
                                          <div id="frm_field_121_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_inline_container frm_half frm_other_container">
                                            <label for="field_j4q4a" class="frm_primary_label">Venues By Event Type <span class="frm_required">*</span> </label>
                                            <select id="eventtype" name="eventtype" data-placeholder="Select an option" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Event Type is invalid">
                                              <option value="-Select-">Select Venues By Event Type</option>
                                              <option class="level-0" value="Conferences">Conferences</option>
                                              <option class="level-0" value="Corporate Incentives">Corporate Incentives </option>
                                              <option class="level-0" value="Sports Events">Sports Events</option>
                                              <option class="level-0" value="Gala Dinner">Gala Dinner</option>
                                              <option class="level-0" value="Meetings">Meetings</option>
                                              <option class="level-0" value="Christmas Parties">Christmas Parties</option>
                                              <option class="level-0" value="Private Dinning">Private Dinning</option>
                                              <option class="level-0" value="Engagment Parties">Engagment Parties</option>
                                              <option class="level-0" value="Product Launches">Product Launches</option>
                                              <option class="level-0" value="Press Conferences">Press Conferences</option>
                                              <option class="level-0" value="Training">Training</option>
                                              <option class="level-0" value="Exhibitions">Exhibitions</option>
                                              <option class="level-0" value="Seminars">Seminars</option>
                                              <option class="level-0" value="Banquets">Banquets</option>
                                              <option class="level-0" value="Birthday Parties">Birthday Parties</option>
                                              <option class="level-0" value="Special Celebrations">Special Celebrations</option>
                                              <option class="level-0" value="Board Meetings">Board Meetings</option>
                                            </select>
                                          </div>
                                          <div id="frm_field_122_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_inline_container frm_first frm_half">
                                            <label for="field_v3bsd" class="frm_primary_label">Number of guests <span class="frm_required">*</span> </label>
                                            <input type="text" name="guest" id="guest" value="" autocomplete="off" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Number of guests is invalid"> </div>
                                            <div id="frm_field_241_container mb-3" class="frm_form_field form-field mb-3 frm_required_field frm_top_container frm_half">
                                              <label for="field_qmvfg" class="frm_primary_label">Menu Selection <span class="frm_required">*</span> </label>
                                              <select name="budget" id="menuselection" data-placeholder="Please select..." placeholder="Please select..." data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Maximum Budget is invalid">
                                                <option value="-Select-"> Please Select Menu </option>
                                                <option value="Menu 1 - 230 AED Per Guest" class=""> Menu 1 - 230 AED Per Guest </option>
                                                <option value="Menu 2 - 210 AED Per Guest" class=""> Menu 2 - 210 AED Per Guest </option>
                                                <option value="Menu 3 - 250 AED Per Guest" class=""> Menu 3 - 250 AED Per Guest </option>
                                              </select>
                                            </div>
                                            <div id="frm_field_190_container mb-3" class="frm_form_field form-field mb-3 frm_top_container">
                                              <label for="field_4bg30" class="frm_primary_label">Additional Information <span class="frm_required"></span> </label>
                                              <textarea id="message" name="message" rows="5" data-invmsg="Additional Information is invalid" aria-describedby="frm_desc_field_4bg30"></textarea>
                                            </div>
                                            <div id="frm_field_190_container mb-3" class="frm_form_field form-field mb-3 frm_top_container"> <span id="error" style="color:red; font-size:15px;"></span> </div>
                                            <div style="text-align: center;margin-top:5px">
                                              <button type="button" data-dismiss="modal" onclick="newpage();" style="background-color: #c69c53" class="frm_final_submit">Submit</button>
                                              <!--<input type="submit" value="Submit" id="submitBtn" style="background-color: #c69c53" class="frm_final_submit">-->
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                              @endsection
                              @section('pagescript')
                              <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                              <script>
                                window.dataLayer = window.dataLayer || [];

                                function gtag() {
                                  dataLayer.push(arguments);
                                }
                                gtag('js', new Date());
                                gtag('config', 'UA-23581568-13');
                              </script>
                              @endsection
