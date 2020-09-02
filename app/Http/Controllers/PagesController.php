<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index')->with('categories', $categories);
    }

    // public function categories()
    // {
    //     $products = Product::find();

    //     return view('products')->with('products', $products);
    // }

    public function getProducts($id)
    {
        $products = Category::find($id)->showProducts;
        return view('products')->with('products', $products);
    }
}