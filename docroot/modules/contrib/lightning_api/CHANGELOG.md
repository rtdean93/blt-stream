## 1.0.0-rc3
* Lightning API will only set up developer-specific settings when our internal
  developer tools are installed.
* Our internal Entity CRUD test no longer tries to write to config entities via
  the JSON API because it is insecure and unsupported, at least for now.

## 1.0.0-rc2
* Security updated JSON API to version 1.10.0. (SA-CONTRIB-2018-15)  
  **Note:** This update has caused parts of our Config Entity CRUD test to fail
  so you might have trouble interacting with config entities via tha API.  

## 1.0.0-rc1
* Update JSON API to 1.7.0 (Issue #2933279)

## 1.0.0-alpha1
* Initial release
