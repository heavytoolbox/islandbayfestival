(function ($, Drupal, drupalSettings) {
  'use strict';

  var setHiddenAddressFieldByReverseLocation = Drupal.geolocation.geocoderWidget.setHiddenAddressFieldByReverseLocation;

  /**
   * Fill address field by reverse geocoding.
   *
   * @param {GoogleMapLatLng} location - Google location.
   * @param {GeolocationMap} map - The settings object that contains all of the necessary metadata for this map.
   */
  Drupal.geolocation.geocoderWidget.setHiddenAddressFieldByReverseLocation = function (location, map) {
    // Execute default function.
    setHiddenAddressFieldByReverseLocation(location, map);

    if (typeof drupalSettings.geolocation.widgetSettings[map.id].addressFieldTarget === 'undefined') {
      return;
    }
    var targetField = drupalSettings.geolocation.widgetSettings[map.id].addressFieldTarget;
    var addressField = $('.webform-type-webform-geolocation-googlegeocoder.canvas-' + targetField.replace(/_/g, '-'));

    if (addressField.length < 1) {
      return;
    }

    if (typeof Drupal.geolocation.geocoderWidget.geocoder === 'undefined') {
      return;
    }

    Drupal.geolocation.geocoderWidget.geocoder.geocode(
      {location: location},

      /**
       * Google Geocoding API geocode.
       *
       * @param {GoogleAddress[]} results - Returned results
       * @param {String} status - Whether geocoding was successful
       */
      function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          Drupal.geolocation.geocoderWidget.setWebformAddressField(results[0], map);
        }
      }
    );
  };

  /**
   * Fill webform address field.
   *
   * @param {GoogleAddress} address - Google retrieved address object.
   * @param {GeolocationMap} map - The settings object that contains all of the necessary metadata for this map.
   */
  Drupal.geolocation.geocoderWidget.setWebformAddressField = function (address, map) {
    if (typeof drupalSettings.geolocation.widgetSettings[map.id].addressFieldTarget === 'undefined') {
      return;
    }

    var targetField = drupalSettings.geolocation.widgetSettings[map.id].addressFieldTarget;
    var addressField = $('.webform-type-webform-geolocation-googlegeocoder.canvas-' + targetField.replace(/_/g, '-'));

    if (addressField.length < 1) {
      return;
    }

    var addressLine1 = '';
    var addressLine2 = '';
    var postalTown = '';
    var country = null;
    var countryCode = null;
    var postalCode = null;
    var streetNumber = null;
    var neighborhood = null;
    var premise = null;
    var route = null;
    var locality = null;
    var administrativeArea = null;
    var political = null;

    $.each(address.address_components, function (key, value) {
      var component = address.address_components[key];
      var types = component.types;

      switch (types[0]) {
        case 'country':
          country = component.long_name;
          countryCode = component.short_name;
          break;
        case 'postal_town':
          postalTown = component.long_name;
          break;
        case 'postal_code':
          postalCode = component.long_name;
          break;
        case 'street_number':
          streetNumber = component.long_name;
          break;
        case 'neighborhood':
          neighborhood = component.long_name;
          break;
        case 'premise':
          premise = component.long_name;
          break;
        case 'political':
          political = component.long_name;
          break;
        case 'route':
          route = component.long_name;
          break;
        case 'locality':
          locality = component.long_name;
          break;
        case 'administrative_area_level_1':
          administrativeArea = component.short_name;
          break;
      }
    });

    // See https://github.com/commerceguys/addressing/issues/73 for reason.

    if (streetNumber) {
      if (countryCode === 'DE' || countryCode === 'CH' || countryCode === 'AT') {
        addressLine1 = route + ' ' + streetNumber;
      }
      else {
        addressLine1 = streetNumber + ' ' + route;
      }
    }
    else if (route) {
      addressLine1 = route;
    }
    else if (premise) {
      addressLine1 = premise;
    }

    if (locality && postalTown && locality !== postalTown) {
      addressLine2 = locality;
    }
    else if (!locality && neighborhood) {
      addressLine2 = neighborhood;
    }

    if (postalTown) {
      locality = postalTown;
    }

    if (!locality && political) {
      // NYC. Americans are weired.
      locality = political;
    }

    // Fill address field.
    addressField.find('input[name$="[value]"]').val(addressLine1 + ' ' + addressLine2);
    addressField.find('input[name$="[city]"]').val(locality);
    addressField.find('input[name$="[country]"]').val(country);
    addressField.find('input[name$="[country_code]"]').val(countryCode);
    addressField.find('input[name$="[administrative]"]').val(administrativeArea);
    addressField.find('input[name$="[county]"]').val('');
    addressField.find('input[name$="[suburb]"]').val('');
    addressField.find('input[name$="[postcode]"]').val(postalCode);
  }

})(jQuery, Drupal, drupalSettings);
