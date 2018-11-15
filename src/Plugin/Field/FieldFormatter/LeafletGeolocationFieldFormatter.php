<?php

namespace Drupal\parish_school_locator\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'leaflet_geolocation_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "leaflet_geolocation_field_formatter",
 *   label = @Translation("Leaflet Geolocation"),
 *   field_types = {
 *     "geolocation"
 *   }
 * )
 */
class LeafletGeolocationFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      // get latitude and longitude from field value
      $lat = $item->getValue()['lat'];
      $lng = $item->getValue()['lng'];

      // define map features from lat/lng
      $features = [
        [
          'type' => 'point',
          'lat' => $lat,
          'lon' => $lng,
        ],
      ];

      // set map type (default leaflet OSM)
      $settings['leaflet_map'] = 'OSM Mapnik';

      // set $map array with leafletMapGetInfo
      $map = \Drupal::service('leaflet.service')->leafletMapGetInfo($settings['leaflet_map']);

      // render the map
      $result = \Drupal::service('leaflet.service')->leafletRenderMap($map, $features, $height = '350px');

      // set field output as rendered map
      $elements[$delta] = $result;
    }
    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    return nl2br(Html::escape($item->value));
  }

}
