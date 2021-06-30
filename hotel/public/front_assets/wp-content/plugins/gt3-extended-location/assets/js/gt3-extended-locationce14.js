/*!
 Version: 1.0
 Author: GT3 Themes
 Website: https//gt3themes.com
 File: extended-location.js
 Plugin: gt3-extended-location
 */
"use strict";
jQuery(function ($) {

	if ('1' === gt3_ext_loc.enable_map) {

		var geo_lat = (typeof gt3_ext_loc.list_geo_lat !== 'undefined' && '' !== gt3_ext_loc.list_geo_lat) ? gt3_ext_loc.list_geo_lat : gt3_ext_loc.start_geo_lat;
		var geo_long = (typeof gt3_ext_loc.list_geo_long !== 'undefined' && '' !== gt3_ext_loc.list_geo_lat) ? gt3_ext_loc.list_geo_long : gt3_ext_loc.start_geo_long;

		var look = [jQuery('#job_location'), jQuery('#candidate_location'), jQuery('#event_location')];

		jQuery.each(look, function (key, $input) {
			if ($input.length) {
				$input.geo_tag_text({latOutput: 'geolocation_lat', lngOutput: 'geolocation_long'});
				$input.mapify({startGeoLat: geo_lat, startGeoLng: geo_long});
			}
		});

	}

	var field_id_array = [jQuery('#search_location')];

	jQuery.each(field_id_array, function (key, $input) {
		if ($input.length) {
			$input.geo_tag_text({latOutput: 'geolocation_lat', lngOutput: 'geolocation_long'});
			 var autoComplete = this;
			 var autoCompleteField	= new google.maps.places.Autocomplete( jQuery( autoComplete )[0] );
			// jQuery( autoComplete ).on( 'change', jQuery( autoComplete ), function() {});
		}
	});


	// Don't set the user location when it already has a value
	if ($('#search_location').val() != '') {
		return;
	}

	var user_location = gt3_ext_loc.user_location;

	if (user_location) {

		var input_location = user_location.city ? user_location.city : '';

		if ('' === input_location) {
			input_location = user_location.regionName ? user_location.regionName : '';
		}

		if ('' === input_location) {
			input_location = user_location.countryCode ? user_location.countryCode : '';
		}

		$('.search_jobs').each(function (i, el) {
			var $location = $(this).find('#search_location');
			$location.val(input_location);
		});

	}

});
