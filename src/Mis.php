<?php
use Mis\Container\ContainerInterface;
use Mis\Container\Container;

class Mis
{
    /**
     * Current version
     *
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * Container
     *
     * @var ContainerInterface
     */
    private $container;

    public function __construct($container = null)
    {
        if (!$container) $container = new Container();
        if (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }

        $this->container = $container;
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


}