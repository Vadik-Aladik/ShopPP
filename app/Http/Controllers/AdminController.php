<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function add()
    {
        return Inertia::render('Admin/Add');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if(count($data['images']) != 4){
            return response()->json([
                'created'=>false
            ]);
        }
        $product = Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'grade' => '0.0'
        ]);
        for($i = 0; $i < count($data['images']); $i++){
            $path = Storage::disk('public')->put('/images', $data['images'][$i]);
            ProductImage::create([
                'product_id' => $product->id,
                'url' => $path
            ]);
        }
        return response()->json([
            'created' => true
        ]);
    }
}
