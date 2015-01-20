<?php
//error_reporting(E_ALL);
define('APP', 'app/');

require_once 'vendor/autoload.php';
//$config = mis\Config::get('app');
$app = new mis\Mis(mis\Config::get('app'));

$app->route('notFound', function() {
  echo 'rewrite 404';
});

//$app->route('/', function() {echo 'null';});

$app->run();