<?php

namespace App\Controllers;


use DevSkill\Supports\Request;

class AppController
{
    public function index()
    {
        $email = request()->input('email');
        return view('welcome', [
            'email' => $email
        ]);
    }



    public function devskill()
    {
        echo "Wow !! devskill";
    }
}