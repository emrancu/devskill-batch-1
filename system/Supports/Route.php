<?php


namespace DevSkill\Supports;

/**
 * @method static void get($path, $callback) Description of the method.
 */
class Route
{
    public static array $routes = [];

    public static function __callStatic(string $name, array $arguments)
    {
        self::$routes[$arguments[0]] =  $arguments[1];
    }

}