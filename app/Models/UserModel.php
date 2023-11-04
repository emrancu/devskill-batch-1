<?php

namespace App\Models;

use DevSkill\Supports\Model;

class UserModel extends Model
{

    protected string $table = 'users';


    protected array $fields = [
        'name',
        'email',
        'phone',
    ];

}