<?php

namespace Mis\Routing;

use Mis\Container\ContainerInterface;

/**
 * A routable, middleware-aware object.
 *
 * @since   0.0.1
 */
abstract class Routable
{
    /**
     * Route callable.
     *
     * @var callable
     */
    protected $callable;

    /**
     * Container.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Route middleware.
     *
     * @var callable[]
     */
    protected $middleware = [];

    /**
     * Route pattern.
     *
     * @var string
     */
    protected $pattern;

    /**
     * Get the middleware registered for the group.
     *
     * @return callable[]
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * Get the route pattern.
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set container for use with resolveCallable.
     *
     * @param ContainerInterface $container
     *
     * @return self
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }
}
