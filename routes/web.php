<?php

use App\Controllers\AppController;
use DevSkill\Supports\Route;



Route::get('/', [AppController::class, 'index'], ['test', 'dev']);


Route::post('/devskill', [AppController::class, 'devskill']);

