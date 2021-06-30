/*!
 Version: 1.0
 Author: GT3 Themes
 Website: https//gt3themes.com
 File: mapify.js
 Plugin: extended-location
 */
"use strict";
(function ($) {
	$.fn.mapify = function (options) {
		// Default settings
		var settings = $.extend({
			mapify: this,
			mapHeight: '200px',
			startGeoLat: 40.712784,
			startGeoLng: -74.005941,
			latInputId: 'geolocation_lat',
			lngInputId: 'geolocation_long'
		}, options);

		return this.each(function () {
			var map,
				mapLock = false,
				geocoder = new google.maps.Geocoder(),
				mapOptions = {center: new google.maps.LatLng(settings.startGeoLat, settings.startGeoLng), zoom: 13, streetViewControl: false},
				marker,
				autoComplete = this,
				infoWindow,
				$latInputId = $('#' + settings.latInputId).length ? '' : '<input type="hidden" name="' + settings.latInputId + '" id="' + settings.latInputId + '" value="' + settings.startGeoLat + '">',
				$lngInputId = $('#' + settings.lngInputId).length ? '' : '<input type="hidden" name="' + settings.lngInputId + '" id="' + settings.lngInputId + '" value="' + settings.startGeoLng + '">';
			var autoCompleteField = new google.maps.places.Autocomplete(jQuery(autoComplete)[0]);


			var mapifyHandler = {
				init: function () {
					$(settings.mapify).parent().closest('div, p, td').wrap('<div class="mapified"></div>')
						.after(
							'<div id="map-canvas" style="width: 100%; height: ' + settings.mapHeight + ';"></div>' +
							'<div id="map-canvas-options"><span class="map-action-lock unlocked" data-lock="' +
							gt3_ext_loc.l10n.locked + '" data-unlock="' + gt3_ext_loc.l10n.unlocked + '"></span></div>' +
							$latInputId +
							$lngInputId);

					$latInputId = $('#' + settings.latInputId);
					$lngInputId = $('#' + settings.lngInputId);

					infoWindow = new google.maps.InfoWindow();
					map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
					autoCompleteField.bindTo('bounds', map);
					marker = new google.maps.Marker({
						map: map,
						draggable: true,
						animation: google.maps.Animation.DROP,
						anchorPoint: new google.maps.Point(0, -29),
						position: mapOptions.center
					});

					$(autoComplete).on('change', $(autoComplete), function () {
						mapifyHandler.checkAddress($(autoComplete).val());
					});

					// Autocomplete change
					google.maps.event.addListener(autoCompleteField, 'place_changed', function () {
						mapifyHandler.autoCompleteChange();
					});

					// Marker change
					google.maps.event.addListener(marker, 'dragend', function (event) {
						mapifyHandler.markerChange();
					});

					// Prevent enter from submitting form
					google.maps.event.addDomListener(autoComplete, 'keydown', function (event) {
						if (event.keyCode === 13) {
							event.preventDefault();
						}
					});

					// TEMP hack to get the settings page correct.
					jQuery('.nav-tab').on('click', function () {
						if (map != undefined) {
							google.maps.event.trigger(map, 'resize');
							map.setCenter({"lat": parseFloat($latInputId.val()), "lng": parseFloat($lngInputId.val())});
							marker.setPosition({"lat": parseFloat($latInputId.val()), "lng": parseFloat($lngInputId.val())});
						}
					});

					var $lock = $('#map-canvas-options .map-action-lock');

					$lock.text($lock.data('lock'));

					$lock.on('click', function () {
						$lock.toggleClass('locked').toggleClass('unlocked');
						$lock.text($lock.data($lock.hasClass('locked') ? 'unlock' : 'lock'));
						marker.setDraggable(mapLock);
						mapLock = !mapLock;
						settings.mapify.toggleClass('locked');
					});

				},
				autoCompleteChange: function (event) {
					var place = autoCompleteField.getPlace();
					mapifyHandler.updateLocation(place.geometry.location.lat(), place.geometry.location.lng());
				},
				markerChange: function (position) {
					mapifyHandler.updateLocation(marker.getPosition().lat(), marker.getPosition().lng());
					if (mapLock === false) {
						mapifyHandler.reverseGeoCode(marker.getPosition().lat(), marker.getPosition().lng());
					}
				},
				setAddress: function (address) {
					$(autoComplete).val(address);
				},
				checkAddress: function (address) {
					var coordinates = false, re = /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/, m, coordinates_lat = '',
						coordinates_long = '';
					if (re.test(address)) {
						coordinates = true;
					}
					if (!coordinates) {
						mapifyHandler.geoCode(address);
					} else {
						var index = address.indexOf(",");
						mapifyHandler.updateLocation(address.substr(0, index), address.substr(index + 1).trim());
					}
				},
				setMarker: function (latLng) {
					marker.setVisible(false);
					marker.setPosition(latLng);
					marker.setVisible(true);
				},
				updateLocation: function (lat, lng) {
					if (mapLock === false) {
						var latLng = new google.maps.LatLng(lat, lng);
						$latInputId.attr('value', lat);
						$lngInputId.attr('value', lng);
						map.panTo(latLng);
						mapifyHandler.setMarker(latLng);
					}
				},
				geoCode: function (address) {
					geocoder.geocode({'address': address}, function (results, status) {
						if (status === google.maps.GeocoderStatus.OK && results[0]) {
							mapifyHandler.updateLocation(results[0].geometry.location.lat(), results[0].geometry.location.lng());
						}
					});
				},
				reverseGeoCode: function (lat, lng) {
					geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
						if (status === google.maps.GeocoderStatus.OK && results[0]) {
							mapifyHandler.setAddress(results[0].formatted_address);
						}
					});
				}
			};

			mapifyHandler.init();
		});
	};

}(jQuery));

