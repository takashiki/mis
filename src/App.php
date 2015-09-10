<?php
namespace Mis;

use Mis;
use Mis\Container\ContainerInterface;
use Mis\Container\Container;
use InvalidArgumentException;

class App
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    private $container;

    public function __construct($settings = [], $container = null)
    {
        Mis::$app = $this;
        if ($container === null) {
            $container = new Container();
        } elseif (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }

        $this->container = $container;

        $this->init($settings);
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }

    public function __set($name, $value)
    {
        return $this->container->set($name, $value);
    }

    public function __isset($name)
    {
        return $this->container->has($name);
    }

    protected function init($settings)
    {

    }
}