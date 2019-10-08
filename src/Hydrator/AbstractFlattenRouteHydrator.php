<?php
namespace ZendFlattenRoute\Hydrator;

use InvalidArgumentException;
use ZendFlattenRoute\Model\FlattenChildRoute;
use ZendFlattenRoute\Model\FlattenRoute;
use ZendFlattenRoute\Hydrator\Helper\RouteStackInterface;

class AbstractFlattenRouteHydrator
{

    /**
     * @var array $childRoutes
     */
    private $childRoutes;

    /**
     * @var RouteStackInterface $routeStack
     */
    protected $routeStack;

    /**
     * AbstractFlattenRouteHydrator constructor.
     * @param RouteStackInterface $routeStack
     */
    public function __construct(RouteStackInterface $routeStack)
    {
        $this->routeStack = $routeStack;
    }

    /**
     * @param array $routes
     * @return RouteStackInterface
     */
    protected function getFlattenRouteStack(array $routes): RouteStackInterface
    {
        // flattening routes
        if ($this->routeStack->getRoutes() === null) {
            $this->flatRoutes($routes);
        }

        return $this->routeStack;
    }

    private function flatRoutes(array $routes)
    {
        if (empty($routes['routes']) || !is_array($routes['routes'])) {
            throw new InvalidArgumentException("No routes found.");
        }

        foreach ($routes['routes'] as $key => $route) {
            if (is_array($route)) {
                $route['child_routes'] = $this->flatChildRoutes($route['child_routes']);
                $this->routeStack->addRoute($key, new FlattenRoute($route));
            }
        }
    }

    private function flatChildRoutes(array $childRoutes): array
    {
        if (!is_array($childRoutes)) {
            return [$childRoutes];
        }

        foreach ($childRoutes as $key => $cRoute) {
            if (!array_key_exists('child_routes', $cRoute)) {
                $cRoute['child_routes'] = [];
            }

            if (!empty($cRoute['child_routes'])) {
                $cRoute['child_routes'] = $this->flatChildRoutes($cRoute['child_routes']);
            }

            $this->routeStack->addRoute($key, new FlattenRoute($cRoute));
        }

        return [];
    }

    // @TODO: Methode löschen und in passenden hydrator hinzufügen.
    public function addOptions($routeName, $options = [])
    {
        $this->childRoutes[$routeName] = array_merge($this->childRoutes[$routeName], $options);
    }
}
