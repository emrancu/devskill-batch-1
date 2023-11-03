<?php

namespace DevSkill\Supports;

class Request
{
    private array $data = [];

    private static Request|null $instance = null;

     public static function instance(): Request
     {
       if(static::$instance) {
           return static::$instance;
       }

       static::$instance = new  Request();

       return  static::$instance;
     }

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

    public function input(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function __get(string $name)
    {
       return $this->data[$name] ?? null;
    }
}