<?php

// ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;


class ProductController extends Controller
{
    // KategoriController.php
    protected $breadcrumbs;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['link' => url('/'), 'name' => 'Home'],
            ['link' => route('produk.index'), 'name' => 'Products'],
        ];
    }


    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $products = Product::orderBy('id', 'asc')->paginate(5);
        $pesan = $products->isEmpty() ? 'Tidak ada kategori yang tersedia saat ini.' : null;

        return view('produk.index', compact('products', 'breadcrumbs', 'pesan'));
    }

    public function create()
    {
        $breadcrumbs = $this->breadcrumbs;
        $categories = Kategori::all();
        return view('produk.create', compact('categories','breadcrumbs'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_produk'     => 'required|min:5',
            'id_kategori'   => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi'     => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Product::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'id_kategori'   => $request->id_kategori,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('produk.index')->with('success', 'Product created successfully');
    }

    // public function show(Product $product)
    // {
    //     return view('produk.show', compact('product'));
    // }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Kategori::all();
        return view('produk.edit', compact('product', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'nama_produk'     => 'required|min:5',
            'id_kategori'   => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi'     => 'required'
        ]);

        //get post by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/' . $product->image);

            //update post with new image
            $product->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'id_kategori'   => $request->id_kategori,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'deskripsi'     => $request->deskripsi
            ]);
        } else {
            //update post without image
            $product->update([
                'nama_produk'     => $request->nama_produk,
                'id_kategori'   => $request->id_kategori,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'deskripsi'     => $request->deskripsi
            ]);
        }
        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/posts/' . $product->image);
        $product->delete();
        return redirect()->route('produk.index');
    }
}
