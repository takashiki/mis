<?php
if (defined('SAE_MYSQL_USER')) {
  return array(
    'db_type' => 'mysql',
    'server' => 'SAE_MYSQL_HOST_M',
    'port' => 'SAE_MYSQL_PORT',
    'username' => 'SAE_MYSQL_USER',
    'password' => 'SAE_MYSQL_PASS',
    'db_name' => 'SAE_MYSQL_DB',
    'charset' => 'utf8'
  );

} else {
  return array(
    'db_type' => 'mysql',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '123456',
    'db_name' => 'mis',
    'charset' => 'utf8'
  );
}