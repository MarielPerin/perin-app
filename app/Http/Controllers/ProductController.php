<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\TaskService;

class ProductController extends Controller
{
    public function __construct(
        //dependency injection
        protected TaskService $taskService
    ){}

    /**display a listing of the resource */

    public function index(ProductService $productService){
        $newProduct=[
            'id' => 1,
            'name' => 'Orange',
            'category' => 'Fruits'
        ];
        $productService->insert($newProduct);
        $this->taskService->add('Add to cart');
        $this->taskService->add('Checkout');

        $data = [
            'products' => $productService->listProducts(),
            'tasks' => $this->taskService->getAlltasks()
        ];
        return view('products.index', $data);
    }

    public function show(ProductService $productService, $id){
        $product = collect($productService->listProducts())->filter(function($item) use ($id){
            return $item['id'] == $id;
        })->first();

        return $product; 
    }
}
