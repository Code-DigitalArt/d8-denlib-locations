<?php

namespace Drupal\locations\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Location entity entities.
 *
 * @ingroup locations
 */
interface LocationEntityInterface extends ContentEntityInterface, EntityChangedInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Location entity name.
   *
   * @return string
   *   Name of the Location entity.
   */
  public function getName();

  /**
   * Sets the Location entity name.
   *
   * @param string $name
   *   The Location entity name.
   *
   * @return \Drupal\locations\Entity\LocationEntityInterface
   *   The called Location entity entity.
   */
  public function setName($name);

	/**
	 * Gets the Location entity address.
	 *
	 * @return string
	 *   Address of the Location entity.
	 */
  public function getAddress();

  /**
   * Sets the Location entity address.
   *
   * @param string $address
   *   The Location entity address.
   *
   * @return \Drupal\locations\Entity\LocationEntityInterface
   *   The called Location entity entity.
   */
  public function setAddress($address);

	/**
	 * Gets the Location entity latitude.
	 *
	 * @return float
	 *   Latitude of the Location entity.
	 */
  public function getLatitude();

  /**
   * Sets the Location entity latitude.
   *
   * @param float $latitude
   *   The Location entity latitude.
   *
   * @return \Drupal\locations\Entity\LocationEntityInterface
   *   The called Location entity entity.
   */
  public function setLatitude($latitude);

	/**
	 * Gets the Location entity Longitude.
	 *
	 * @return float
	 *   Longitude of the Location entity.
	 */
  public function getLongitude();


  /**
   * Sets the Location entity longitude.
   *
   * @param float $longitude
   *   The Location entity longitude.
   *
   * @return \Drupal\locations\Entity\LocationEntityInterface
   *   The called Location entity entity.
   */
  public function setLongitude($longitude);

  /**
   * Gets the Location entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Location entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Location entity creation timestamp.
   *
   * @param int $timestamp
   *   The Location entity creation timestamp.
   *
   * @return \Drupal\locations\Entity\LocationEntityInterface
   *   The called Location entity entity.
   */
  public function setCreatedTime($timestamp);


}
