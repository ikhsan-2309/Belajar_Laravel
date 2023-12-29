@extends('layouts.app')

@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Products
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="{{ route('produk.create') }}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Product</a>
      <!-- Tambahkan dropdown atau fitur lainnya jika diperlukan -->
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
            <th class="border-b-2 text-center whitespace-no-wrap">IMAGES</th>
            <th class="border-b-2 text-center whitespace-no-wrap">STOCK</th>
            <th class="border-b-2 text-center whitespace-no-wrap">PRICE</th>
            <th class="border-b-2 text-center whitespace-no-wrap">DESCRIPTION</th>
            <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $index => $product)
            <tr class="intro-x">
              <td class="w-10">{{ $index + 1 }}</td>
              <td class="w-40">
                <a href="{{ route('produk.edit', $product->id) }}" class="font-medium whitespace-no-wrap">
                  {{ $product->nama_produk }}
                </a>
                <div class="text-gray-600 text-xs whitespace-no-wrap">
                  @if ($product->kategori)
                    Category: {{ $product->kategori->nama_kategori }}
                  @else
                    No Category
                  @endif
                </div>
              </td>

              <td class="text-center border-b">
                <div class="flex sm:justify-center">
                  <div class="intro-x w-10 h-10 image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                      src="{{ asset('storage/posts/' . $product->image) }}">
                  </div>
                </div>
              </td>
              <td class="text-center w-12">{{ $product->jumlah }}</td>
              <td class="text-center w-32">IDR {{ number_format($product->harga, 0, ',', '.') }}</td>
              <td class="text-center w-64">{{ Str::limit(html_entity_decode(strip_tags($product->deskripsi)), 50) }}</td>
              <form onsubmit="return confirm('Apakah Anda Yakin akan menghapus produk ini ?');" action="{{ route('produk.destroy', $product->id) }}" method="POST">
                <td class="table-report__action w-40">
                  <div class="flex justify-center items-center">
                    <a class="flex items-center mr-3" href="{{ route('produk.edit', $product->id) }}">
                      <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit
                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="flex items-center text-theme-6" type="submit">
                      <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                    </button>
                  </div>
                </td>
              </form>
            </tr>
            <!-- Tambahkan modals untuk edit dan delete jika diperlukan -->
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
      {{ $products->links() }}
    </div>
    <!-- END: Pagination -->
  </div>
@endsection
