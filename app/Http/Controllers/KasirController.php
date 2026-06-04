<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gudang;

class KasirController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        $pelanggans = Pelanggan::all();
        $karyawans = Karyawan::all();
        return view('kasir.index', compact('produks', 'pelanggans', 'karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'nullable|exists:pelanggans,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'MetodePembayaran' => 'required|string|max:10',
            'items' => 'required|array|min:1',
            'items.*.produk_id' => 'required|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {

            $totalHarga = 0;

            foreach ($request->items as $item) {
                $produk = Produk::find($item['produk_id']);
                if ($produk->total_stok < $item['jumlah']) {
                    throw new \Exception("Stok {$produk->NamaProduk} tidak cukup. Tersisa: {$produk->total_stok}");
                }
                $totalHarga += $produk->Harga * $item['jumlah'];
            }

            $transaksi = Transaksi::create([
                'pelanggan_id' => $request->pelanggan_id,
                'karyawan_id' => $request->karyawan_id,
                'TglTransaksi' => now()->toDateTimeString(),
                'TotalHarga' => $totalHarga,
                'MetodePembayaran' => $request->MetodePembayaran,
                'StatusPembayaran' => 'sukses',
            ]);

            foreach ($request->items as $item) {
                $produk = Produk::find($item['produk_id']);
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $item['produk_id'],
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $produk->Harga,
                    'subtotal' => $produk->Harga * $item['jumlah'],
                ]);

                $sisaPotong = $item['jumlah'];
                $stokGudang = Gudang::where('produk_id', $item['produk_id'])
                                                ->where('Jumlah', '>', 0)
                                                ->orderBy('id', 'asc')
                                                ->get();
                foreach($stokGudang as $gudang) {
                    if ($sisaPotong <= 0) break;
                    if ($gudang->Jumlah >= $sisaPotong) {
                        $gudang->update(['Jumlah' => $gudang->Jumlah - $sisaPotong]);
                        $sisaPotong = 0;
                    } else {
                        $sisaPotong -= $gudang->Jumlah;
                        $gudang->update(['Jumlah' => 0]);
                    }
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil!', 'transaksi_id' => $transaksi->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Gagal memproses transaksi: ' . $e->getMessage()], 500);
        }
    }
}
