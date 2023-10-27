<?php

namespace App\Controllers;


use DevSkill\Supports\Request;

class AppController
{
    public function index()
    {
        $request = new Request();
        echo  $request->email ;

        echo "Wow !! Our route system work";
    }



    public function devskill()
    {
        echo "Wow !! devskill";
    }
}