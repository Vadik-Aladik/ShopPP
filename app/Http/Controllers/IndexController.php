<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\GetResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('product/App');
    }

    public function getProducts()
    {
        $product = Product::with('images')->get();
        return GetResource::collection($product)->resolve();
    }
}
