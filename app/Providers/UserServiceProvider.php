<?php

namespace App\Providers;

use DevSkill\Abstraction\ProviderInterface;

class UserServiceProvider implements ProviderInterface
{
    public function boot(): void
    {
       // echo "<br> From User Service Provider";
    }

}