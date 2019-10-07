<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 06.10.2019
 * Time: 16:07
 */

namespace ZendFlattenRoute\Service\Composite;

use ZendFlattenRoute\Hydrator\HydratorInterface;
use ZendFlattenRoute\Model\Route;

class FlattenRouteConfiguration implements HydratorInterface
{
    /**
     * @var HydratorInterface[] $hydrators
     */
    protected $hydrators = [];

    /**
     * @var Route[] $routes
     */
    private $routes = [];

    /**
     * @param HydratorInterface $hydrator
     */
    public function addHydrator(HydratorInterface $hydrator)
    {
        $this->hydrators[] = $hydrator;
    }

    /**
     * @param array $routes
     * @return array|Route[]
     */
    public function hydrate(array $routes)
    {
        foreach ($this->hydrators as $hydrator) {
            $this->routes = array_merge($this->routes, $hydrator->hydrate($routes));
        }

        return $this->routes;
    }
}
