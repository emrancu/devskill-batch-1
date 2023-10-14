<?php

namespace DevSkill\Providers;

use DevSkill\Abstraction\ProviderInterface;

class RouteServiceProvider implements ProviderInterface
{
    public function boot(): void
    {
        echo "Application Running...";
    }

}