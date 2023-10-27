<?php


use DevSkill\Application;

function app(): Application
{
   return Application::instance();
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

