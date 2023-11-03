<?php

namespace DevSkill\Abstraction;

use DevSkill\Supports\Request;

abstract class MiddlewareContract
{
    public Request $request;

    public function __construct() {
      $this->request = request();
    }

    public abstract function handle();

}