<?php

namespace DevSkill\Providers;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Supports\Route;

class RouteServiceProvider implements ProviderInterface
{
    public function boot(): void
    {

        include app()->path('routes/web.php');

    }

}