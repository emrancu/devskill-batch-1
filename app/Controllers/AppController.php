<?php

namespace App\Controllers;


use App\Models\UserModel;
use DevSkill\Supports\Request;

class AppController
{
    public function index()
    {
        $user =  new UserModel();
        $row = $user->where('name',  'Al Emran')
            ->where('email',  'emran@doplac.com')
            ->get();

       die(json_encode( $row));


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