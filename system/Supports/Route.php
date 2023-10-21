<?php


namespace DevSkill\Supports;

/**
 * @method static void get($path, $callback) Description of the method.
 */
class Route
{

//    public function __call(string $name, array $arguments)
//    {
//      $callback = $arguments[1];
//      $controller = new $callback[0]();
//
//     $controller->{$callback[1]}();
//
//    }


    public static function __callStatic(string $name, array $arguments): void
    {
      $callback = $arguments[1];
      $controller = new $callback[0]();

     $controller->{$callback[1]}();

    }


}