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
//	/**
//	 * Hello World
//	 *
//	 * @return array
//	 */
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


	public function mainTab()
	{
		return [
			'#title' => 'Central Library',
			'#markup' => 'Central Library<br> <div class="js-var"></div><br><p>Select local:</p><span class="type"></span> <br> <div id="map"></div>',
			'#attached' => [
				'library' => [
					'locations/locations.map',
				],
				'drupalSettings' => [
					'js_address' => [
						'10 W 14th Ave Pkwy, Denver, CO 80204'
					],
				],
			],
		];
	}

	public function athmarPark()
	{
		return [
			'#markup' => 'Branch Athmar'
		];
	}

	public function bearValley()
	{
		return [
			'#markup' => 'Branch Bear Valley'
		];
	}

	public function blairCaldwell()
	{
		return [
			'#markup' => 'Branch Blair Caldwell'
		];
	}

	public function byers()
	{
		return [
			'#markup' => 'Branch Byers'
		];
	}

	public function centralLibrary()
	{
		return [
			'#markup' => 'Branch Central Library'
		];
	}

	public function decker()
	{
		return [
			'#markup' => 'Branch Decker'
		];
	}

	public function eugeneField()
	{
		return [
			'#markup' => 'Branch Eugene'
		];
	}

	public function fordWarren()
	{
		return [
			'#markup' => 'Branch Ford Warren'
		];
	}

	public function greenValleyRanch()
	{
		return [
			'#markup' => 'Branch Green Valley Ranch'
		];
	}

	public function hadley()
	{
		return [
			'#markup' => 'Branch Hadley'
		];
	}

	public function hampden()
	{
		return [
			'#markup' => 'Branch Hampden'
		];
	}

	public function montbello()
	{
		return [
			'#markup' => 'Branch Montbello'
		];
	}

	public function parkHill()
	{
		return [
			'#markup' => 'Branch Park Hill'
		];
	}

	public function paulineRobinson()
	{
		return [
			'#markup' => 'Branch Pauline Robinson'
		];
	}

	public function rodolfoGonzales()
	{
		return [
			'#markup' => 'Branch Rodolfo Gonzales'
		];
	}

	public function rossBarnum()
	{
		return [
			'#markup' => 'Branch Ross Barnum'
		];
	}

	public function rossBroadway()
	{
		return [
			'#markup' => 'Branch Ross Broadway'
		];
	}

	public function rossCherryCreek()
	{
		return [
			'#markup' => 'Branch Ross Cherry Creek'
		];
	}

	public function rossUniversityHills()
	{
		return [
			'#markup' => 'Branch Ross Univerity Hills'
		];
	}

	public function samGary()
	{
		return [
			'#markup' => 'Branch Sam Gary'
		];
	}

	public function schlessmanFamily()
	{
		return [
			'#markup' => 'Branch Schiessman Family'
		];
	}

	public function smiley()
	{
		return [
			'#markup' => 'Branch Smiley'
		];
	}

	public function valdezPerry()
	{
		return [
			'#markup' => 'Branch Valdez Perry'
		];
	}

	public function virginiaVillage()
	{
		return [
			'#markup' => 'Branch Virginia Village'
		];
	}

	public function westWood()
	{
		return [
			'#markup' => 'Branch West Wood'
		];
	}

	public function woodbury()
	{
		return [
			'#markup' => 'Branch Woodbury'
		];
	}

}