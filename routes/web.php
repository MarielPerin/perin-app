<?php

use App\Services\UserServices;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use App\Services\ProductService;
//use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

//WELCOME
Route::get('/', function () {
    return view('welcome', ['name' => 'perin-app']);
});

//USERS
Route::get('/users', [UserController::class, 'index']);

//PRODUCTS
Route::resource('products', ProductController::class);

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

//routing-> parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . ", Comment: " . $comment;
});

Route::get('post/{id}', function (string $id) {
    return "Post ID: " . $id;
})->where('id', '[0-9]+'); //limit sa int 0-9, mag eerror pag may ibang character na input

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('query', '.*');//pwede lahat ng characters

//Named Route or Route Alias
Route::get('/test/route', function () {
    return route('test-route');
})->name('test-route');

//Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });
    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

//Route -> controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

//csrf
Route::get('/token', function (Request $request) {
    return view ('token');
});

Route::post('/token', function (Request $request) {
    return $request-> all();
});

// //Controller -> Middleware
// Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');

// //Resource
// Route::resource('products', ProductController::class);

//view with data
Route::get('/product-list', function(ProductService $productService){
    $data['products']= $productService->listProducts();
    return view('Products.list', $data);
});