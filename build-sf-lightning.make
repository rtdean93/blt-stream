api: 2
core: 8.x

includes:
  - drupal-org-core.make
  - drupal-org.make

# see http://www.drush.org/en/master/make/#recursion the 'Use a distribution as core' section under recursion.
projects:
  lightning:
    type: core
    version: 8.x-1.00-rc6

