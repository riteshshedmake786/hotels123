@extends('merchant.layout.main')
<style>
.confirmed
{
	background:red ! important;
}

.waiting
{
	background:yellow ! important;
}
</style>
@section('content')




    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Update Booking Event</h4><br />
                    
                    Event Title:
                    <input type="text" class="form-control" name="event_title" id="event_title">
                    <br />
					
					<input type="hidden" class="form-control" name="booking_id" id="booking_id">
					
					<input type="hidden" class="form-control" name="start_date" id="start_date">
                   
                    Start time:
                    <br />
                    <input type="time" class="col-sm-4 form-control" name="start_time" id="start_time">
                    <br />
                    End time:
                    <br />
                    <input type="time" class="col-sm-4 form-control" name="end_time" id="end_time">
                    <br />
					
					<input type="hidden" class="col-sm-4 form-control" name="booking_status" id="booking_status">
                    <div class="form-group row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label>Booking status </label>
                              <div class="radio-inline">
                                  <label class="radio">
                                      <input type="radio"
                                      value='1' required name="is_booked" id="is_booked1" onclick="book_status(this.value)">
                                      <span></span>
                                      Confirmed Booking
                                  </label>
                                  <label class="radio">
                                      <input type="radio"
                                      value='0' required name="is_booked" id="is_booked2" onclick="book_status(this.value)">
                                      <span></span>
                                      Waiting List
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="booking_update" value="Update">
					
					 <input type="button" class="btn btn-danger" id="booking_delete" value="Delete">
					 
					 
                </div>
            </div>
        </div>
    </div>
	
	
	

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Add Venue Event</h4><br />
                    Venues:
                    <select disabled="disabled" name="venue_id" id="venue_id" class="form-control">
                      <option style="display: none;">Select venue</option>
                      @foreach($venues as $data)
                          <option class="list-group-item" id="venue_{{$data->id}}" value="{{$data->id}}">{{$data->title}}</option>
                      @endforeach
                    </select>
                    <br />
                    Event Title:
                    <input type="text" class="form-control" name="event_title" id="event_title1">
                    <br />
                    <input type="text" disabled class="form-control col-sm-4" name="date" id="date">
                    <br />
                    Start time:
                    <br />
                    <input type="time" class="col-sm-4 form-control" name="start_time" id="start_time1">
                    <br />
                    End time:
                    <br />
                    <input type="time" class="col-sm-4 form-control" name="finish_time" id="finish_time">
                    <br />
					
					<input type="hidden" class="col-sm-4 form-control" name="booking_status" id="booking_status">
                    <div class="form-group row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label>Booking status </label>
                              <div class="radio-inline">
                                  <label class="radio">
                                      <input type="radio"
                                      value='1'  checked required name="is_booked" id="is_booked" onclick="book_status(this.value)">
                                      <span></span>
                                      Confirmed Booking
                                  </label>
                                  <label class="radio">
                                      <input type="radio"
                                      value='0' required name="is_booked" id="is_booked" onclick="book_status(this.value)">
                                      <span></span>
                                      Waiting List
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
					
					
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Venues List</h3>
            @foreach($venues as $i=>$data)
              <input class="checkbox-venues" type="radio" name="venues" value="{{ $data->id }}" id="venue-{{$i}}">
              {{-- <input class="checkbox-venues" type="hidden" name="venues_name" value="{{$data->title}}" id="venue-{{$i}}"> --}}
              <label class="for-checkbox-venues p-3 w-auto" for="venue-{{$i}}">
                {{$data->title}}
              </label>
            @endforeach
            </div>
            <div class="col-lg-9">
              <div id="select-year" style="display: none;">
                <h3>Select year</h3>
                <div class="col-12 pb-5">
                  <input class="checkbox-years" type="radio" name="years" value="2021" id="year-2">
                  <label class="for-checkbox-years p-4" for="year-2">
                    2021
                  </label>
                  <input class="checkbox-years" type="radio" name="years" value="2022" id="year-3">
                  <label class="for-checkbox-years p-4" for="year-3">
                    2022
                  </label><!--
                  --><input class="checkbox-years" type="radio" name="years" value="2023" id="year-4">
                  <label class="for-checkbox-years p-4" for="year-4">
                    2023
                  </label>
                </div>
              </div>
              <div id="select-month" style="display: none;">
                  <h3>Select Month</h3>
                  <div class="col-12 pb-5">
                    <input class="checkbox-months" type="radio" name="months" value="01" id="month-1">
                    <label class="for-checkbox-months p-4" for="month-1">
                      January
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="02" id="month-2">
                    <label class="for-checkbox-months p-4" for="month-2">
                      February
                    </label><!--
                    --><input class="checkbox-months" type="radio" name="months" value="03" id="month-3">
                    <label class="for-checkbox-months p-4" for="month-3">
                      March
                    </label><!--
                    --><input class="checkbox-months" type="radio" name="months" value="04" id="month-4">
                    <label class="for-checkbox-months p-4" for="month-4">
                      April
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="05" id="month-5">
                    <label class="for-checkbox-months p-4" for="month-5">
                      May
                    </label><!--
                    --><input class="checkbox-months" type="radio" name="months" value="06" id="month-6">
                    <label class="for-checkbox-months p-4" for="month-6">
                      June
                    </label><!--
                    --><input class="checkbox-months" type="radio" name="months" value="07" id="month-7">
                    <label class="for-checkbox-months p-4" for="month-7">
                      July
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="08" id="month-8">
                    <label class="for-checkbox-months p-4" for="month-8">
                      August
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="09" id="month-9">
                    <label class="for-checkbox-months p-4" for="month-9">
                      September
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="10" id="month-10">
                    <label class="for-checkbox-months p-4" for="month-10">
                      October
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="11" id="month-11">
                    <label class="for-checkbox-months p-4" for="month-11">
                      November
                    </label>
                    <input class="checkbox-months" type="radio" name="months" value="12" id="month-12">
                    <label class="for-checkbox-months p-4" for="month-12">
                      December
                    </label>
                  </div>
              </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection
