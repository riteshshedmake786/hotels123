/*!
 Version: 1.0
 Author: GT3 Themes
 Website: https//gt3themes.com
 File: geo-tag-text.js
 Plugin: extended-location
 */
/**
 * Functionality to add a GEO tag to a textbox
 */
(function ($) {

	$.fn.extend({
		geo_tag_text: function (options) {
			var $this = $(this);
			var settings = $.extend({
				addressOutput: this,
				latOutput: 'geolocation_lat',
				lngOutput: 'geolocation_long',
			}, options);

			var query = window.location.search.substring(1);
			var vars = query.split('&');
			query = {};
			for (var i = 0; i < vars.length; i++) {
				var pair = vars[i].split('=');
				query[pair[0]] = pair[1];
			}
			window.gt3_ext_loc = window.gt3_ext_loc || {};
			if ('geolocation_lat' in query) {
				gt3_ext_loc.listing_lat = query.geolocation_lat;
			}

			if ('geolocation_long' in query) {
				gt3_ext_loc.listing_long = query.geolocation_long;
			}

			var $lat = $('#' + settings.latOutput).length ? '' : jQuery('<input type="hidden" name="' + settings.latOutput + '" id="' + settings.latOutput + '" value="'+(gt3_ext_loc.listing_lat || '')+'" />'),
				$long = $('#' + settings.lngOutput).length ? '' : jQuery('<input type="hidden" name="' + settings.lngOutput + '" id="' + settings.lngOutput + '" value="'+(gt3_ext_loc.listing_long || '')+'" />'),
				$range = $('#gps_range'),
				$icon = $('<i class="location"></i>'),
				$body = $('body'),
				$wrap = $('div.job_listings', $body),
				$current_range = $('.current_range'),
				input_gps_range = $('input[name="gps_range"]'),

				block_change = false;

			$this.wrap('<span class="geo-tag"></span>')
				.before($icon)
				.before($lat)
				.before($long);

			$lat = $('#' + settings.latOutput);
			$long = $('#' + settings.lngOutput);


			var geocoder;
			var position;
			var address;

			$this.on('change', search_location_change);
			jQuery('.job_filters').on('click', '.reset', search_location_change);

			var range_time = null;

			input_gps_range.rangeslider({
				polyfill: false,
				onInit: function () {
					this.onSlide(null, this.$element[0].value)
				},
				onSlide: function (position, value) {
					$current_range.html(value);
				},
				onSlideEnd: function (position, value) {
					clearTimeout(range_time);
					range_time = setTimeout(function () {
						$wrap.triggerHandler('update_results', [1, false]);
					}, 1400);
				}
			});


			function search_location_change(e) {
				if (block_change || $this.hasClass('locked')) return;
				$lat.val('');
				$long.val('');
				$range.removeClass('show');
			}

			$range.on('click', 'input[name="gps_type"]', function (e) {
				clearTimeout(range_time);
				range_time = setTimeout(function () {
					$wrap.triggerHandler('update_results', [1, false]);
				}, 1400);
			});

			// Get GEO on click
			$icon.on('click', function () {
				if (navigator.geolocation) {
					$(this).addClass('loading');
					$range.addClass('show');
					input_gps_range.rangeslider('update');
					navigator.geolocation.getCurrentPosition(
						function (geo_position) { // On success
							position = geo_position;

							$lat.val(position.coords.latitude);
							$long.val(position.coords.longitude);

							geocoder = new google.maps.Geocoder();
							geocoder.geocode(
								{'latLng': new google.maps.LatLng(position.coords.latitude, position.coords.longitude)},
								function (results, status) {
									if (status === google.maps.GeocoderStatus.OK) {
										block_change = true;
										$this.val(results[0].formatted_address).trigger('change');
										$wrap.triggerHandler('update_results', [1, false]);
										$icon.removeClass('loading');
										setTimeout(function () {
											block_change = false
										}, 2000);
									}
								});
						},
						function (error) { // On error
							$icon.removeClass('loading');
							console.error(error.message);
							alert(error.message);
						}
					);
				}
			});
		}
	});

}(jQuery));
