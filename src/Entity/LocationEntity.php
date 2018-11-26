<?php

namespace Drupal\locations\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Location entity entity.
 *
 * @ingroup locations
 *
 * @ContentEntityType(
 *   id = "location_entity",
 *   label = @Translation("Location entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\locations\LocationEntityListBuilder",
 *     "views_data" = "Drupal\locations\Entity\LocationEntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\locations\Form\LocationEntityForm",
 *       "add" = "Drupal\locations\Form\LocationEntityForm",
 *       "edit" = "Drupal\locations\Form\LocationEntityForm",
 *       "delete" = "Drupal\locations\Form\LocationEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "location_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/location_entity/{location_entity}",
 *     "add-form" = "/admin/structure/location_entity/add",
 *     "edit-form" = "/admin/structure/location_entity/{location_entity}/edit",
 *     "delete-form" = "/admin/structure/location_entity/{location_entity}/delete",
 *     "collection" = "/admin/structure/location_entity",
 *   },
 *   field_ui_base_route = "location_entity.settings"
 * )
 */
class LocationEntity extends ContentEntityBase implements LocationEntityInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

	/**
	 * {@inheritdoc}
	 */
	public function getAddress()
	{
		return $this->get('address')->value;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setAddress($address)
	{
		$this->set('address', $address);
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getLatitude()
	{
		return $this->get('latitude')->value;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setLatitude($latitude)
	{
		$this->set('latitude', $latitude);
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getLongitude()
	{
		return $this->get('longitude')->value;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setLongitude($longitude)
	{
		$this->set('longitude', $longitude);
		return $this;
	}

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }



  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Location entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['address'] = BaseFieldDefinition::create('string')
	    ->setLabel(t('Address'))
	    ->setDescription(t('Library Address'))
	    ->setSettings([
	    	'max_length' => 255,
		    'text_processing' => 0,
	    ])
	    ->setDefaultValue('')
	    ->setDisplayOptions('view', [
	    	'label' => 'hidden',
		    'type' => 'string',
		    'weight' => -4,
	    ])
	    ->setDisplayConfigurable('form', TRUE)
	    ->setDisplayConfigurable('view', TRUE);

    $fields['latitude'] = BaseFieldDefinition::create('float')
	    ->setLabel(t('Latitude'))
	    ->setDescription(t('The Latitudinal Coordinate'))
	    ->setSettings([
	    	'min' => '-91',
		    'max' => '91',
	    ])
	    ->setDefaultValue(null)
	    ->setDisplayOptions('view', [
		    'label' => 'above',
		    'type' => 'number_unformatted',
		    'weight' => -4,
	    ])
	    ->setDisplayOptions('form', [
		    'type' => 'number',
		    'weight' => -4,
	    ])
	    ->setDisplayConfigurable('form', TRUE)
	    ->setDisplayConfigurable('view', TRUE);

	  $fields['longitude'] = BaseFieldDefinition::create('float')
		  ->setLabel(t('Longitude'))
		  ->setDescription(t('The Longitudinal Coordinate'))
		  ->setSettings([
			  'min' => '-181',
			  'max' => '180',
		  ])
		  ->setDefaultValue(null)
		  ->setDisplayOptions('view', [
			  'label' => 'above',
			  'type' => 'number_unformatted',
			  'weight' => -4,
		  ])
		  ->setDisplayOptions('form', [
			  'type' => 'number',
			  'weight' => -4,
		  ])
		  ->setDisplayConfigurable('form', TRUE)
		  ->setDisplayConfigurable('view', TRUE);



    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }


}
