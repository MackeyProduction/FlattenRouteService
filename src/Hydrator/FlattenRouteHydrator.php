<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 06.10.2019
 * Time: 17:19
 */

namespace ZendFlattenRoute\Hydrator;


class FlattenRouteHydrator extends AbstractFlattenRouteHydrator implements HydratorInterface
{

    public function hydrate(array $routes)
    {
        $routeStack = $this->getFlattenRouteStack($routes);

        return array_reverse($routeStack->getRoutes());
    }
}