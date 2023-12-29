<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kategori  extends Model
{
    public function produk()
    {
        return $this->hasMany(Product::class, 'id_kategori');
    }
    protected $fillable = ['nama_kategori'];

}

