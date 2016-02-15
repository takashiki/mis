<?php
namespace Mis\Routing;

use Closure;
use Mis\App;

/**
 * A collector for Routable objects with a common middleware stack
 *
 * @package Mis
 */
class RouteGroup extends Routable implements RouteGroupInterface
{
    /**
     * Create a new RouteGroup
     *
     * @param string   $pattern  The pattern prefix for the group
     * @param callable $callable The group callable
     */
    public function __construct($pattern, $callable)
    {
        $this->pattern = $pattern;
        $this->callable = $callable;
    }

    /**
     * Prepend middleware to the group middleware collection
     *
     * @param mixed $callable The callback routine
     *
     * @return static
     */
    public function add($callable)
    {
        $callable = $this->resolveCallable($callable);
        if ($callable instanceof Closure) {
            $callable = $callable->bindTo($this->container);
        }

        array_unshift($this->middleware, $callable);

        return $this;
    }

    /**
     * Invoke the group to register any Routable objects within it.
     *
     * @param App $app The App to bind the callable to.
     */
    public function __invoke(App $app)
    {
        $callable = $this->resolveCallable($this->callable);
        if ($callable instanceof Closure) {
            $callable = $callable->bindTo($app);
        }

        $callable();
    }
}
