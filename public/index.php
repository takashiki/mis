<?php
error_reporting(E_ALL);
define('APP', realpath('/../app/'));

require_once '/../vendor/autoload.php';

$app = new mis\Mis();

$app->route('notFound', function() {
    echo 'rewrite 404';
});

$app->route('/', function() {echo 'welcome';});

$app->run();