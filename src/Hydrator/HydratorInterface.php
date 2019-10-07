<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 06.10.2019
 * Time: 16:33
 */

namespace ZendFlattenRoute\Hydrator;

use ZendFlattenRoute\Model\Route;

interface HydratorInterface
{
    /**
     * @param array $routes
     * @return Route[]
     */
    public function hydrate(array $routes);
}