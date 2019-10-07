<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 04.10.2019
 * Time: 20:43
 */

namespace ZendFlattenRoute\Hydrator\Helper;

use ZendFlattenRoute\Model\Route;

/**
 * Interface RouteStackInterface
 * @package ZendFlattenRoute\Service\Helper
 */
interface RouteStackInterface
{
    /**
     * @param $name
     * @param $route
     * @return mixed
     */
    public function addRoute(string $name, Route $route);

    /**
     * @param $name
     * @return mixed
     */
    public function removeRoute(string $name);

    /**
     * @return Route[]
     */
    public function getRoutes();
}
