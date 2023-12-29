<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;

// TransactionController.php
class TransactionController extends Controller
{
    public function checkout()
    {
        $user = auth()->user();
        $carts = Cart::with('product')->get();

        $transaction = Transaction::create(['user_id' => $user->id]);

        foreach ($carts as $cart) {
            $transaction->carts()->create([
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);
        }

        // Clear the cart after checkout
        Cart::truncate();

        return redirect()->route('transactions.index')->with('success', 'Checkout successful.');
    }

    public function index()
    {
        $transactions = Transaction::with('carts.product')->get();
        return view('transactions.index', compact('transactions'));
    }
}

