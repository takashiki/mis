<?php

namespace Mis\Routing;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;

/**
 * Router Interface.
 *
 * @since   0.0.1
 */
interface RouterInterface
{
    /**
     * Add route.
     *
     * @param string[] $methods Array of HTTP methods
     * @param string   $pattern The route pattern
     * @param callable $handler The route callable
     *
     * @return RouteInterface
     */
    public function map($methods, $pattern, $handler);

    /**
     * Dispatch router for HTTP request.
     *
     * @param ServerRequestInterface $request The current HTTP request object
     *
     * @return array
     *
     * @link   https://github.com/nikic/FastRoute/blob/master/src/Dispatcher.php
     */
    public function dispatch(ServerRequestInterface $request);

    /**
     * Add a route group to the array.
     *
     * @param string   $pattern  The group pattern
     * @param callable $callable A group callable
     *
     * @return RouteGroup
     */
    public function pushGroup($pattern, $callable);

    /**
     * Removes the last route group from the array.
     *
     * @return bool True if successful, else False
     */
    public function popGroup();

    /**
     * Get named route object.
     *
     * @param string $name Route name
     *
     * @throws RuntimeException If named route does not exist
     *
     * @return Route
     */
    public function getNamedRoute($name);

    /**
     * Build the path for a named route.
     *
     * @param string $name        Route name
     * @param array  $data        Named argument replacement data
     * @param array  $queryParams Optional query string parameters
     *
     * @throws RuntimeException         If named route does not exist
     * @throws InvalidArgumentException If required data not provided
     *
     * @return string
     */
    public function pathFor($name, array $data = [], array $queryParams = []);
}
