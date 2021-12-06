<?php

namespace Drupal\webform_geolocation_googlegeocoder\Element;

use Drupal\webform\Element\WebformLocationBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform_geolocation_googlegeocoder\WebformGeolocationGooglecoderHelper;
use Drupal\Component\Utility\Html;

/**
 * Provides a webform element for a location Google Map API element.
 *
 * @FormElement("webform_geolocation_googlegeocoder")
 */
class WebformGeolocationGooglegeocoder extends WebformLocationBase {

  /**
   * {@inheritdoc}
   */
  protected static $name = 'googlegeocoder';

  /**
   * {@inheritdoc}
   */
  public static function getLocationAttributes() {
    return [
      'lat' => t('Latitude'),
      'lng' => t('Longitude'),
      'name' => t('Name'),
      'city' => t('City'),
      'country' => t('Country'),
      'country_code' => t('Country Code'),
      'administrative' => t('State/Province'),
      'county' => t('County'),
      'suburb' => t('Suburb'),
      'postcode' => t('Postal Code'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function processWebformComposite(&$element, FormStateInterface $form_state, &$complete_form) {
    $element = parent::processWebformComposite($element, $form_state, $complete_form);
    $google_geocoder = new WebformGeolocationGooglecoderHelper();

    $canvas_id = Html::getUniqueId($element['#id']);

    // Hidden lat,lng input fields.
    $element['lat']['#attributes']['class'][] = 'geolocation-hidden-lat';
    $element['lng']['#attributes']['class'][] = 'geolocation-hidden-lng';

    $element['controls'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'geocoder-controls-wrapper-' . $canvas_id,
        'class' => [
          'geocode-controls-wrapper',
        ],
      ],
    ];

    $element['controls']['location'] = [
      '#type' => 'textfield',
      '#placeholder' => t('Enter a location'),
      '#attributes' => [
        'class' => [
          'location',
          'form-autocomplete',
        ],
      ],
      '#theme_wrappers' => [],
    ];

    $element['controls']['search'] = [
      '#type' => 'html_tag',
      '#tag' => 'button',
      '#attributes' => [
        'class' => [
          'search',
        ],
        'title' => t('Search'),
      ],
    ];

    $element['controls']['locate'] = [
      '#type' => 'html_tag',
      '#tag' => 'button',
      '#attributes' => [
        'class' => [
          'locate',
        ],
        'style' => 'display: none;',
        'title' => t('Locate'),
      ],
    ];

    $element['controls']['clear'] = [
      '#type' => 'html_tag',
      '#tag' => 'button',
      '#attributes' => [
        'class' => [
          'clear',
          'disabled',
        ],
        'title' => t('Clear'),
      ],
    ];

    // Add the map container.
    $element['map_canvas'] = [
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#attributes' => [
        'id' => $canvas_id,
        'class' => ['geolocation-map-canvas'],
      ],
      '#attached' => [
        'library' => [
          'geolocation/geolocation.widgets.googlegeocoder',
          'webform_geolocation_googlegeocoder/webform'
        ],
        'drupalSettings' => [
          'geolocation' => [
            'widgetSettings' => [
              $canvas_id => [
                'autoClientLocation' => $element['#geolocation'] ? TRUE : FALSE,
                'autoClientLocationMarker' => $element['#geolocation'] ? TRUE : FALSE,
                'addressFieldTarget' => $canvas_id,
              ],
            ],
            'widgetMaps' => [
              $canvas_id => [
                'lat' => (float) $default_map_values['lat'],
                'lng' => (float) $default_map_values['lng'],
                'settings' => [
                  'google_map_settings' => [
                    'type' => 'ROADMAP',
                    'zoom' => 10,
                    'minZoom' => 0,
                    'maxZoom' => 18,
                    'rotateControl' => 0,
                    'mapTypeControl' => 1,
                    'streetViewControl' => 1,
                    'zoomControl' => 1,
                    'fullscreenControl' => 0,
                    'scrollwheel' => 1,
                    'disableDoubleClickZoom' => 0,
                    'draggable' => 1,
                    'height' => '400px',
                    'width' => '100%',
                    'info_auto_display' => 1,
                    'marker_icon_path' => '',
                    'disableAutoPan' => 1,
                    'style' => '',
                    'preferScrollingToZooming' => 0,
                    'gestureHandling' => 'auto',
                  ],
                ],
              ],
            ],
            'google_map_url' => $google_geocoder->getGoogleMapsApiUrl(),
          ],
        ],
      ],
    ];

    // Wrap the whole form in a container.
    $element['#attributes']['class'][] = 'canvas-' . $canvas_id;

    return $element;
  }

}
