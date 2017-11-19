<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $itemperpage = $request->input('item_per_page', 3);
        $products = Product::with('producer')->paginate($itemperpage);
        return response()->json($products);
    }
}
