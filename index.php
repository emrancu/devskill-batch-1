<?php


use DevSkill\Application;

include 'vendor/autoload.php';


$application = new Application(__DIR__);

$application->boot();
