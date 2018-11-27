<?php
/**
 * Created by PhpStorm.
 * User: radosun
 * Date: 11/20/18
 * Time: 11:10 AM
 */

namespace Drupal\locations\Controller;

//use Drupal\locations\LocationsSalutation;
//use Symfony\Component\DependencyInjection\ContainerInterface;


use Drupal\Core\Controller\ControllerBase;
//use Drupal\locations\Entity\LocationEntity;
use Symfony\Component\HttpFoundation\Request;
use Drupal\locations\Entity\LocationEntityInterface;

class LocationsController extends ControllerBase
{

//	/**
//	 * @var \Drupal\locations\LocationsSalutation
//	 */

//	protected $salutation;
//
//	/**
//	 * LocationsController constructor.
//	 *
//	 * @param \Drupal\locations\LocationsSalutation
//	 */
//	public function __construct(LocationsSalutation $salutation)
//	{
//		$this->salutation = $salutation;
//	}
//
//	/**
//	 *  {@inheritdoc}
//	 */
//	public static function create(ContainerInterface $container)
//	{
//		return new static($container->get('locations.salutation'));
//	}
//
//	public function locations()
//	{
//		return [
//			'#markup' => $this->salutation->getSalutation(),
//		];
//	}


//	function locations_preprocess_node($vars)
//	{
//		return $vars['#attached']['drupalSettings']['js_address'] = '10 W 14th Ave Pkwy, Denver, CO 80204';
//	}


	public function content(LocationEntityInterface $location_entity, Request $request)
	{
		$build['#attached']['library'][] = 'locations/locations.map';
		$build['#attached']['drupalSettings']['js_address'][] = $location_entity->getAddress();
		$build['#attached']['drupalSettings']['js_map_center'] = json_encode(['lat' => (float)$location_entity->getLatitude(), 'lng' => (float)$location_entity->getLongitude()]);
		$build['#title'] = $location_entity->getName();
		$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local: </p><span class="type"></span><br><div id="map"></div>';

		return $build;
	}


	/**
	 * @return mixed
	 */
	public function mainTab()
	{
		$build['#attached']['library'][] = 'locations/locations.map';
		$build['#attached']['drupalSettings']['js_address'][] = '10 W 14th Ave Pkwy, Denver, CO 80204';
		$build['#attached']['drupalSettings']['js_map_center'] = json_encode(['lat' => 39.737125, 'lng' => -104.987572]);
		$build['#title'] = 'Central Library';
		$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local:</p><span class="type"></span><br><div id="map"></div>';

//		$build = [
//			'#title' => 'Central Library',
//			'#markup' => 'Central Library<br> <div class="js-var"></div><br><p>Select local:</p><span class="type"></span> <br> <div id="map"></div>',
//			'#attached' => [
//				'library' => [
//					'locations/locations.map',
//				],
//				'drupalSettings' => [
//					'js_address' => [
//						'10 W 14th Ave Pkwy, Denver, CO 80204'
//					],
//				],
//			],
//		];

		return $build;
	}
	
	public function athmarPark()
	{
	    $build['#title'] = 'Athmar Park';
			$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local:</p><span class="type"></span><br><div id="map"></div>';
			$build['#attached']['library'][] = 'locations/locations.map';
			$build['#attached']['drupalSettings']['js_address'][] = '1055 S Tejon St, Denver, CO 80223';
			$build['#attached']['drupalSettings']['js_lat'][] = '39.697149';
			$build['#attached']['drupalSettings']['js_lng'][] = '-105.013016';
	    
	    return $build;
	}
	
	public function bearValley()
	{
	    $build['#title'] = 'Bear Valley';
			$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local:</p><span class="type"></span><br><div id="map"></div>';
			$build['#attached']['library'][] = 'locations/locations.map';
			$build['#attached']['drupalSettings']['js_address'][] = '5171 W Dartmouth Ave, Denver, CO 80236';
	    
	    return $build;
	}
	
