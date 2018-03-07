## 1.0.0-rc3
* Fixed a problem in the 8006 update that caused problems for users that had an
  existing `lightning.versions` config object.

## 1.0.0-rc2
* Behat contexts used for testing have been moved into Lightning Core.
* The `lightning.versions` config object is now `lightning_core.versions`.

## 1.0.0-rc1
* The `update:lightning` command can now be run using either Drupal Console or
  Drush 9.
* Component version numbers are now recorded on install (and via an update hook
  on existing installations) so that the `version` argument is no longer needed
  with the `update:lightning` command. 

## 1.0.0-alpha3
* Update to core 8.4.4