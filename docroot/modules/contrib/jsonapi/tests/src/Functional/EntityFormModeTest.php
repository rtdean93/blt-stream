<?php

namespace Drupal\Tests\jsonapi\Functional;

use Drupal\Core\Entity\Entity\EntityFormMode;
use Drupal\Core\Url;

/**
 * JSON API integration test for the "EntityFormMode" config entity type.
 *
 * @group jsonapi
 */
class EntityFormModeTest extends ResourceTestBase {

  /**
   * {@inheritdoc}
   *
   * @todo: Remove 'field_ui' when https://www.drupal.org/node/2867266.
   */
  public static $modules = ['user', 'field_ui'];

  /**
   * {@inheritdoc}
   */
  protected static $entityTypeId = 'entity_form_mode';

  /**
   * {@inheritdoc}
   */
  protected static $resourceTypeName = 'entity_form_mode--entity_form_mode';

  /**
   * {@inheritdoc}
   *
   * @var \Drupal\Core\Entity\EntityFormModeInterface
   */
  protected $entity;

  /**
   * {@inheritdoc}
   */
  protected function setUpAuthorization($method) {
    $this->grantPermissionsToTestedRole(['administer display modes']);
  }

  /**
   * {@inheritdoc}
   */
  protected function createEntity() {
    $entity_form_mode = EntityFormMode::create([
      'id' => 'user.test',
      'label' => 'Test',
      'targetEntityType' => 'user',
    ]);
    $entity_form_mode->save();
    return $entity_form_mode;
  }

  /**
   * {@inheritdoc}
   */
  protected function getExpectedDocument() {
    $self_url = Url::fromUri('base:/jsonapi/entity_form_mode/entity_form_mode/' . $this->entity->uuid())->setAbsolute()->toString(TRUE)->getGeneratedUrl();
    return [
      'jsonapi' => [
        'meta' => [
          'links' => [
            'self' => 'http://jsonapi.org/format/1.0/',
          ],
        ],
        'version' => '1.0',
      ],
      'links' => [
        'self' => $self_url,
      ],
      'data' => [
        'id' => $this->entity->uuid(),
        'type' => 'entity_form_mode--entity_form_mode',
        'links' => [
          'self' => $self_url,
        ],
        'attributes' => [
          'cache' => TRUE,
          'dependencies' => [
            // @todo Remove the first line in favor of the 3 commented lines in https://www.drupal.org/project/jsonapi/issues/2942979
            // @codingStandardsIgnoreStart
            'user',
//            'module' => [
//              'user',
//            ],
            // @codingStandardsIgnoreEnd
          ],
          'id' => 'user.test',
          'label' => 'Test',
          'langcode' => 'en',
          'status' => TRUE,
          'targetEntityType' => 'user',
          'uuid' => $this->entity->uuid(),
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getPostDocument() {
    // @todo Update in https://www.drupal.org/node/2300677.
  }

}
