<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    protected $fillable = [
        'image',
        'nama_produk',
        'id_kategori',
        'jumlah',
        'harga',
        'deskripsi'
    ];
}

