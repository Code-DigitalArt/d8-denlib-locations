<?php
/**
 * Created by PhpStorm.
 * User: radosun
 * Date: 11/25/18
 * Time: 6:31 PM
 */

namespace Drupal\locations\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LocationsMenuLink extends DeriverBase implements ContainerDeriverInterface
{
	protected $entityTypeManager;

	public function __construct($base_plugin_id, EntityTypeManagerInterface $entityTypeManager){
		$this->entityTypeManager = $entityTypeManager;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function create(ContainerInterface $container, $base_plugin_id)
	{
		return new static(
			$base_plugin_id,
			$container->get('entity.manager'));
	}


	/**
	 * {@inheritdoc}
	 */
	public function getDerivativeDefinitions($base_plugin_definition)
	{
		$links = [];

		$locations = $this->entityTypeManager->getStorage('location_entity')->loadMultiple();

		foreach ($locations as $id => $location)
		{
			$links[$id] = [
				'title' => $location->getName(),
				'route_name' => $location->toUrl()->getRouteName(),
				'route_parameters' => ['location_entity' => $id]
			] + $base_plugin_definition;
		}

		return $links;

	}


}