<?php

use ZendFlattenRoute\Hydrator\FlattenRouteHydrator;
use ZendFlattenRoute\Hydrator\TrailingSlashHydrator;
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
$hydrator->addHydrator(new FlattenRouteHydrator($routeStack));
//$hydrator->addHydrator(new TrailingSlashHydrator($routeStack));
$service = new FlattenRouteService($hydrator);
//$service->addOptions("sso", [
//    'child_routes' => [
//        'GET' => [
//            'type' => 'Method::class',
//            'options' => [
//                'verb' => 'GET',
//                'defaults' => [
//                    'controller' => 'SsoController::class',
//                ],
//            ],
//        ],
//    ],
//]);
$result = $service->getFlattenRoutes($routes);

var_dump($result);
//
//$foo = new Zend\Router\Http\TreeRouteStack();
//$a = $foo->addRoutes($result);
//
///** @var \Zend\Router\Http\Part $b */
//$b = $a->getRoute('sso');
//
//var_dump($b);
