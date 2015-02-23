<?php
error_reporting(E_ALL);
define('APP', 'app/');

require_once 'vendor/autoload.php';

$app = new mis\Mis();

$app->route('notFound', function() {
  echo 'rewrite 404';
});

//$app->route('/', function() {echo 'null';});

/* function home() {
  echo 'welcome';
}
$app->route('/', 'home'); */

$app->run();