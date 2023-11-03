<?php

namespace App\Middleware;

use DevSkill\Abstraction\MiddlewareContract;
use DevSkill\Supports\Request;

class TestMiddleware extends MiddlewareContract
{
    public function handle(): void
    {
       echo ("No Access");
    }

}