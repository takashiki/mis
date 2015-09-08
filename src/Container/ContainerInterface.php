<?php
namespace Mis\Container;

use Interop\Container\ContainerInterface as InteropContainerInterface;

interface ContainerInterface extends InteropContainerInterface
{
    public function set($id, $value);
}
