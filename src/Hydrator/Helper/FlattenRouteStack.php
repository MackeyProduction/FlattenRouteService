<?php
namespace ZendFlattenRoute\Hydrator\Helper;

use InvalidArgumentException;
use ZendFlattenRoute\Model\FlattenChildRoute;
use ZendFlattenRoute\Model\FlattenRoute;
use ZendFlattenRoute\Model\Route;

class FlattenRouteStack implements RouteStackInterface
{

    /**
     * @var array $routes
     */
    protected $routes;

    /**
     * @param string $routeName
     * @param Route $route
     * @return Route
     */
    public function addRoute(string $routeName, Route $route)
    {
        if ($route instanceof FlattenRoute) {
            return $this->routes[$routeName] = $route;
        }

        if ($route instanceof FlattenChildRoute) {
            $foo = $this->routes[$routeName];

            return $this->routes[$routeName]['child_routes'] = $route;
        }

        throw new InvalidArgumentException("No instance found.");
    }

    /**
     * @param string $routeName
     * @return mixed|void
     */
    public function removeRoute(string $routeName)
    {
        unset($this->routes[$routeName]);
    }

    /**
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
