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

    $this->derivatives['content'] = $base_plugin_definition;
    $this->derivatives['content']['title'] = 'Media';
    $this->derivatives['content']['route_name'] = 'view.editor_media_search.page';
    $this->derivatives['content']['parent_id'] = 'views_view:view.editor_content_search.page';
    $this->derivatives['content']['weight'] = ++$weight;
    #$this->derivatives['content']['route_parameters'] = ['source' => 'entity:media', 'type' => $id];

    return parent::getDerivativeDefinitions($base_plugin_definition);

  }

}
