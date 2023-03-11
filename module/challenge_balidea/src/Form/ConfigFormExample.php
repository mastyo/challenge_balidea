<?php

namespace Drupal\challenge_balidea\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PurchaseForm.
 */
class ConfigFormExample extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
	return 'config_form_example';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
	return [
	  'challenge_balidea.settings',
	];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	$form['text'] = [
	  '#type' => 'text_format',
	  '#title' => $this->t('Information text'),
	  '#default_value' => $this->config('challenge_balidea.settings')->get('text')['value'],
	  '#format' => 'full_html',
	  '#expected_value' => [
		'value' => 'Text value',
		'format' => 'full_html',
	  ],
	  '#textformat_value' => [
		'value' => 'Testvalue',
		'format' => 'filtered_html',
	  ],
	];

	$form['number'] = [
	  '#type' => 'number',
	  '#title' => $this->t('Integer'),
	  '#default_value' => $this->config('challenge_balidea.settings')->get('number'),
	];

	$form['submit'] = [
	  '#type' => 'submit',
	  '#value' => $this->t('Submit'),
	];

	return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	$form_values = $form_state->getValues();

	$this->config('challenge_balidea.settings')
	  ->set('text', $form_values['text'])
	  ->set('number', $form_values['number'])
	  ->save();
	\Drupal::service('cache.render')->invalidateAll();
	parent::submitForm($form, $form_state);
  }

}
