<?php
/**
 * Created by PhpStorm.
 * User: radosun
 * Date: 11/20/18
 * Time: 12:18 PM
 */

namespace Drupal\locations;

use Drupal\Core\StringTranslation\StringTranslationTrait;

class LocationsSalutation
{

	use StringTranslationTrait;

	/**
	 * Returns Saluation
	 */
	public function getSalutation()
	{
		$time = new \DateTime();
		if((int) $time->format('G') >= 06 && (int) $time->format('G') < 12){
			return $this->t('Good morning');
		}
		if((int) $time->format('G') >= 12 && (int) $time->format('G') < 18){
			return $this->t('Good afternoon');
		}
		if((int) $time->format('G') >=18) {
			return $this->t('Good evening');
		}
	}

}