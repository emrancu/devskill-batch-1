<?php

use App\Controllers\AppController;
use DevSkill\Supports\Route;


Route::get('/', [AppController::class, 'index']);
Route::get('/devskill', [AppController::class, 'devskill']);