	public function blairCaldwell()
	{
	    $build['#title'] = 'Blair Caldwell';
			$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local:</p><span class="type"></span><br><div id="map"></div>';
			$build['#attached']['library'][] = 'locations/locations.map';
			$build['#attached']['drupalSettings']['js_address'][] = '2401 Welton St, Denver, CO 80205';
	    
	    return $build;
	}
	
	public function byers()
	{
	    $build['#title'] = 'Byers';
			$build['#markup'] = $build['#title'] . '<br><div class="js-var"></div><br><p>Select local:</p><span class="type"></span><br><div id="map"></div>';
			$build['#attached']['library'][] = 'locations/locations.map';
			$build['#attached']['drupalSettings']['js_address'][] = '675 Santa Fe Dr, Denver, CO 80204';
	    
	    return $build;
	}


	/**
	 * @return array
	 */
	public function decker()
	{
		return [
			'#markup' => 'Branch Decker'
		];
	}

	/**
	 * @return array
	 */
	public function eugeneField()
	{
		return [
			'#markup' => 'Branch Eugene'
		];
	}

	/**
	 * @return array
	 */
	public function fordWarren()
	{
		return [
			'#markup' => 'Branch Ford Warren'
		];
	}

	/**
	 * @return array
	 */
	public function greenValleyRanch()
	{
		return [
			'#markup' => 'Branch Green Valley Ranch'
		];
	}

	/**
	 * @return array
	 */
	public function hadley()
	{
		return [
			'#markup' => 'Branch Hadley'
		];
	}

	/**
	 * @return array
	 */
	public function hampden()
	{
		return [
			'#markup' => 'Branch Hampden'
		];
	}

	/**
	 * @return array
	 */
	public function montbello()
	{
		return [
			'#markup' => 'Branch Montbello'
		];
	}

	/**
	 * @return array
	 */
	public function parkHill()
	{
		return [
			'#markup' => 'Branch Park Hill'
		];
	}

	/**
	 * @return array
	 */
	public function paulineRobinson()
	{
		return [
			'#markup' => 'Branch Pauline Robinson'
		];
	}

	/**
	 * @return array
	 */
	public function rodolfoGonzales()
	{
		return [
			'#markup' => 'Branch Rodolfo Gonzales'
		];
	}

	/**
	 * @return array
	 */
	public function rossBarnum()
	{
		return [
			'#markup' => 'Branch Ross Barnum'
		];
	}

	/**
	 * @return array
	 */
	public function rossBroadway()
	{
		return [
			'#markup' => 'Branch Ross Broadway'
		];
	}

	/**
	 * @return array
	 */
	public function rossCherryCreek()
	{
		return [
			'#markup' => 'Branch Ross Cherry Creek'
		];
	}

	/**
	 * @return array
	 */
	public function rossUniversityHills()
	{
		return [
			'#markup' => 'Branch Ross Univerity Hills'
		];
	}

	/**
	 * @return array
	 */
	public function samGary()
	{
		return [
			'#markup' => 'Branch Sam Gary'
		];
	}

	/**
	 * @return array
	 */
	public function schlessmanFamily()
	{
		return [
			'#markup' => 'Branch Schiessman Family'
		];
	}

	/**
	 * @return array
	 */
	public function smiley()
	{
		return [
			'#markup' => 'Branch Smiley'
		];
	}

	/**
	 * @return array
	 */
	public function valdezPerry()
	{
		return [
			'#markup' => 'Branch Valdez Perry'
		];
	}

	/**
	 * @return array
	 */
	public function virginiaVillage()
	{
		return [
			'#markup' => 'Branch Virginia Village'
		];
	}

	/**
	 * @return array
	 */
	public function westWood()
	{
		return [
			'#markup' => 'Branch West Wood'
		];
	}

	/**
	 * @return array
	 */
	public function woodbury()
	{
		return [
			'#markup' => 'Branch Woodbury'
		];
	}

}