<?php

namespace Drupal\thunder_article\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\media_entity\Entity\MediaBundle;

/**
 * Defines dynamic local tasks for the Media Library module.
 */
class EditorSearchLocalTasks extends DeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $weight = 0;
    foreach (MediaBundle::loadMultiple() as $id => $bundle) {
      $this->derivatives[$id] = $base_plugin_definition;
      $this->derivatives[$id]['title'] = $bundle->label();
      $this->derivatives[$id]['route_name'] = 'view.editor_search.bundle_page';
      $this->derivatives[$id]['parent_id'] = 'views_view:view.editor_search.page';
      $this->derivatives[$id]['weight'] = ++$weight;
      $this->derivatives[$id]['route_parameters'] = ['source' => 'entity:media', 'type' => $id];
    }

    return parent::getDerivativeDefinitions($base_plugin_definition);
  }

}
