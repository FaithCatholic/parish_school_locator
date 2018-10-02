<?php

namespace Drupal\parish_school_locator\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MapboxForm.
 */
class MapboxForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'parish_school_locator.mapbox',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mapbox_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('parish_school_locator.mapbox');
    $form['mapbox_api_token'] = [
        '#type' => 'textfield',
        '#title' => ' Mapbox API Token',
        '#required' => TRUE,
        '#default_value' => $config->get('mapbox_api_token'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('parish_school_locator.mapbox')
      ->set('mapbox_api_token', $form_state->getValue('mapbox_api_token'))
      ->save();
  }

}
