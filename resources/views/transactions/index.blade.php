{{-- transactions/index.blade.php --}}
<h2>Transaction History</h2>
@foreach ($transactions as $transaction)
    <p>User: {{ $transaction->user->name }}</p>
    @foreach ($transaction->carts as $cart)
        <p>{{ $cart->product->name }} - Quantity: {{ $cart->quantity }}</p>
    @endforeach
@endforeach
