<?php

use App\Services\UserServices;
use App\Http\Controllers\UserController;
use App\Models\User;
//use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-container', function (Request $request){
    $input= $request->input('key');
    return $input;
});

Route::get('/test-provider', function(UserServices $UserService){
    return $UserService->listUsers();
});

Route::get('/test-controller', [UserController::class, 'index']);

Route::get('/test-facade', function(UserServices $UserService){
    return Response::json($UserService->listUsers());
});