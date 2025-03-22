<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\OrderRequest;
use App\Http\Resources\Product\BasketResource;
use App\Http\Resources\Product\GetResource;
use App\Http\Resources\Product\ShowResource;
use App\Models\Basket;
use App\Models\Favorite;
use App\Models\ListOrder;
use App\Models\Order;
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
        $favorite = Favorite::where('id_product',$id)->where('id_user', auth()->id())->get();
        return Inertia::render('product/Show', ['product' => $resource, 'basket' => $basket, 'favorite' => $favorite]);
    }

    public function addBasket($id)
    {
        if(Basket::where('id_product',$id)->where('id_user', auth()->id())->count()){
            return response()->json([
                'user' => auth()->check(),
                'inBasket' => false
            ]);
        }
        else{
            Basket::create([
                'id_user' => auth()->id(),
                'id_product' => $id
            ]);
    
            return response()->json([
                'user' => auth()->check(),
                'inBasket' => true,
            ]);
        }
    }

    public function basket()
    {
        // $user = auth()->id();
        // $favorite = Favorite::where('id_user',$user)->orderBy('id_product', 'asc')->get();
        // $basket = Basket::with('info')->with('img')->where('id_user', $user)->get();
        // return BasketResource::collection($basket)->resolve();
        $user = auth()->id();
        $favorite = Favorite::where('id_user',$user)->orderBy('id_product', 'asc')->get();
        $basket = Basket::with('info')->with('img')->where('id_user', $user)->get();
        $collection =  BasketResource::collection($basket)->resolve();
        return response()->json([
            "products" => $collection,
            "favorite" => $favorite
        ]);
    }

    public function delete($id)
    {
        $user = auth()->id();
        Basket::where('id_user',$user)->where('id_product',$id)->delete();
    }

    public function favorite($id)
    {
        if(Favorite::where('id_product',$id)->where('id_user', auth()->id())->count()){
            return response()->json([
                'favorite_added' => true
            ]);
        }
        else{
            $user = auth()->id();
            Favorite::create([
                'id_user' => $user,
                'id_product' => $id
            ]);
            return response()->json([
                'favorite_added' => true
            ]);
        }
    }

    public function remove($id)
    {
            $user = auth()->id();
            Favorite::where('id_user', $user)->where('id_product', $id)->delete();
            return response()->json([
                'favorite_added' => false
            ]);
    }

    public function order()
    {
        $list=[];
        $user = auth()->id();
        $basket = Basket::where('id_user',$user)->get();
        $favorite = Favorite::where('id_user',$user)->orderBy('id_product', 'asc')->get();
        $collection = BasketResource::collection($basket)->resolve();

        return Inertia::render('product/Order', [
            'basketUser_inOrder' => $collection,
            'favorite' => $favorite,
        ]);
    }

    public function placing(Request $request)
    {
        $data = $request->all();

        $newOrder = ListOrder::create([
            'id_user' => auth()->id(),
            'status' => 'on the way'
        ]);

        foreach($data as $elem){
            Order::create([
                'id_order' => $newOrder->id,
                'id_product' => $elem['id_product'],
                'quantity' => $elem['quantity']
            ]);
        }

        Basket::where('id_user', auth()->id())->delete();

        return response()->json([
            'comfirm' => True,
            'id_order' => $newOrder->id
        ]);
    }

    public function personal()
    {
        $orders = ListOrder::with(['orders.product'])->where('id_user', auth()->id())->get();

        $favorite = Favorite::with('product')->with(['product.images'])->where('id_user', auth()->id())->get();

        return Inertia::render('Users/Personal', [
            'orders' => $orders,
            'user' => auth()->user(),
            'favorite' => $favorite,
            // 'favorite' => GetResource::collection($favorite['product'])->resolve(),
        ]);
    }
}
