<?php

namespace DevSkill\Provider;

use DevSkill\Abstraction\ProviderInterface;

class RouteServiceProvider implements ProviderInterface
{
    public function boot(): void
    {
        echo "Application Running...";
    }

}