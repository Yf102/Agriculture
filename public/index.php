<?php

// Prepare config and root dir
$loader = require_once (__DIR__ . '/../vendor/autoload.php');

// Spawn ORM DB Connection
require_once(MODULE_DIR . "/orm/generated-conf/config.php");

if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Init auto loader
//$zf2Path = ROOT_DIR . '/vendor/zendframework/zendframework/library';
//$loader->add('Zend', $zf2Path);

// Check if zend autoloader downloaded
if (!class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}

$app_config = require_once(ROOT_DIR . '/config/application.config.php');
Zend\Mvc\Application::init($app_config)->run();
