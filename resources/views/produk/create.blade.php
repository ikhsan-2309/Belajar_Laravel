@extends('layouts.app')

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Input Produk
    </h2>
  </div>
  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Form Layout -->
      <div class="intro-y box p-5">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="sm:grid grid-cols-2 gap-2">
            <div class="mt-3">
              <label>Product Name</label>
              <input type="text" class="input w-full border mt-2" name="nama_produk" placeholder="Input text">
            </div>
            <div class="mt-3">
              <label>Category</label>
              <div class="mt-2 sm:max-w-full">
                <select name="id_kategori" data-placeholder="Select a category" class="select2 w-full">
                  @foreach($categories as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="mt-3">
              <label>Stock</label>
              <div class="relative mt-2">
                <input type="number" class="input pr-12 w-full border col-span-4" name="jumlah" placeholder="Stock">
              </div>
            </div>
            <div class="mt-3">
              <label>Price</label>
              <div class="relative mt-2">
                <input type="number" class="input pr-16 w-full border col-span-4" name="harga" placeholder="Price">
              </div>
            </div>
          </div>
          <div class="mt-3">
            <label>Image</label>
            <div class="relative mt-2">
              <input type="file" class="input pr-16 w-full border col-span-4" name="image" placeholder="Price">
            </div>
          </div>
          <div class="mt-3">
            <label>Description</label>
            <div class="mt-2">
              <textarea data-feature="all" class="summernote" name="deskripsi"></textarea>
            </div>
          </div>
          <div class="text-right mt-5">
            <a href="{{ route('produk.index') }}" class="button w-24 border text-gray-700 mr-1">Cancel</a>
            <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
          </div>
        </form>
      </div>
      <!-- END: Form Layout -->
    </div>
  </div>
@endsection
