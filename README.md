sf-lightning
=====

Acquia lightning distro with acsf initited and ready to go!

Usage
-----
```./build-sf-lightning.sh```

The above should make a D8 lighthing disto with acsf properly init'd
If lighting changes versions edit the build-sf-lightning.make

Prod Builds
-----------
Pull the acsf module from d.o. The composer segment for acsf should look like:
```json
 "drupal/acsf": "1.32",
```

Dev Builds
----------
You need to pull in the module from github. The composer segment should look like:
```json
"acquia/acsf": "dev-2.50-RC-NIGHTLY-d8",
```
You also need to have composer look for the repo. This should be in your repositories stanza
```json
        {
            "type": "git",
            "url": "git@github.com:acquia/acsf.git"
        },
```