<?php

use Zend\Router\Http\Literal;
use Zend\Router\Http\Method;
use Zend\Router\Http\Regex;
use Zend\Router\Http\Segment;

return [
    'routes' => [
        'checkout' => [
            'type' => 'segment',
            'options' => [
                'route' => '/checkout[/]',
                'defaults' => [
                    'WireframeOptions::ROUTE_PARAMETER' => [
                        'layout' => 'layout/standard_b-slim',
                        'hide_breadcrumbs' => true,
                    ],
                    'RouteOptions::ROUTE_PARAMETER' => [
                        'ppset' => null,
                    ],
                ],
            ],
            'may_terminate' => false,
            'child_routes' => [
                'error' => [
                    'type' => Segment::class,
                    'options' => [
                        'route' => 'error/:leadId',
                        'constraints' => [
                            'leadId' => '\d+',
                        ],
                        'defaults' => [
                            'controller' => 'ErrorController::class',
                            'action' => 'index',
                        ],
                    ],
                ],
                'create' => [
                    'type' => Segment::class,
                    'options' => [
                        'route' => 'enter',
                        'defaults' => [
                            'action' => 'post',
                        ],
                    ],
                    'may_terminate' => false,
                    'child_routes' => [
                        'enter' => [
                            'type' => Method::class,
                            'options' => [
                                'verb' => 'POST',
                                'defaults' => [
                                    'controller' => 'EnterController::class',
                                ],
                            ],
                        ],
                    ],
                ],
                'partner' => [
                    'type' => Literal::class,
                    'options' => [
                        'route' => 'partner/',
                        'defaults' => [
                            'controller' => 'PartnerController::class',
                            'action' => 'index',
                        ],
                    ],
                ],
                'ajax' => [
                    'type' => 'literal',
                    'options' => [
                        'route' => 'ajax/',
                        'defaults' => [
                            'layout' => 'layout/nowireframe',
                        ],
                    ],
                    'may_terminate' => false,
                    'child_routes' => [
                        'citylist' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'citylist',
                                'defaults' => [
                                    'controller' => 'PersonalDataController::class',
                                    'action' => 'citylist',
                                    'Cache\Options::ROUTE_PARAMETER' => [
                                        'cache' => true,
                                        'public' => true,
                                        'ttl' => 60 * 60, // 1h
                                        'headers' => [
                                            // Tell NGINX reverse proxy that it can cache this request for 1 week
                                            // The cache is being PURGED if the cronjob for citylist update is being
                                            // executed
                                            'X-Accel-Expires' => 60 * 60 * 24 * 7,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'bankname' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'bankname/:iban',
                                'defaults' => [
                                    'controller' => 'PaymentController::class',
                                    'action' => 'bankname',
                                    'Cache\Options::ROUTE_PARAMETER' => [
                                        'cache' => true,
                                        // Cache the bankname at the client for a year since it wont change
                                        // that often
                                        'public' => false,
                                        'ttl' => 60 * 60 * 24 * 30, // 30 days
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'process' => [
                    'type' => 'segment',
                    'options' => [
                        'route' => ':leadId/',
                        'constraints' => [
                            'leadId' => '\d+',
                        ],
                    ],
                    'may_terminate' => false,
                    'child_routes' => [
                        // Route is still being used in re-targeting mails
                        'shopping-cart' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'shopping-cart[/]',
                                'defaults' => [
                                    'controller' => 'Details::class',
                                    'action' => 'deprecated',
                                ],
                            ],
                        ],
                        'personal-data' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'personal-data[/]',
                                'defaults' => [
                                    'controller' => 'PersonalDataController::class',
                                    'action' => 'index',
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'area_id' => 'mf-checkout-personal-data',
                                    ],
                                ],
                            ],
                            'may_terminate' => true,
                            'child_routes' => [
                                'validate' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'validate',
                                        'defaults' => [
                                            'action' => 'validate',
                                        ],
                                    ],
                                ],
                                'submit' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'submit',
                                        'defaults' => [
                                            'action' => 'submit',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'payment' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'payment[/]',
                                'defaults' => [
                                    'controller' => 'PaymentController::class',
                                    'action' => 'index',
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'area_id' => 'mf-checkout-payment',
                                    ],
                                ],
                            ],
                            'may_terminate' => true,
                            'child_routes' => [
                                'bankname' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'bankname',
                                        'defaults' => [
                                            'action' => 'bankname',
                                        ],
                                    ],
                                ],
                                'validate' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'validate',
                                        'defaults' => [
                                            'action' => 'validate',
                                        ],
                                    ],
                                ],
                                'submit' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'submit',
                                        'defaults' => [
                                            'action' => 'submit',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'additional-information' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'additional-information[/]',
                                'defaults' => [
                                    'controller' => 'AdditionalInformation\IndexController::class',
                                    'action' => 'index',
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'area_id' => 'mf-checkout-additional-information',
                                    ],
                                ],
                            ],
                            'may_terminate' => true,
                            'child_routes' => [
                                'validate' => [
                                    'type' => 'segment',
                                    'options' => [
                                        'route' => 'validate/:type',
                                        'constraints' => [
                                            'type' => '[a-z]+',
                                        ],
                                        'defaults' => [
                                            'controller' => 'AdditionalInformation\ValidationController::class',
                                            'action' => 'validate',
                                        ],
                                    ],
                                ],
                                'submit' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'submit',
                                        'defaults' => [
                                            'controller' => 'AdditionalInformation\SubmitController::class',
                                            'action' => 'submit',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'overview' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'overview[/]',
                                'defaults' => [
                                    'controller' => 'OverviewController::class',
                                    'action' => 'index',
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'area_id' => 'mf-checkout-overview',
                                    ],
                                ],
                            ],
                        ],
                        'voucher' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'voucher[/]',
                                'defaults' => [
                                    'controller' => 'VoucherController::class',
                                ],
                            ],
                            'may_terminate' => false,
                            'child_routes' => [
                                'submit' => [
                                    'type' => 'method',
                                    'options' => [
                                        'verb' => 'PUT',
                                        'defaults' => [
                                            'action' => 'submit',
                                        ],
                                    ],
                                ],
                                'delete' => [
                                    'type' => 'method',
                                    'options' => [
                                        'verb' => 'DELETE',
                                        'defaults' => [
                                            'action' => 'delete',
                                        ],
                                    ],
                                ],
                                'list' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'list',
                                        'defaults' => [
                                            'action' => 'list',
                                            'Cache\Options::ROUTE_PARAMETER' => [
                                                'public' => false,
                                                'cache' => false,
                                                'store' => false,
                                                'revalidate' => true,
                                            ],
                                        ],
                                    ],
                                ],
                                'validate' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'validate',
                                        'defaults' => [
                                            'action' => 'validate',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'confirmation' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'confirmation/',
                                'defaults' => [
                                    'controller' => 'ConfirmationController::class',
                                    'action' => 'submit',
                                ],
                            ],
                        ],
                        'handinlater' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'handin-later/:leadAccessKey[/]',
                                'constraints' => [
                                    'leadAccessKey' => '[a-z0-9]{20}',
                                ],
                                'defaults' => [
                                    'controller' => 'HandInLaterController::class',
                                    'action' => 'index',
                                    'MobileRouteOptions::ROUTE_PARAMETER' => [
                                        'route' => 'mobile/content/handinlater',
                                    ],
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'area_id' => 'mf-handin-later',
                                    ],
                                ],
                            ],
                        ],
                        'thankyou' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => 'thankyou[/]',
                                'defaults' => [
                                    'controller' => 'ThankyouController::class',
                                    'action' => 'index',
                                    'GTParameters::ROUTE_CONFIGURATION' => [
                                        'action_id' => 7,
                                        'area_id' => 'mf-checkout-thankyou',
                                    ],
                                    'WireframeOptions::ROUTE_PARAMETER' => [
                                        'layout' => 'layout/standard_a',
                                        'hide_breadcrumbs' => true,
                                    ],
                                ],
                            ],
                            'may_terminate' => true,
                            'child_routes' => [
                                'transferLead' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'transfer',
                                        'defaults' => [
                                            'action' => 'transferLead',
                                        ],
                                    ],
                                ],
                                'updateSsoUser' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'update-sso',
                                        'defaults' => [
                                            'action' => 'updateSso',
                                        ],
                                    ],
                                ],
                                'doiPayback' => [
                                    'type' => 'literal',
                                    'options' => [
                                        'route' => 'doi-payback',
                                        'defaults' => [
                                            'action' => 'doiPayback',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'pricelayer' => [
                            'type' => Literal::class,
                            'options' => [
                                'route' => 'pricelayer',
                                'defaults' => [
                                    'controller' => 'PricelayerController::class',
                                    'action' => 'ajax',
                                ],
                            ],
                        ],
                        'insurance-sepa' => [
                            'type' => Regex::class,
                            'options' => [
                                'regex' => 'insurance-sepa/(.*?)\.pdf',
                                'defaults' => [
                                    'controller' => 'InsuranceSepaController::class',
                                    'action' => 'generate',
                                ],
                                'spec' => 'insurance-sepa/%%fileName%%.pdf',
                            ],
                        ],
                        'tariff' => [
                            'type' => Literal::class,
                            'options' => [
                                'route' => 'tariff',
                                'defaults' => [
                                    'controller' => 'TariffController::class',
                                    'action' => 'ajax',
                                ],
                            ],
                        ],
                    ],
                ],
                'sso' => [
                    'type' => 'literal',
                    'options' => [
                        'route' => 'sso/',
                        'defaults' => [
                            'controller' => 'SsoController::class',
                        ],
                    ],
                    'may_terminate' => false,
                    'child_routes' => [
                        'action' => [
                            'type' => 'segment',
                            'options' => [
                                'route' => ':action[/]',
                                'constraints' => [
                                    'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                                ],
                            ],
                        ],
                        'closing' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'closing',
                                'defaults' => [
                                    'controller' => 'ClosingController::class',
                                    'action' => 'index',
                                ],
                            ],
                            'priority' => 2,
                        ],
                        'user-exists' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'user-exists',
                                'defaults' => [
                                    'controller' => 'SsoController::class',
                                    'action' => 'userExists',
                                ],
                            ],
                        ],
                        'user-data' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'user-data',
                                'defaults' => [
                                    'action' => 'userData',
                                ],
                            ],
                            'may_terminate' => true,
                            'priority' => 2,
                        ],
                        'best-sso' => [
                            'type' => 'literal',
                            'options' => [
                                'route' => 'best-sso',
                                'defaults' => [
                                    'action' => 'bestSso',
                                ],
                            ],
                            'priority' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
