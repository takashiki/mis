<?php
namespace Mis\Routing;

use Mis\App;

/**
 * RouteGroup Interface
 *
 * @package Mis
 * @since   0.0.1
 */
interface RouteGroupInterface
{
    /**
     * Get route pattern
     *
     * @return string
     */
    public function getPattern();

    /**
     * Execute route group callable in the context of the Slim App
     *
     * This method invokes the route group object's callable, collecting
     * nested route objects
     *
     * @param App $app
     */
    public function __invoke(App $app);
}
