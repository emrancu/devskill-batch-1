<?php

namespace DevSkill;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Providers\RouteServiceProvider;
use DevSkill\Supports\Route;
use Exception;

class Application
{
    public static Application|null $instance = null;

    public static function instance(string $path = null): Application
    {
        if(!static::$instance){
            static::$instance = new self($path);
        }

        return  static::$instance;
    }


    protected array $providers = [
        RouteServiceProvider::class
    ];

    private string $rootPath;

    public function __construct($root)
    {
        $this->rootPath = $root;
    }


    public function start(): void
    {
        try {

           $this->providers = array_merge($this->providers, config('app.providers', []));

            foreach ($this->providers as $provider) {

                $providerObject = new $provider();

                if ($providerObject instanceof ProviderInterface) {
                    $providerObject->boot();
                } else {
                    throw new Exception($provider." does not implement ".ProviderInterface::class);
                }

            }

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }


        $this->initRoute();
    }

    private function initRoute()
    {
        try {

        $path = strtok($_SERVER["REQUEST_URI"], '?');
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

        $routes = Route::$routes;

        if(empty($routes[$path])){
            throw new Exception("Route not found");
        }

        if(! ($routes[$path][$requestMethod] ?? false)){
            throw new Exception("Method not found");
        }

        $callback = $routes[$path][$requestMethod] ?? [];

        $controller = new $callback[0]();

        $controller->{$callback[1]}();

        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function rootPath(): string
    {
        return $this->rootPath;
    }

    public function path($path = null): string
    {
        return $this->rootPath.($path ? DIRECTORY_SEPARATOR.$path : '');
    }

}