<?php

return [
    'app_name' => 'DevSkill',
    'version' => '1.0.0',
    'providers' => [
     \App\Providers\UserServiceProvider::class
    ],
    'middlewares' => [
      'test' => \App\Middleware\TestMiddleware::class,
      'dev' => \App\Middleware\DevMiddleware::class,
    ],
];