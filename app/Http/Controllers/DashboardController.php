<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function monthGroupSql(string $column): string
    {
        return DB::getDriverName() === 'sqlite'
            ? "strftime('%Y-%m', $column)"
            : "DATE_FORMAT($column, '%Y-%m')";
    }

    public function index()
    {

        $totalModal = DB::select("SELECT SUM(Jumlah * Harga) as total FROM gudangs")[0]->total ?? 0;

        $queryKeuntungan = "
            SELECT SUM(d.jumlah * (d.harga_satuan - COALESCE((
                SELECT AVG(Harga) FROM gudangs WHERE produk_id = d.produk_id
            ), 0))) as total
            FROM detail_transaksis d
        ";
        $totalKeuntungan = DB::select($queryKeuntungan)[0]->total ?? 0;

        $produkPerKategori = DB::select("SELECT KategoriProduk as kategori, COUNT(*) as total FROM produks GROUP BY KategoriProduk");

        $monthGroup = $this->monthGroupSql('TglTransaksi');
        $transaksiPerBulan = DB::select("SELECT $monthGroup as bulan, COUNT(*) as total, SUM(TotalHarga) as revenue FROM transaksis GROUP BY $monthGroup ORDER BY bulan");

        $statusPembayaran = DB::select("SELECT StatusPembayaran as status, COUNT(*) as total FROM transaksis GROUP BY StatusPembayaran");

        $stokPerProduk = DB::select("SELECT p.NamaProduk as nama, SUM(g.Jumlah) as total_stok FROM gudangs g JOIN produks p ON g.produk_id = p.id GROUP BY g.produk_id, p.NamaProduk ORDER BY total_stok DESC LIMIT 10");

        $topPelanggan = DB::select("SELECT p.NamaPelanggan, COUNT(t.id) as total_trx, SUM(t.TotalHarga) as total_belanja FROM transaksis t JOIN pelanggans p ON t.pelanggan_id = p.id GROUP BY t.pelanggan_id, p.NamaPelanggan ORDER BY total_belanja DESC LIMIT 5");

        $topKasir = DB::select("SELECT k.NamaKaryawan, COUNT(t.id) as total_trx, SUM(t.TotalHarga) as total_jual FROM transaksis t JOIN karyawans k ON t.karyawan_id = k.id GROUP BY t.karyawan_id, k.NamaKaryawan ORDER BY total_trx DESC LIMIT 5");

        $topProduk = DB::select("SELECT p.NamaProduk, SUM(d.jumlah) as total_terjual FROM detail_transaksis d JOIN produks p ON d.produk_id = p.id GROUP BY d.produk_id, p.NamaProduk ORDER BY total_terjual DESC LIMIT 5");

        return view('dashboard', compact(
            'totalModal',
            'totalKeuntungan',
            'produkPerKategori',
            'transaksiPerBulan',
            'statusPembayaran',
            'stokPerProduk',
            'topPelanggan',
            'topKasir',
            'topProduk'
        ));
    }
}
