<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $totalTransaksi = DB::table('transaksis')->count();
        $totalPendapatan = DB::table('transaksis')->sum('TotalHarga');
        $totalProduk = DB::table('produks')->count();
        $totalPelanggan = DB::table('pelanggans')->count();
        $totalKaryawan = DB::table('karyawans')->count();

        $produkTerbaru = DB::table('produks')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('landing', compact(
            'totalTransaksi',
            'totalPendapatan',
            'totalProduk',
            'totalPelanggan',
            'totalKaryawan',
            'produkTerbaru'
        ));
    }
}
