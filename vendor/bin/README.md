The default bin-dir (as configured in composer.json) for this project is 
REPO-ROOT/bin, which is not committed to the repository. With this setup, Drush
(tested with 8.1.12) does not find the site-local drush version, which can lead
to all kinds of problems depending on the drush/library versions of site-local
system-wide drush. To prevent these problems, the drush executable (symlink) is
committed in a place where the system-wide drush will find it (if called with
the --root parameter): vendor/bin/drush.
