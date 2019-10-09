<?php

use ZendFlattenRoute\Facade\FlattenRouteFacade;

require_once __DIR__ .  "/vendor/autoload.php";

ini_set('xdebug.var_display_max_depth', '6');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
error_reporting(E_ALL);

$routes = require 'routes.php';

$config = [
    'flattenRoute' => true,
    'trailingSlash' => true,
    'methodRoute' => [
        'sso' => [
            'PUT' => [
                'type' => 'method',
                'options' => [
                    'verb' => 'put',
                    'defaults' => [
                        'action' => 'doiPayback',
                    ],
                ],
            ],
        ],
        'best-sso' => [
            'GET' => [
                'type' => 'method',
                'options' => [
                    'verb' => 'get',
                    'defaults' => [
                        'action' => 'bestSso',
                    ],
                ],
            ],
        ],
    ],
];
$facade = new FlattenRouteFacade($config);
$facade->getFlattenRoutes($routes, "./");
