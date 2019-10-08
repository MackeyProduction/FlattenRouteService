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
     */
    public function addRoute(string $routeName, Route $route)
    {
        $this->routes[$routeName] = $route;
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
