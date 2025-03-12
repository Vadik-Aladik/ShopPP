<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function info()
    {
        return $this->hasMany(Product::class, 'id', 'id_product');
    }

    public function img()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id_product');
    }
}
