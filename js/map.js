var map;

var address = '';

(function(Drupal, drupalSettings) {
    address = drupalSettings.js_address.toString();
})(Drupal, drupalSettings);

(function ($, Drupal, drupalSettings) {
    'use strict';
    Drupal.behaviors.jsLocations = {
        attach: function (context, settings) {
            $('.js-var').once('jsLocations').append('Library Address: ' + drupalSettings.js_address );
        }
    }
})(jQuery, Drupal, drupalSettings);

function initMap() {

    var geocoder = new google.maps.Geocoder();

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16
    });

    geocoder.geocode({
            'address': address
        },
        function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map
                });
                map.setCenter(results[0].geometry.location);
            }
        })
}
