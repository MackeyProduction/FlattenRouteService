<?php

namespace ZendFlattenRoute\Hydrator;

use ZendFlattenRoute\Model\Route;

class TrailingSlashHydrator extends AbstractFlattenRouteHydrator implements HydratorInterface
{

    /**
     * @param array $routes
     * @return Route[]
     */
    public function hydrate(array $routes)
    {
        $routeStack = $this->getFlattenRouteStack($routes);

        // TODO: adding hydrator for trailing slahes.
        return null;
    }
}
