<?php
if (defined('SAE_TMP_PATH')) {
  return array(
    'controller' => 'app' . DIRECTORY_SEPARATOR . 'controller',
    'model' => 'app' . DIRECTORY_SEPARATOR . 'model',
    'view' => 'app' . DIRECTORY_SEPARATOR . 'view',
    'lib' => 'app' . DIRECTORY_SEPARATOR . 'lib',
      'cache' => 'saestor://storage/cache/'
  );
} else {
  return array(
    'controller' => 'app\controller',
    'model' => 'app\model',
    'view' => 'app\view',
    'lib' => 'app\lib',
    'cache' => 'cache'
  );
}