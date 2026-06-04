<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Pemasok;
use App\Models\Produk;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $items = Gudang::with(['Pemasok', 'Produk'])->get();
        return view('gudang.index', compact('items'));
    }

    public function create()
    {
        $pemasoks = Pemasok::all();
        $produks = Produk::all();
        return view('gudang.create', compact('pemasoks', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemasok_id' => 'required|exists:pemasoks,id',
            'produk_id' => 'required|exists:produks,id',
            'Jumlah' => 'required|integer|min:0',
            'Harga' => 'required|numeric|min:0',
        ]);

        Gudang::create($request->all());

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil ditambahkan.');
    }

    public function show(Gudang $gudang)
    {

    }

    public function edit(Gudang $gudang)
    {
        $pemasoks = Pemasok::all();
        $produks = Produk::all();
        return view('gudang.edit', compact('gudang', 'pemasoks', 'produks'));
    }

    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'pemasok_id' => 'required|exists:pemasoks,id',
            'produk_id' => 'required|exists:produks,id',
            'Jumlah' => 'required|integer|min:0',
            'Harga' => 'required|numeric|min:0',
        ]);

        $gudang->update($request->all());

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil diperbarui.');
    }

    public function destroy(Gudang $gudang)
    {
        $gudang->delete();

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil dihapus.');
    }
}
