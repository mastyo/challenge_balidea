<?php

namespace Drupal\challenge_balidea\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Controller routines for page example routes.
 */
class ConfigInfoPage extends ControllerBase {

  protected $config;

  function __construct() {
	$this->config = \Drupal::config('challenge_balidea.settings');
  }

  /**
   * Simple page with information of "challenge balidea" config
   */
  public function return() {
	$text = $this->config->get('text');
	$number = $this->config->get('number');
	$page['#cache']['max-age'] = 0;
	$page['#theme'] = 'config_info_page';
	$page['text'] = [
	  '#markup' => $text['value'],
	];
	$page['number'] = [
	  '#markup' => $number,
	];
	return $page;
  }

}
