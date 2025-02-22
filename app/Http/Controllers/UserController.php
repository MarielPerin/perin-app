<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserServices $UserService){
        return $UserService->listUsers();
    }
}
