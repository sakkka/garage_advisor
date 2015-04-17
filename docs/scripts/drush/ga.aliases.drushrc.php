<?php
$LOCAL_PROJECT_PATH = "/Volumes/workspace/garage_advisor";

$aliases['local'] = array
(
  'uri' => 'http://local.garageadvisor.com/',
  'root' => $LOCAL_PROJECT_PATH.'/www',
  'result-file' => $LOCAL_PROJECT_PATH.'/db_snapshots/garageadvisor.com/local/@DATABASE_@DATE.sql',
  'path-aliases' => array(
      '%drush' => '/usr/lib/drush/',
      '%drush-script' => '/usr/local/bin/drush',
    '%dump-dir' => $LOCAL_PROJECT_PATH.'/db_snapshots/sync',
  ),
);
