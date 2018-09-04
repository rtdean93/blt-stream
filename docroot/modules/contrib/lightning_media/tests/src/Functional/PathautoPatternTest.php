<?php

namespace Drupal\Tests\lightning_media\Functional;

use Drupal\media\Entity\Media;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\media\Functional\MediaFunctionalTestCreateMediaTypeTrait;

/**
 * @group lightning
 * @group lightning_media
 */
class PathautoPatternTest extends BrowserTestBase {

  use MediaFunctionalTestCreateMediaTypeTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'pathauto',
    'lightning_media',
    'lightning_media_document',
    'lightning_media_image',
    'lightning_media_instagram',
    'lightning_media_twitter',
    'lightning_media_video',
    'media_test_source',
  ];

  /**
   * Tests that media entities are available at path
   * '/media/[media:bundle]/[media:mid]'.
   *
   * @param string $bundle
   *   Media bundle.
   *
   * @dataProvider mediaPatternProvider
   */
  public function testMediaPattern($bundle) {
    $media = Media::create([
      'id' => 1,
      'bundle' => $bundle,
      'name' => 'Foo Bar',
      'status' => 1,
    ]);
    $media->save();
    $this->drupalGet("/media/$bundle/{$media->id()}");
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Foo Bar');
  }

  /**
   * Data provider for ::testMediaPattern().
   *
   * @return array
   *   The test data.
   */
  public function mediaPatternProvider() {
    return [
      ['bundle' => 'document'],
      ['bundle' => 'image'],
      ['bundle' => 'video'],
    ];
  }

  /**
   * Tests that tweet media entities are available at path '/media/tweet/[media:mid]'.
   */
  public function testTweetPattern() {
    $media = Media::create([
      'id' => 1,
      'bundle' => 'tweet',
      'name' => 'Foo Bar',
      'status' => 1,
      'embed_code' => 'https://twitter.com/50NerdsofGrey/status/757319527151636480',
    ]);
    $media->save();
    $this->drupalGet("/media/tweet/{$media->id()}");
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Foo Bar');
  }

  /**
   * Tests that instagram media entities are available at path '/media/instagram/[media:mid]'.
   */
  public function testInstagramPattern() {
    $media = Media::create([
      'id' => 1,
      'bundle' => 'instagram',
      'name' => 'Foo Bar',
      'status' => 1,
      'embed_code' => 'https://www.instagram.com/p/BmIh_AFDBzX',
    ]);
    $media->save();
    $this->drupalGet("/media/instagram/{$media->id()}");
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Foo Bar');
  }

  /**
   * Tests that entities of new media types are available at path '/media/[media:bundle]/[media:mid]'.
   */
  public function testNewMediaTypePattern() {
    $bundle = $this->createMediaType()->id();
    $media = Media::create([
      'id' => 1,
      'bundle' => $bundle,
      'name' => 'Foo Bar',
      'status' => 1,
    ]);
    $media->save();
    $this->drupalGet("/media/$bundle/{$media->id()}");
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Foo Bar');
  }

}
