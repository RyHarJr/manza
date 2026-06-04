<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $items = DetailTransaksi::with(['Produk', 'Transaksi'])->get();
        return view('detail-transaksi.index', compact('items'));
    }

    public function create()
    {
        $produks = Produk::all();
        $transaksis = Transaksi::all();
        return view('detail-transaksi.create', compact('produks', 'transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $produk->Harga,
            'subtotal' => $produk->Harga * $request->jumlah,
        ]);

        return redirect()->route('detail-transaksi.index')->with('success', 'Data detail transaksi berhasil ditambahkan.');
    }

    public function show(DetailTransaksi $detailTransaksi)
    {

    }

    public function edit(DetailTransaksi $detailTransaksi)
    {
        $produks = Produk::all();
        $transaksis = Transaksi::all();
        return view('detail-transaksi.edit', compact('detailTransaksi', 'produks', 'transaksis'));
    }

    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        $detailTransaksi->update([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $produk->Harga,
            'subtotal' => $produk->Harga * $request->jumlah,
        ]);

        return redirect()->route('detail-transaksi.index')->with('success', 'Data detail transaksi berhasil diperbarui.');
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();

        return redirect()->route('detail-transaksi.index')->with('success', 'Data detail transaksi berhasil dihapus.');
    }
}
