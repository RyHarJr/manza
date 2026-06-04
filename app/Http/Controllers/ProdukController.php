<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $items = Produk::all();
        return view('produk.index', compact('items'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'KategoriProduk' => 'required|string|max:20',
            'NamaProduk' => 'required|string|max:100',
            'Deskripsi' => 'required|string|max:255',
            'Harga' => 'required|numeric|min:0',
            'Satuan' => 'required|string|max:10',
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('Foto');

        if ($request->hasFile('Foto')) {
            $data['Foto'] = $request->file('Foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {

    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'KategoriProduk' => 'required|string|max:20',
            'NamaProduk' => 'required|string|max:100',
            'Deskripsi' => 'required|string|max:255',
            'Harga' => 'required|numeric|min:0',
            'Satuan' => 'required|string|max:10',
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('Foto');

        if ($request->hasFile('Foto')) {

            if ($produk->Foto) {
                Storage::disk('public')->delete($produk->Foto);
            }
            $data['Foto'] = $request->file('Foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {

        if ($produk->Foto) {
            Storage::disk('public')->delete($produk->Foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus.');
    }
}
