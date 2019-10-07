<?php

namespace ZendFlattenRoute\Hydrator;

use ZendFlattenRoute\Model\FlattenRoute;
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

        foreach ($routeStack->getRoutes() as $key => $route) {
            if (array_key_exists('route', $route->getOptions())) {
                /** @var FlattenRoute $route */
                $data = $route->toArray();

                $routeStack->addRoute($key, new FlattenRoute(array_merge(
                    $data, [
                    'options' => [
                        'route' => explode('[/]', $route->getOptions()['route'])[0],
                    ] + $route->getOptions(),
                ])));
            }
        }

        return $routeStack->getRoutes();
    }
}
