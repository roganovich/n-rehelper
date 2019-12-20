<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Model
{
    protected $login;
    protected $password;


    public function login(Array $credentials){
        $user = new User();
        if($user->fetchUserByCredentials($credentials)){
            Auth::login($user,true);
            return true;
        }
    }
}
