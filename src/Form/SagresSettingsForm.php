<?php

namespace Drupal\sagres\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class sagresSettingsForm extends ConfigFormBase {
  protected function getEditableConfigNames() {
    return ['sagres.settings'];
  }

  public function getFormId() {
    return 'sagres_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sagres.settings');

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $config->get('title'),
    ];

    $form['subTitle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sub Title'),
      '#default_value' => $config->get('subTitle'),
    ];

    $form['primary_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Main Color'),
      '#default_value' => $config->get('primary_color'),
    ];

    $form['secondary_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Secondary Color'),
      '#default_value' => $config->get('secondary_color'),
    ];

    $form['logo'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Logo'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['150x150', ''],
      ],
      '#default_value' => $config->get('logo'),
      '#description' => $this->t('Image should have 150px X 150px.'),
    ];

    $form['footer_logo'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Footer Logo'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['700x1', ''],
      ],
      '#default_value' => $config->get('footer_logo'),
      '#description' => $this->t('Image should have at least 700px wide.'),
    ];

    $form['image_1'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Imagem 1'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['1400x1', ''],
      ],
      '#default_value' => $config->get('image_1'),
      '#description' => $this->t('Image should have at least 1400px wide.'),
    ];

    $form['image_2'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Imagem 2'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['1400x1', ''],
      ],
      '#default_value' => $config->get('image_2'),
      '#description' => $this->t('Image should have at least 1400px wide.'),
    ];

    $form['image_3'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Imagem 3'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['1400x1', ''],
      ],
      '#default_value' => $config->get('image_3'),
      '#description' => $this->t('Image should have at least 1400px wide.'),
    ];

    $form['partners_logo'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Partners Logo'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['1400x1', ''],
      ],
      '#default_value' => $config->get('partners_logo'),
    ];

    $form['partners_2_logo'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Partners 2 Logo'),
      '#upload_location' => 'public://sagres_images/',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_image_resolution' => ['1400x1', ''],
      ],
      '#default_value' => $config->get('partners_2_logo'),
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('sagres.settings')
      ->set('title', $form_state->getValue('title'))
      ->set('subTitle', $form_state->getValue('subTitle'))
      ->set('logo', $form_state->getValue('logo'))
      ->set('footer_logo', $form_state->getValue('footer_logo'))
      ->set('primary_color', $form_state->getValue('primary_color'))
      ->set('secondary_color', $form_state->getValue('secondary_color'))
      ->set('image_1', $form_state->getValue('image_1'))
      ->set('image_2', $form_state->getValue('image_2'))
      ->set('image_3', $form_state->getValue('image_3'))
      ->set('partners_logo', $form_state->getValue('partners_logo'))
      ->set('partners_2_logo', $form_state->getValue('partners_2_logo'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
