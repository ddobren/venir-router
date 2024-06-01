<?php

declare(strict_types=1);

namespace Src\Routing;

class RouteRegistrar
{
    private static array $routes = [];

    public static function register(string $url, mixed $callback, string $method): void
    {
        // Provjera duplikata
        foreach (self::$routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method) {
                throw new \Exception("Route $method $url already exists.");
            }
        }

        self::$routes[] = [
            'url' => $url,
            'callback' => $callback,
            'method' => $method
        ];
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }
}
