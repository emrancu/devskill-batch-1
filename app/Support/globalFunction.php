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


//function config()
//{
//
//}
//
//
//config('basic.app.version');
