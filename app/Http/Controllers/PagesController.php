<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class PagesController extends Controller
{
    /**
     * Haalt alle data van de categories op om ze te kunnen laten zien in de index.
     */
    public function index()
    {
        // Haalt alle categories data op.
        $categories = Category::all();
        // Stuurt de data weer mee naar de index pagina.
        return view('index')->with('categories', $categories);
    }

    /**
     * Haalt alle producten op om te laten zien in de products view.
     * @param int $id
     */
    public function getProducts($id)
    {
        // Vind alle producten van die category met overeenkomende ID.
        $products = Category::find($id)->showProducts;
        // Stuurt alle product informatie mee naar de products view.
        return view('products')->with('products', $products);
    }

    /**
     * Vind het product om de prijs en beschrijving te laten zien.
     * @param int $id
     */
    public function productOverview($id)
    {
        // Zoekt in de producten naar het ene ID.
        $product = Product::find($id);
        // Stuurt het product mee naar de view om de informatie te tonen.
        return view('product-details')->with('product', $product);
    }
}