@section('pageScript')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script>

    $(document).ready(function() {
    // ... All the calendar functionality

            $('#appointment_update').click(function(e) {
				
			
				
                e.preventDefault();
                var data = {
                    _token: '{{ csrf_token() }}',
                    appointment_id: $('#appointment_id').val(),
                    start_time: $('#start_time1').val(),
                    finish_time: $('#finish_time').val(),
                    venue_id: $('#venue_id').val(),
                    date: $('#date').val(),
                    event_title: $('#event_title1').val(),
                    is_booked: $('#booking_status').val(),
                };
                $.post('{{ route('merchant/hotel/appointments_ajax_update') }}', data, function( result ) {
                    // $('#calendar').fullCalendar('removeEvents', $('#event_id').val());
                    // var calendarEl = document.getElementById('calendar');
                    // $('#calendar').fullCalendar('renderEvent', {
                    //     title: result.appointment,
                    //     start: result.appointment.start_time,
                    //     end: result.appointment.finish_time
                    // }, true);
                    location.reload();
                    // $('#editModal').modal('hide');
                });
            });
        });
        $('input[type=radio][name=venues]').change(function() {
          console.log("YEARS");
          $('#select-year').css({
              "display": "inherit"
          });
        });
        $('input[type=radio][name=years]').change(function() {
          console.log("YEARS");
          $('#select-month').css({
              "display": "inherit"
          });
        });
        $('input[type=radio][name=months]').change(function() {
          // document.addEventListener('DOMContentLoaded', function() {
              var venue = $('input[type=radio][name=venues]:checked').val();
              var venues_name = $('input[type=radio][name=venues_name]:checked').val();
              var year = $('input[type=radio][name=years]:checked').val();
              var month = $('input[type=radio][name=months]:checked').val();
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                  initialView: 'dayGridMonth',
                  initialDate: year+'-'+month+'-01',
                  selectable: true,
                  selectHelper: true,
				  eventColor: 'green',
                  events : [
                    @foreach($bookings as $booking)
                    {
						rendering: 'background',
                        color: '#257e4a',
						
						
						@if ($booking->is_booked==1)
                                className: 'confirmed',
						@else
	                             className: 'waiting',
                        @endif

                        id : '{{ $booking->id }}',
						status : '{{ $booking->is_booked }}',
                        title : '{{ $booking->event_title }}',
                        start : '{{ $booking->start_time }}',
                        @if ($booking->finish_time)
                                end: '{{ $booking->end_time }}',
						@else	
							end:null,
                        @endif
						
                    },
                    @endforeach
                ],
				eventClick: function (calEvent, jsEvent, view) {
					 //var title =event.title;
					 //alert(calEvent.id);
					  var booking_id =calEvent.event.id;
					  $.ajax({
							type: "GET",
							url: '{{ route('merchant/hotel/getbookingCalendar') }}',
							data: ({ id : booking_id }),
							dataType: "json",
							success: function(data) {
								
								var start=data['start_time'];
								var end=data['end_time'];
								
								var start_date=data['start_date'];
								
								var title=data['event_title'];
								
								var is_booked=data['is_booked'];
								
								var booking_id =data['id'];
								
								if(is_booked==1)
								{
								$("#is_booked1").prop("checked", true);
								}
								else
								{
								 $("#is_booked2").prop("checked", true);
								}
                                
								
								$('#start_date').val(start_date);
								$('#event_title').val(title);


								$('#start_time').val(start);

								$('#end_time').val(end);


								$('#booking_status').val(is_booked);

								$('#booking_id').val(booking_id);
								
								$('#bookingModal').modal();
							},
							error: function() {
								alert('Error occured');
							}
						});
						
						
					
                } ,
                select: function(calEvent, jsEvent, view) {
					
					
                    console.log("calEvent, jsEvent, view", calEvent, jsEvent, view);
                    $('#event_id').val(calEvent._id);
                    $('#appointment_id').val(calEvent.id);
                    // $('#venues').val(venues_name);
                    var ven = $('#venue_'+venue+' option[value='+venue+']');
                    console.log("ven", ven);
                    // debugger;
                    $('#venue_id').val(venue);
                    $('#venue_'+venue+' option[value='+venue+']').attr('selected','selected');
                    $('#date').val(moment(calEvent.start).format('DD-MM-YYYY'));
                    $('#editModal').modal();
                }
              });
              calendar.render();
          // });
        });

        function book_status(value)
		{
			$('#booking_status').val(value);
		}
		
		
		
		
		  $('#booking_update').click(function(e) {
				
			
				
                e.preventDefault();
                var data = {
                    _token: '{{ csrf_token() }}',
                    booking_id: $('#booking_id').val(),
                    start_time: $('#start_time').val(),
                    end_time: $('#end_time').val(),
                    start_date: $('#start_date').val(),
                    event_title: $('#event_title').val(),
                    is_booked: $('#booking_status').val(),
                };
                $.post('{{ route('merchant/hotel/booking_ajax_update') }}', data, function( result ) {
                   
                    location.reload();
                    
                });
            });
			
			$('#booking_delete').click(function(e) {
				
			
				
                e.preventDefault();
                var data = {
                    _token: '{{ csrf_token() }}',
                    booking_id: $('#booking_id').val(),
                    
                };
                $.post('{{ route('merchant/hotel/booking_ajax_delete') }}', data, function( result ) {
                   
                    location.reload();
                    
                });
            });
			
			
    </script>
@endsection
