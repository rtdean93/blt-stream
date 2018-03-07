<?php

namespace Drupal\Tests\lightning_core\Unit;

use Drupal\lightning_core\UpdateManager;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\lightning_core\UpdateManager
 *
 * @group lightning
 * @group lightning_core
 */
class UpdateManagerTest extends UnitTestCase {

  /**
   * @covers ::toSemanticVersion
   *
   * @dataProvider providerSemanticVersion
   */
  public function testSemanticVersion($drupal_version, $semantic_version) {
    $this->assertSame($semantic_version, UpdateManager::toSemanticVersion($drupal_version));
  }

  public function providerSemanticVersion() {
    return [
      ['8.x-1.12', '1.12.0'],
      ['8.x-1.2-alpha3', '1.2.0-alpha3'],
      ['8.x-2.7-beta3', '2.7.0-beta3'],
      ['8.x-1.42-rc1', '1.42.0-rc1'],
      ['8.x-1.x-dev', '1.x-dev'],
      // This is a weird edge case only used by the Lightning profile.
      ['8.x-3.001', '3.001.0'],
    ];
  }

}
