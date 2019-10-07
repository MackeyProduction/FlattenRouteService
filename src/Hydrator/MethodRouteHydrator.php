<?php

namespace ZendFlattenRoute\Hydrator;

use InvalidArgumentException;
use ZendFlattenRoute\Model\FlattenChildRoute;
use ZendFlattenRoute\Model\Route;

class MethodRouteHydrator extends FlattenRouteHydrator implements HydratorInterface
{

    private $childRoutes = [];

    /**
     * @param array $routes
     * @return Route[]
     */
    public function hydrate(array $routes)
    {
        $routeStack = $this->getFlattenRouteStack($routes);

        if (empty($this->childRoutes)) {
            throw new InvalidArgumentException("No child routes defined.");
        }

        $filteredRoutes = array_intersect_key($this->routeStack->getRoutes(), $this->childRoutes);

        foreach ($filteredRoutes as $key => $route) {
            foreach ($this->childRoutes[$key] as $cKey => $cRoute) {
                $routeStack->addRoute($key, $this->childRoutes[$key][$cKey]);
            }
        }

        return $routeStack->getRoutes();
    }

    public function addChildRoute(string $parentRouteName, string $childRouteName, Route $route)
    {
        if (! $route instanceof FlattenChildRoute) {
            throw new InvalidArgumentException(
                sprintf("The child route have to be an instance of %s.",
                FlattenChildRoute::class
                )
            );
        }

        $this->childRoutes[$parentRouteName][$childRouteName] = $route;
    }
}
