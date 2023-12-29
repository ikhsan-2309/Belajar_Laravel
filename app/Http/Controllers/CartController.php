<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

// CartController.php
class CartController extends Controller
{
    protected $breadcrumbs;
    protected $subtotal = 0;
    protected $total = 0;
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
        $products = Product::all();
        $carts = Cart::with('product')->get();
        return view('carts.index', compact('carts','products','breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Dapatkan produk dari ID
        $product = Product::findOrFail($request->product_id);

    
        // Tambahkan produk ke keranjang
        Cart::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'subtotal' => $product->harga * $request->quantity,
        ]);

        return redirect()->route('carts.index')->with('success', 'Product added to cart successfully.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Product removed from cart successfully.');
    }
}

