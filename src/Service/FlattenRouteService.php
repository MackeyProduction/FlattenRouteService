<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 04.10.2019
 * Time: 20:24
 */

namespace ZendFlattenRoute\Service;

use ZendFlattenRoute\Model\FlattenRoute;
use ZendFlattenRoute\Model\Route;
use ZendFlattenRoute\Service\Composite\FlattenRouteConfiguration;

class FlattenRouteService
{

    /**
     * @var FlattenRouteConfiguration $hydrator
     */
    private $hydrator;

    /**
     * FlattenRouteService constructor.
     * @param FlattenRouteConfiguration $hydrator
     */
    public function __construct(FlattenRouteConfiguration $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @param array $routes
     * @return Route[]
     */
    public function getFlattenRoutes(array $routes)
    {
        return $this->hydrator->hydrate($routes);
    }

    /**
     * @param Route[] $routes
     * @return array
     */
    public function flattenRoutesToArray($routes)
    {
        $routeArray = [];

        /**
         * @var string $rKey
         * @var FlattenRoute $route
         */
        foreach ($routes as $rKey => $route) {
            $routeArray[$rKey] = $route->toArray();
            foreach ($route->getChildRoutes() as $rcKey => $cRoute) {
                $routeArray[$rKey]['child_routes'] = $cRoute->toArray();
            }
        }

        return $routeArray;
    }
}
