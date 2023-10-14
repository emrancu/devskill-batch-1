<?php

use DevSkill\Application;

include 'vendor/autoload.php';


$application = Application::instance(__DIR__);

$application->start();

