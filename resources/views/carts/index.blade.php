@extends('layouts.app')

@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Shopping Cart
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
      class="button text-white bg-theme-1 shadow-md mr-2">Back to Products</a>
    </div>
    <div class="modal" id="header-footer-modal-preview">
      <form class="modal__content" action="{{ route('carts.store') }}" method="POST">
        @csrf
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Add Product</h2>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
          <div class="col-span-12 sm:col-span-12">
            <label>Product Name</label>
            <select name="product_id" data-placeholder="Select a category" class="select2 w-full">
              @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-span-12 sm:col-span-12">
            <label>Quantity</label>
            <input type="number" class="input w-full border mt-2 flex-1" name="quantity" placeholder="Input Quantity">
          </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
          <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
          <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
        </div>
      </form>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
      <table class="table table-report -mt-2">
        <thead>
          <tr>
            <th class="border-b-2 text-center whitespace-no-wrap">NO</th>
            <th class="border-b-2 text-center whitespace-no-wrap">PRODUCT NAME</th>
            <th class="border-b-2 text-center whitespace-no-wrap">QUANTITY</th>
            <th class="border-b-2 text-center whitespace-no-wrap">PRICE</th>
            <th class="border-b-2 text-center whitespace-no-wrap">SUBTOTAL</th>
            <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($carts as $index => $cart)
            <tr class="intro-x">
              <td class="w-10">{{ $index + 1 }}</td>
              <td class="w-40">
                <a href="{{ route('produk.show', $cart->product->id) }}" class="font-medium whitespace-no-wrap">
                  {{ $cart->product->nama_produk }}
                </a>
              </td>
              <td class="text-center w-12">{{ $cart->quantity }}</td>
              <td class="text-center w-12">{{ $cart->product->harga }}</td>
              <td class="text-center w-12">{{ $cart->subtotal }}</td>
              <td class="table-report__action w-40">
                <div class="flex justify-center items-center">
                  <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="flex items-center text-theme-6" type="submit" onclick="return confirm('Are you sure you want to remove this product from the cart?')">
                      <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Remove
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center">No items in the cart.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Checkout -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
      @if ($carts->isNotEmpty())
        <form action="{{ route('checkout') }}" method="post">
          @csrf
          <button type="submit" class="button bg-theme-1 text-white">Checkout</button>
        </form>
      @endif
    </div>
    <!-- END: Checkout -->
  </div>
@endsection
