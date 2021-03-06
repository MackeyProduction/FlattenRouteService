<?php 
/**
* Autogenerated file by flatten-route-service.
*/
        
return array(
'routes' => array (
  'checkout' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => '/checkout',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'sso' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'sso/',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'SsoController::class',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
      'type' => 'method',
      'options' => 
      array (
        'verb' => 'put',
        'defaults' => 
        array (
          'action' => 'doiPayback',
        ),
      ),
    ),
  ),
  'best-sso' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'best-sso',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'bestSso',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
      'type' => 'method',
      'options' => 
      array (
        'verb' => 'get',
        'defaults' => 
        array (
          'action' => 'bestSso',
        ),
      ),
    ),
    'priority' => 2,
  ),
  'user-data' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'user-data',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'userData',
      ),
    ),
    'may_terminate' => true,
    'child_routes' => 
    array (
    ),
    'priority' => 2,
  ),
  'user-exists' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'user-exists',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'SsoController::class',
        'action' => 'userExists',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'closing' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'closing',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'ClosingController::class',
        'action' => 'index',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
    'priority' => 2,
  ),
  'action' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => ':action',
      'constraints' => 
      array (
        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
      ),
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'process' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => ':leadId/',
      'constraints' => 
      array (
        'leadId' => '\\d+',
      ),
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'tariff' => 
  array (
    'type' => 'Zend\\Router\\Http\\Literal',
    'options' => 
    array (
      'route' => 'tariff',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'TariffController::class',
        'action' => 'ajax',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'insurance-sepa' => 
  array (
    'type' => 'Zend\\Router\\Http\\Regex',
    'options' => 
    array (
      'regex' => 'insurance-sepa/(.*?)\\.pdf',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'InsuranceSepaController::class',
        'action' => 'generate',
      ),
      'spec' => 'insurance-sepa/%%fileName%%.pdf',
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'pricelayer' => 
  array (
    'type' => 'Zend\\Router\\Http\\Literal',
    'options' => 
    array (
      'route' => 'pricelayer',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'PricelayerController::class',
        'action' => 'ajax',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'thankyou' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'thankyou',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'ThankyouController::class',
        'action' => 'index',
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'action_id' => 7,
          'area_id' => 'mf-checkout-thankyou',
        ),
      ),
    ),
    'may_terminate' => true,
    'child_routes' => 
    array (
    ),
  ),
  'doiPayback' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'doi-payback',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'doiPayback',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'updateSsoUser' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'update-sso',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'updateSso',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'transferLead' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'transfer',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'transferLead',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'handinlater' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'handin-later/:leadAccessKey',
      'constraints' => 
      array (
        'leadAccessKey' => '[a-z0-9]{20}',
      ),
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'HandInLaterController::class',
        'action' => 'index',
        'MobileRouteOptions::ROUTE_PARAMETER' => 
        array (
          'route' => 'mobile/content/handinlater',
        ),
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'area_id' => 'mf-handin-later',
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'confirmation' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'confirmation/',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'ConfirmationController::class',
        'action' => 'submit',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'voucher' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'voucher',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'VoucherController::class',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'list' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'list',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'list',
        'Cache\\Options::ROUTE_PARAMETER' => 
        array (
          'public' => false,
          'cache' => false,
          'store' => false,
          'revalidate' => true,
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'delete' => 
  array (
    'type' => 'method',
    'options' => 
    array (
      'verb' => 'DELETE',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'delete',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'overview' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'overview',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'OverviewController::class',
        'action' => 'index',
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'area_id' => 'mf-checkout-overview',
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'additional-information' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'additional-information',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'AdditionalInformation\\IndexController::class',
        'action' => 'index',
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'area_id' => 'mf-checkout-additional-information',
        ),
      ),
    ),
    'may_terminate' => true,
    'child_routes' => 
    array (
    ),
  ),
  'payment' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'payment',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'PaymentController::class',
        'action' => 'index',
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'area_id' => 'mf-checkout-payment',
        ),
      ),
    ),
    'may_terminate' => true,
    'child_routes' => 
    array (
    ),
  ),
  'personal-data' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'personal-data',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'PersonalDataController::class',
        'action' => 'index',
        'GTParameters::ROUTE_CONFIGURATION' => 
        array (
          'area_id' => 'mf-checkout-personal-data',
        ),
      ),
    ),
    'may_terminate' => true,
    'child_routes' => 
    array (
    ),
  ),
  'submit' => 
  array (
    'type' => 'method',
    'options' => 
    array (
      'verb' => 'PUT',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'submit',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'validate' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'validate',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'validate',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'shopping-cart' => 
  array (
    'type' => 'segment',
    'options' => 
    array (
      'route' => 'shopping-cart',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'Details::class',
        'action' => 'deprecated',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'ajax' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'ajax/',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'layout' => 'layout/nowireframe',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'bankname' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'bankname',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'bankname',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'citylist' => 
  array (
    'type' => 'literal',
    'options' => 
    array (
      'route' => 'citylist',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'PersonalDataController::class',
        'action' => 'citylist',
        'Cache\\Options::ROUTE_PARAMETER' => 
        array (
          'cache' => true,
          'public' => true,
          'ttl' => 3600,
          'headers' => 
          array (
            'X-Accel-Expires' => 604800,
          ),
        ),
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'partner' => 
  array (
    'type' => 'Zend\\Router\\Http\\Literal',
    'options' => 
    array (
      'route' => 'partner/',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'PartnerController::class',
        'action' => 'index',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'create' => 
  array (
    'type' => 'Zend\\Router\\Http\\Segment',
    'options' => 
    array (
      'route' => 'enter',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'action' => 'post',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'enter' => 
  array (
    'type' => 'Zend\\Router\\Http\\Method',
    'options' => 
    array (
      'verb' => 'POST',
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'EnterController::class',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
  'error' => 
  array (
    'type' => 'Zend\\Router\\Http\\Segment',
    'options' => 
    array (
      'route' => 'error/:leadId',
      'constraints' => 
      array (
        'leadId' => '\\d+',
      ),
      'defaults' => 
      array (
        'WireframeOptions::ROUTE_PARAMETER' => 
        array (
          'layout' => 'layout/standard_b-slim',
          'hide_breadcrumbs' => true,
        ),
        'RouteOptions::ROUTE_PARAMETER' => 
        array (
          'ppset' => NULL,
        ),
        'controller' => 'ErrorController::class',
        'action' => 'index',
      ),
    ),
    'may_terminate' => false,
    'child_routes' => 
    array (
    ),
  ),
));