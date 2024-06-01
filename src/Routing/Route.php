<?php

declare(strict_types=1);

namespace Src\Routing;

class Route
{
    public static function get(string $url, mixed $callback): void
    {
        RouteRegistrar::register($url, $callback, 'GET');
    }

    public static function post(string $url, mixed $callback): void
    {
        RouteRegistrar::register($url, $callback, 'POST');
    }

    public static function put(string $url, mixed $callback): void
    {
        RouteRegistrar::register($url, $callback, 'PUT');
    }

    public static function delete(string $url, mixed $callback): void
    {
        RouteRegistrar::register($url, $callback, 'DELETE');
    }
}
