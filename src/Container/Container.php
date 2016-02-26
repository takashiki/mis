<?php

namespace Mis\Container;

use Mis\Container\Exception\NotFoundException;
use Pimple\Container as PimpleContainer;

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
