var map;
var mlat;
var mlng;
var address = '';
var mapCenter;

(function(Drupal, drupalSettings) {
    address = drupalSettings.js_address.toString();
    mapCenter = JSON.parse(drupalSettings.js_map_center);

    console.log(mapCenter);
})(Drupal, drupalSettings);

(function ($, Drupal, drupalSettings) {
    'use strict';
    Drupal.behaviors.jsLocations = {
        attach: function (context, settings) {
            $('.js-var').once('jsLocations').append('Library Address: ' + drupalSettings.js_address );
            $('.type').once('jsLocations').append('<select class="searchType"><option value="restaurant" selected="selected">Restaurants</option><option value="transit_station">Public Transit</option><option value="store">Stores</option><option value="museum">Museums</option><option value="night_club">Concerts/Clubs</option></select>')
        }
    }
})(jQuery, Drupal, drupalSettings);

function initMap() {

    // var geocoder = new google.maps.Geocoder();

    var searchType = jQuery('.searchType').val();

    if(map == null){
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: mapCenter
        });
    }

    localSearch(mapCenter, searchType);

    // geocoder.geocode({
    //         'address': address
    //     },
    //     function(results, status) {
    //         if(status == google.maps.GeocoderStatus.OK) {
    //             new google.maps.Marker({
    //                 position: results[0].geometry.location,
    //                 map: map
    //             });
    //             map.setCenter(results[0].geometry.location);
    //             mapCenter = map.getCenter();
    //             // local search
    //             console.log(mapCenter);
    //
    //             localSearch(mapCenter, searchType);
    //         }
    //     });

}

function localSearch(mapCenter, searchType){
    searchType = typeof  searchType !== 'undefined' ? searchType : 'restaurant';
    var request = {
        location: mapCenter,
        radius: '500',
        type: [searchType]
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            var place = results[i];
            createMarker(place);
        }
    }


}

function createMarker(place) {

    new google.maps.Marker({
        position: place.geometry.location,
        map: map
    });
}


jQuery(document).ready(
    function(){
        jQuery('.searchType').change(function(){
            initMap();
        });
    });