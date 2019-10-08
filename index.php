<?php

use ZendFlattenRoute\Hydrator\FlattenRouteHydrator;
use ZendFlattenRoute\Hydrator\MethodRouteHydrator;
use ZendFlattenRoute\Hydrator\TrailingSlashHydrator;
use ZendFlattenRoute\Model\FlattenChildRoute;
use ZendFlattenRoute\Service\Composite\FlattenRouteConfiguration;
use ZendFlattenRoute\Service\FlattenRouteService;
use ZendFlattenRoute\Hydrator\Helper\FlattenRouteStack;

require_once __DIR__ .  "/vendor/autoload.php";

ini_set('xdebug.var_display_max_depth', '6');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
error_reporting(E_ALL);

$routes = require 'routes.php';

$routeStack = new FlattenRouteStack();
$hydrator = new FlattenRouteConfiguration();
$methodRouteHydrator = new MethodRouteHydrator($routeStack);
$methodRouteHydrator->addChildRoute('sso', 'PUT', new FlattenChildRoute([
    'type' => 'method',
    'options' => [
        'verb' => 'put',
        'defaults' => [
            'action' => 'doiPayback',
        ],
    ],
]));
$methodRouteHydrator->addChildRoute('best-sso', 'GET', new FlattenChildRoute([
    'type' => 'method',
    'options' => [
        'verb' => 'get',
        'defaults' => [
            'action' => 'bestSso',
        ],
    ],
]));

$hydrator->addHydrator(new FlattenRouteHydrator($routeStack));
$hydrator->addHydrator(new TrailingSlashHydrator($routeStack));
$hydrator->addHydrator($methodRouteHydrator);
$service = new FlattenRouteService($hydrator);
$result = $service->getFlattenRoutes($routes);

var_dump($result);
