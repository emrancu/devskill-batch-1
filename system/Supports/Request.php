<?php

namespace DevSkill\Supports;

class Request
{
    private array $data = [];

    public function __construct() {
      //  $_GET

     //   $_POST

     //   $this->data[$name] = $value

      //  foreach ($_POST as $name => $value){}
    }

    public function all(): array
    {

    }

    public function __get(string $name)
    {
       return $_GET[$name] ?? null;
    }
}