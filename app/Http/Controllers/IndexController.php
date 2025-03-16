<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\BasketResource;
use App\Http\Resources\Product\GetResource;
use App\Http\Resources\Product\ShowResource;
use App\Models\Basket;
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

    public function show($id)
    {
        $data = Product::with('images')->where('id', $id)->get();
        $resource = ShowResource::collection($data)->resolve();
        $basket = Basket::where('id_product',$id)->where('id_user', auth()->id())->get();
        return Inertia::render('product/Show', ['product' => $resource, 'basket' => $basket]);
    }

    public function addBasket($id)
    {
        if(Basket::where('id_product',$id)->where('id_user', auth()->id())->count()){
            return response()->json([
                'inBasket' => true
            ]);
        }
        else{
            Basket::create([
                'id_user' => auth()->id(),
                'id_product' => $id
            ]);
    
            return response()->json([
                'inBasket' => false,
            ]);
        }
    }

    public function basket()
    {
        $user = auth()->id();
        $basket = Basket::with('info')->with('img')->where('id_user', $user)->get();
        return BasketResource::collection($basket)->resolve();
    }

    public function delete($id)
    {
        $user = auth()->id();
        Basket::where('id_user',$user)->where('id_product',$id)->delete();
    }

    public function order()
    {
        $user = auth()->id();
        $basket = Basket::where('id_user',$user)->get();
        $collection = BasketResource::collection($basket)->resolve();
        return Inertia::render('product/Order', [
            'basketUser_inOrder' => $collection,
        ]);
    }

    public function placing()
    {
        
    }
}
