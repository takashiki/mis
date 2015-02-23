<?php
return array(
  'driver' => 'mysql',
  'host' => env('SAE_MYSQL_HOST_M', 'localhost'),
  'port' => env('SAE_MYSQL_PORT', '3306'),
  'username' => env('SAE_MYSQL_USER', 'root'),
  'password' => env('SAE_MYSQL_PASS', '123456'),
  'database' => env('SAE_MYSQL_DB', 'mis'),
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => 'mis_',
  'strict'    => false
);