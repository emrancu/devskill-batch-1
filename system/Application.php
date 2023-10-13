<?php

namespace DevSkill;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Provider\RouteServiceProvider;
use Exception;

class Application
{

    protected array $providers = [
        RouteServiceProvider::class
    ];
    private string $rootPath;

    public function __construct($root)
    {
        $this->rootPath = $root;
    }


    public function boot(): void
    {
        try {
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