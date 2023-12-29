<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // KategoriController.php
    protected $breadcrumbs;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['link' => url('/'), 'name' => 'Home'],
            ['link' => route('kategori.index'), 'name' => 'Category'],
        ];
    }
    

    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $kategori = Kategori::orderBy('id', 'asc')->paginate(5);
        $pesan = $kategori->isEmpty() ? 'Tidak ada kategori yang tersedia saat ini.' : null;
    
        return view('kategori.index', compact('kategori', 'breadcrumbs', 'pesan'));
    }
    
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil disimpan');
    }



    public function show(Kategori $Kategori)
    {
        return view('kategori.show', compact('Kategori'));
    }

    // KategoriController.php

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully');
    }


    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori deleted successfully');
    }
}
