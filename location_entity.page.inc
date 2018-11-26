<?php

/**
 * @file
 * Contains location_entity.page.inc.
 *
 * Page callback for Location entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Location entity templates.
 *
 * Default template: location_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_location_entity(array &$variables) {
  // Fetch LocationEntity Entity Object.
  $location_entity = $variables['elements']['#location_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
