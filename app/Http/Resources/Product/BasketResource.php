<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->info[0]['title'],
            'price' => $this->info[0]['price'],
            'img' => url('storage/', $this->img[0]->url),
        ];
        // return [
        //     'id' => $this->id,
        //     'product' => $this->info 
        //     //[
        //     //     'id' => $this->product->id,
        //     //     'title' => $this->product->title,
        //     //     'price' => $this->product->price,
        //     //     // 'img' => url('storage/'. $this->product->images[0]->url) // если у вас есть изображения
        //     // ],
        //     // Другие поля, если необходимо
        // ];
    }
}
