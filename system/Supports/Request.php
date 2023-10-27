<?php

namespace DevSkill\Supports;

class Request
{
    private array $data = [];

    public function __construct() {
      $this->setGetData();
      $this->setPostData();
    }

    private function setGetData(): void
    {
        foreach ($_GET ?? [] as $key => $value){
            $this->data[$key] =  $value;
        }
    }

    private function setPostData(): void
    {
        foreach ($_POST ?? [] as $key => $value){
            $this->data[$key] =  $value;
        }
    }

    public function all(): array
    {
        return $this->data;
    }

    public function __get(string $name)
    {
       return $_GET[$name] ?? null;
    }
}