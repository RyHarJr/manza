<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $items = Transaksi::with('Karyawan')->get();
        return view('transaksi.index', compact('items'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('transaksi.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'TglTransaksi' => 'required|date',
            'TotalHarga' => 'required|numeric|min:0',
            'MetodePembayaran' => 'required|string|max:10',
            'StatusPembayaran' => 'required|in:sukses,proses,gagal',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {

    }

    public function edit(Transaksi $transaksi)
    {
        $karyawans = Karyawan::all();
        return view('transaksi.edit', compact('transaksi', 'karyawans'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'TglTransaksi' => 'required|date',
            'TotalHarga' => 'required|numeric|min:0',
            'MetodePembayaran' => 'required|string|max:10',
            'StatusPembayaran' => 'required|in:sukses,proses,gagal',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil dihapus.');
    }
}
