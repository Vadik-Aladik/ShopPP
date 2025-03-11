<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function basket()
    {
        return $this->hasOne(Product::class, 'id_product', 'id');
    }
}
