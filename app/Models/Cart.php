<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Cart.php
class Cart extends Model
{
    protected $fillable = ['product_id', 'quantity','subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

