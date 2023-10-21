<?php

namespace DevSkill;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Providers\RouteServiceProvider;
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