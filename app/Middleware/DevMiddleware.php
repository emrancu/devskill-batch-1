<?php

namespace App\Middleware;

use DevSkill\Abstraction\MiddlewareContract;
use DevSkill\Supports\Request;

class DevMiddleware extends MiddlewareContract
{
    public function handle(): void
    {
       die("No Access from Dev");
    }

}