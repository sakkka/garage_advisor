Add it on your settings.php!!!

$conf['tembo_mongo_db_host'] = 'mongodb://[host]:[port]';
$conf['tembo_mongo_db'] = [db_name];
$conf['tembo_mongo_db_metadata_factory_class'] = [Lungta\Mongo\Mapping\Metadata];
$conf['project_mongo_module'] = module_name;