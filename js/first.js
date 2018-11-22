var address = '';

(function ($, Drupal, drupalSettings) {
    'use strict';
    Drupal.behaviors.jsLocations = {
        attach: function (context, settings) {
            address = drupalSettings.js_address;
            // $('.js-var').once('jsLocations').append('Library Address: ' + drupalSettings.js_address );
        }
    }
})(jQuery, Drupal, drupalSettings);