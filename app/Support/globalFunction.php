<?php


use DevSkill\Application;
use DevSkill\Supports\Request;

function app(): Application
{
   return Application::instance();
}


function request(): Request
{
   return Request::instance();
}

function loadConfig($path)
{
   return include app()->path('config/'.$path);
}

function path($path = null)
{
   return app()->path($path);
}


function config($key, $default = null)
{
    $path = '';
    $value = null;

    foreach (explode('.', $key) as $key){

        if($value){
            $value = $value[$key] ?? null;
        }

        if(!$value){
            $path .= '/'.$key;
        }

        if(!$value && is_file(path('config'.$path.'.php'))){
            $value = loadConfig($path.'.php');
        }
    }

    return $value ?? $default;
}

function view($path, $data = [])
{
    extract($data);

    return include path('resources/views/'.$path.'.php');
}


