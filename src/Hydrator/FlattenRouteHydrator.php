<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 06.10.2019
 * Time: 17:19
 */

namespace ZendFlattenRoute\Hydrator;

use ZendFlattenRoute\Model\FlattenRoute;

class FlattenRouteHydrator extends AbstractFlattenRouteHydrator implements HydratorInterface
{

    public function hydrate(array $routes)
    {
        $routeStack = $this->getFlattenRouteStack($routes);

        // adding default values from parent route in child routes
        foreach ($routes['routes'] as $route) {
            $defaults = $route['options']['defaults'];

            array_map(function (FlattenRoute $r) use ($defaults) {
                $rDefaults = $r->getOptions()['defaults'] ?? [];
                $r->setOptions(array_merge($r->getOptions(), [
                    'defaults' => $defaults + $rDefaults
                ]));
            }, $routeStack->getRoutes());
        }

        return array_reverse($routeStack->getRoutes());
    }
}
