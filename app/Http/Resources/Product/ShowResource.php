<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return [
        //     'title' => $this->title,
        //     'price' => $this->price,
        //     'grade' => $this->grade,
        //     'img' => url('storage/'. $this->images)
        // ];

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'img' => $this->images->map(function ($image) {
                return [
                    'url' => url('storage/'. $image['url']), // Предполагается, что у вас есть поле 'url' в модели изображения
                ];
            }),
        ];
    }
}
