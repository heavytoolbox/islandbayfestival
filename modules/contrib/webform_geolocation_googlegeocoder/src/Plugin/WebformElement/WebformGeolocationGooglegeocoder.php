<?php

namespace Drupal\webform_geolocation_googlegeocoder\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\WebformLocationBase;
use Drupal\webform\WebformInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url as UrlGenerator;

/**
 * Provides an 'geolocation' element using Google Map API.
 *
 * @WebformElement(
 *   id = "webform_geolocation_googlegeocoder",
 *   label = @Translation("Location (Google Map API)"),
 *   description = @Translation("Provides a form element to collect valid location information (address, longitude, latitude, geolocation) using Google Map API."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 */
class WebformGeolocationGooglegeocoder extends WebformLocationBase {

  /**
   * {@inheritdoc}
   */
  protected function defineDefaultProperties() {
    return [
      'placeholder' => '',
      'geolocation' => FALSE,
      'hidden' => FALSE,
    ] + parent::defineDefaultProperties();
  }

  /**
   * {@inheritdoc}
   */
  public function getTestValues(array $element, WebformInterface $webform, array $options = []) {
    return [
      [
        'value' => '1600 Pennsylvania Avenue, Washington, District of Columbia, United States of America',
        'lat' => '38.8635',
        'lng' => '-76.946',
        'name' => '1600 Pennsylvania Avenue',
        'city' => 'Washington',
        'country' => 'United States of America',
        'country_code' => 'us',
        'administrative' => 'District of Columbia',
        'county' => 'Prince George\'s County',
        'suburb' => '',
        'postcode' => '20020',
      ],
    ];
  }

}
