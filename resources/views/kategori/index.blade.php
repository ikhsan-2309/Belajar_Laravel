@extends('layouts.app')
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Categories
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
        class="button text-white bg-theme-1 shadow-md mr-2">Add New Category</a>
      <div class="dropdown relative">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href=""
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
            <a href=""
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
            <a href=""
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="header-footer-modal-preview">
      <form class="modal__content" action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Input Category</h2>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
          <div class="col-span-12 sm:col-span-12">
            <label>Category Name</label>
            <input type="text" class="input w-full border mt-2 flex-1" name="nama_kategori"
              placeholder="Input Category Name">
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
            <th class="whitespace-no-wrap">NO</th>
            <th class="whitespace-no-wrap">CATEGORY NAME</th>
            <th class="text-center whitespace-no-wrap">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategori as $index => $category)
            <tr class="intro-x">
              <td class="w-12">{{ $index + 1 }}</td>
              <td>
                <a href="#" class="font-medium whitespace-no-wrap" data-toggle="modal"
                  data-target="#editModal{{ $category->id }}">
                  {{ $category->nama_kategori }}
                </a>
                <div class="text-gray-600 text-xs whitespace-no-wrap">
                  Jumlah product: {{ $category->produk->count() }}
                </div>
              </td>
              <td class="table-report__action w-56">
                <div class="flex justify-center items-center">
                  <a class="flex items-center mr-3" href="#" data-toggle="modal"
                    data-target="#editModal{{ $category->id }}">
                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                  </a>
                  <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                    data-target="#delete-modal{{ $category->id }}">
                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                  </a>
                </div>
              </td>
            </tr>
            <div class="modal" id="editModal{{ $category->id }}">
              <form class="modal__content" action="{{ route('kategori.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                  <h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                  <div class="col-span-12 sm:col-span-6">
                    <label>Nama Kategori</label>
                    <input type="text" value="{{ $category->nama_kategori }}" class="input w-full border mt-2 flex-1"
                      name="nama_kategori" placeholder="Masukkan Nama Kategori">
                  </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                  <button type="button" data-dismiss="modal"
                    class="button w-20 border text-gray-700 mr-1">Cancel</button>
                  <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal" id="delete-modal{{ $category->id }}">
              <form class="modal__content bg-white" action="{{ route('kategori.destroy', $category->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <div class="p-5 text-center">
                  <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                  <div class="text-3xl mt-5">Are you sure?</div>
                  <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be
                    undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                  <button type="button" data-dismiss="modal"
                    class="button w-24 border text-gray-700 mr-1">Cancel</button>
                  <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                </div>
              </form>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
      {{ $kategori->links() }}
    </div>
    <!-- END: Pagination -->
  </div>
@endsection
