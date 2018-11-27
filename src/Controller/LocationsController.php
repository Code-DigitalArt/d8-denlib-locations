<?php
/**
 * Created by PhpStorm.
 * User: radosun
 * Date: 11/20/18
 * Time: 11:10 AM
 */

namespace Drupal\locations\Controller;


use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\locations\Entity\LocationEntityInterface;

class LocationsController extends ControllerBase
{

	public function content(LocationEntityInterface $location_entity, Request $request)
	{
		$build['#attached']['library'][] = 'locations/locations.map';
		$build['#attached']['drupalSettings']['js_address'][] = $location_entity->getAddress();
		$build['#attached']['drupalSettings']['js_map_center'] = json_encode(['lat' => (float)$location_entity->getLatitude(), 'lng' => (float)$location_entity->getLongitude()]);
		$build['#title'] = $location_entity->getName();
		$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local: </p><span class="type"></span><br><div id="map"></div>';

		return $build;
	}
}