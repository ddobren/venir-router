<?php

declare(strict_types=1);

namespace Src\Routing;

class Router
{
    public static function start(): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Ako $requestUri nije string, postaviti ga na prazan string
        if ($requestUri === false || !is_string($requestUri)) {
            $requestUri = '/';
        }

        $normalizedUri = self::normalizeUri($requestUri);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (RouteRegistrar::getRoutes() as $route) {
            $params = [];
            if (self::match($route['url'], $normalizedUri, $params) && $route['method'] === $requestMethod) {
                call_user_func_array($route['callback'], $params);
                return;
            }
        }

        // Ako nema odgovarajuće rute, vratiti 404
        http_response_code(404);
        echo '404 Not Found';
    }

    private static function normalizeUri(string $uri): string
    {
        // Uklanjanje višestrukih uzastopnih kosa crta i trimanje slasha sa početka i kraja
        return '/' . trim(preg_replace('#/+#', '/', $uri), '/');
    }

    private static function match(string $routeUrl, string $requestUri, array &$params): bool
    {
        $routeParts = explode('/', trim($routeUrl, '/'));
        $uriParts = explode('/', trim($requestUri, '/'));

        if (count($routeParts) !== count($uriParts)) {
            return false;
        }

        foreach ($routeParts as $index => $part) {
            if (preg_match('/^\{[a-zA-Z0-9_]+\}$/', $part)) {
                $params[] = $uriParts[$index];
            } elseif ($part !== $uriParts[$index]) {
                return false;
            }
        }

        return true;
    }
}
