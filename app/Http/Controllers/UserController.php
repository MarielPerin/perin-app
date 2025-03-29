<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserServices $UserService){
        return view('users.index', ['users'=>$UserService->listUsers()]);
    }

    public function first(UserServices $UserService){
        return collect($UserService->listUsers())->first();
    }

    public function show(UserServices $UserService, $id){
        $user = collect($UserService->listUsers())->filter(function($item) use ($id){
            return $item['id'] == $id;
        })->first();

        return $user;   
    }
}
