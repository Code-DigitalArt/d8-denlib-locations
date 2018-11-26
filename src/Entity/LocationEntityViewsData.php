<?php

namespace Drupal\locations\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Location entity entities.
 */
class LocationEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
