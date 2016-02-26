<?php

namespace Mis\Routing;

use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Route Interface.
 *
 * @since   0.0.1
 */
interface RouteInterface
{
    /**
     * Retrieve a specific route argument.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getArgument($name, $default = null);

    /**
     * Get route arguments.
     *
     * @return array
     */
    public function getArguments();

    /**
     * Get route name.
     *
     * @return null|string
     */
    public function getName();

    /**
     * Get route pattern.
     *
     * @return string
     */
    public function getPattern();

    /**
     * Set a route argument.
     *
     * @param string $name
     * @param string $value
     *
     * @return static
     */
    public function setArgument($name, $value);

    /**
     * Replace route arguments.
     *
     * @param array $arguments
     *
     * @return static
     */
    public function setArguments(array $arguments);

    /**
     * Set route name.
     *
     * @param string $name
     *
     * @throws InvalidArgumentException if the route name is not a string
     *
     * @return static
     */
    public function setName($name);

    /**
     * Prepare the route for use.
     *
     * @param ServerRequestInterface $request
     * @param array                  $arguments
     */
    public function prepare(ServerRequestInterface $request, array $arguments);

    /**
     * Dispatch route callable against current Request and Response objects.
     *
     * This method invokes the route object's callable. If middleware is
     * registered for the route, each callable middleware is invoked in
     * the order specified.
     *
     * @param ServerRequestInterface $request  The current Request object
     * @param ResponseInterface      $response The current Response object
     *
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response);
}
