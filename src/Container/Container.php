<?php
namespace Mis\Container;

use Pimple\Container as PimpleContainer;
use Mis\Container\Exception\ContainerException;
use Mis\Container\Exception\NotFoundException;

class Container extends PimpleContainer implements ContainerInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        if (!$this->offsetExists($id)) {
            throw new NotFoundException("'{$id}' is not defined");
        }
        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    public function set($id, $value)
    {
        $this[$id] = $value;
    }
}