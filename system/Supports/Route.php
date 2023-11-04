<?php


namespace DevSkill\Supports;

/**
 * @method static Route get($path, $callback, $middleware = null) Description of the method.
 * @method static Route post($path, $callback) Description of the method.
 */
class Route
{
    public static array $routes = [];

    public static function __callStatic(string $name, array $arguments)
    {
        $middleware = $arguments[2] ?? null;

        self::$routes[$arguments[0]][$name] =  [
            'middleware' => $middleware,
            'callback' => $arguments[1]
        ];

    }
    
}