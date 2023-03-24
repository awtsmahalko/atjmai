<?php
//error_reporting(0);

date_default_timezone_set("Asia/Manila");

define('HTACCESS_APP', '/atjmai/app/');
define('BASE_URL', 'http://localhost/atjmai/');
define("BASE_PATH", __DIR__ . "/../");

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "almai_db");

session_start();

spl_autoload_register(function ($class) {

    include __DIR__ . '/autoloader.php';
    include __DIR__ . '/_autoloader.php';

    if (array_key_exists($class, $core_classes)) {
        require_once $core_classes[$class];
    }
});