; Base Drupal
core = 7.x

; Internal API for Drush make
api = 2

; Download Drupal core and apply core patches if needed.
projects[drupal][type] = "core"


; Custom
projects[tembo][type] = "module"
projects[tembo][subdir] = "custom"
projects[tembo][download][type] = "git"
projects[tembo][download][url] = "git@koozteam.git.beanstalkapp.com:/koozteam/tembo-drupal7.git"
projects[tembo][download][branch] = "master"


; Contrib
projects[views][type] = "module"
projects[views][subdir] = "contrib"