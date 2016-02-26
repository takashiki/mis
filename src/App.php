<?php

namespace Mis;

use InvalidArgumentException;
use Mis;
use Mis\Container\Container;
use Mis\Container\ContainerInterface;

class App
{
    /**
     * Container.
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param array                                 $config
     * @param null|Mis\Container\ContainerInterface $container
     */
    public function __construct($config = [], $container = null)
    {
        Mis::$app = $this;

        if ($container === null) {
            $container = new Container();
        } elseif (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface.');
        }
        $this->container = $container;

        $this->init($config);
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }

    public function __set($name, $value)
    {
        $this->container->set($name, $value);
    }

    public function __isset($name)
    {
        return $this->container->has($name);
    }

    protected function init($config)
    {
        $this->initConfig($config);

        $this->registerBaseComponents();
    }

    protected function initConfig($config = [])
    {
        foreach ($config as $key => $value) {
            $this->container->set($key, $value);
        }
    }

    protected function registerBaseComponents()
    {
    }

    /**
     * Add GET route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function get($pattern, $callable)
    {
        return $this->map(['GET'], $pattern, $callable);
    }

    /**
     * Add POST route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function post($pattern, $callable)
    {
        return $this->map(['POST'], $pattern, $callable);
    }

    /**
     * Add PUT route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function put($pattern, $callable)
    {
        return $this->map(['PUT'], $pattern, $callable);
    }

    /**
     * Add PATCH route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function patch($pattern, $callable)
    {
        return $this->map(['PATCH'], $pattern, $callable);
    }

    /**
     * Add DELETE route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function delete($pattern, $callable)
    {
        return $this->map(['DELETE'], $pattern, $callable);
    }

    /**
     * Add OPTIONS route.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function options($pattern, $callable)
    {
        return $this->map(['OPTIONS'], $pattern, $callable);
    }

    /**
     * Add route for any HTTP method.
     *
     * @param string $pattern  The route URI pattern
     * @param mixed  $callable The route callback routine
     *
     * @return \Slim\Interfaces\RouteInterface
     */
    public function any($pattern, $callable)
    {
        return $this->map(['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], $pattern, $callable);
    }

    /**
     * Add route with multiple methods.
     *
     * @param string[] $methods  Numeric array of HTTP method names
     * @param string   $pattern  The route URI pattern
     * @param mixed    $callable The route callback routine
     *
     * @return RouteInterface
     */
    public function map(array $methods, $pattern, $callable)
    {
        $callable = is_string($callable) ? $this->resolveCallable($callable) : $callable;
        if ($callable instanceof Closure) {
            $callable = $callable->bindTo($this);
        }

        $route = $this->container->get('router')->map($methods, $pattern, $callable);
        if (is_callable([$route, 'setContainer'])) {
            $route->setContainer($this->container);
        }

        if (is_callable([$route, 'setOutputBuffering'])) {
            $route->setOutputBuffering($this->container->get('settings')['outputBuffering']);
        }

        return $route;
    }

    /**
     * Route Groups.
     *
     * This method accepts a route pattern and a callback. All route
     * declarations in the callback will be prepended by the group(s)
     * that it is in.
     *
     * @param string   $pattern
     * @param callable $callable
     *
     * @return RouteGroupInterface
     */
    public function group($pattern, $callable)
    {
        /** @var RouteGroup $group */
        $group = $this->container->get('router')->pushGroup($pattern, $callable);
        $group->setContainer($this->container);
        $group($this);
        $this->container->get('router')->popGroup();

        return $group;
    }

    public function run()
    {
    }
}
