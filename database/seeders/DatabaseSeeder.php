<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pemasok;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\Gudang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Pemasok
        $pemasokData = [
            ['NamaPemasok' => 'PT Indofood CBP Sukses Makmur', 'Alamat' => 'Jl. Jend. Sudirman Kav 76-78, Jakarta', 'NoTlp' => '081112223301', 'KontakPerson' => 'Bapak Budi'],
            ['NamaPemasok' => 'PT Wings Surya', 'Alamat' => 'Jl. Kalisosok Kidul No.2, Surabaya', 'NoTlp' => '081112223302', 'KontakPerson' => 'Ibu Sita'],
            ['NamaPemasok' => 'PT Mayora Indah', 'Alamat' => 'Gedung Mayora, Jl. Tomang Raya, Jakarta', 'NoTlp' => '081112223303', 'KontakPerson' => 'Andi Sukamto'],
            ['NamaPemasok' => 'PT Unilever Indonesia', 'Alamat' => 'Grha Unilever, BSD City, Tangerang', 'NoTlp' => '081112223304', 'KontakPerson' => 'Lestari'],
            ['NamaPemasok' => 'PT Tirta Investama (Danone Aqua)', 'Alamat' => 'Cyber 2 Tower, Jl. HR Rasuna Said, Jakarta', 'NoTlp' => '081112223305', 'KontakPerson' => 'Hendra'],
            ['NamaPemasok' => 'PT GarudaFood Putra Putri Jaya', 'Alamat' => 'Wisma GarudaFood, Bintaro, Tangerang', 'NoTlp' => '081112223306', 'KontakPerson' => 'Doni Saputra'],
            ['NamaPemasok' => 'PT Siantar Top Tbk', 'Alamat' => 'Jl. Tambak Sawah No.21, Sidoarjo', 'NoTlp' => '081112223307', 'KontakPerson' => 'Rina Kusumawati'],
            ['NamaPemasok' => 'PT Ultrajaya Milk Industry', 'Alamat' => 'Jl. Raya Cimareme No. 131, Bandung', 'NoTlp' => '081112223308', 'KontakPerson' => 'Toni Setiawan'],
            ['NamaPemasok' => 'PT Nestle Indonesia', 'Alamat' => 'Perkantoran Hijau Arkadia, Jakarta', 'NoTlp' => '081112223309', 'KontakPerson' => 'Yusuf Wibowo'],
            ['NamaPemasok' => 'PT Santos Jaya Abadi (Kapal Api)', 'Alamat' => 'Jl. Raya Gilang No.159, Sidoarjo', 'NoTlp' => '081112223310', 'KontakPerson' => 'Maria Kristina'],
        ];
        foreach ($pemasokData as $data) Pemasok::create($data);

        // 2. Karyawan
        $karyawanData = [
            ['NamaKaryawan' => 'Ahmad Syauqi', 'Jabatan' => 'Kasir', 'NoTlp' => '085712345601', 'TglMasuk' => '2023-01-10'],
            ['NamaKaryawan' => 'Siti Nurhaliza', 'Jabatan' => 'Admin', 'NoTlp' => '085712345602', 'TglMasuk' => '2023-02-15'],
            ['NamaKaryawan' => 'Budi Santoso', 'Jabatan' => 'Gudang', 'NoTlp' => '085712345603', 'TglMasuk' => '2023-03-20'],
            ['NamaKaryawan' => 'Dewi Lestari', 'Jabatan' => 'Kasir', 'NoTlp' => '085712345604', 'TglMasuk' => '2023-04-05'],
            ['NamaKaryawan' => 'Rahmat Hidayat', 'Jabatan' => 'Gudang', 'NoTlp' => '085712345605', 'TglMasuk' => '2023-05-12'],
            ['NamaKaryawan' => 'Nisa Sabyan', 'Jabatan' => 'Kasir', 'NoTlp' => '085712345606', 'TglMasuk' => '2023-06-18'],
            ['NamaKaryawan' => 'Bambang Pamungkas', 'Jabatan' => 'Admin', 'NoTlp' => '085712345607', 'TglMasuk' => '2023-07-22'],
            ['NamaKaryawan' => 'Rina Nose', 'Jabatan' => 'Kasir', 'NoTlp' => '085712345608', 'TglMasuk' => '2023-08-30'],
            ['NamaKaryawan' => 'Andi Firmansyah', 'Jabatan' => 'Gudang', 'NoTlp' => '085712345609', 'TglMasuk' => '2023-09-14'],
            ['NamaKaryawan' => 'Maya Septha', 'Jabatan' => 'Kasir', 'NoTlp' => '085712345610', 'TglMasuk' => '2023-10-01'],
        ];
        foreach ($karyawanData as $data) Karyawan::create($data);

        // 3. Pelanggan
        $pelangganData = [
            ['NamaPelanggan' => 'Toko Kelontong Berkah (Bpk. RT)', 'Alamat' => 'Jl. Merdeka Blok A No 12', 'NoTlp' => '081298765401', 'TglDaftar' => '2024-01-05'],
            ['NamaPelanggan' => 'Ibu PKK Yanti', 'Alamat' => 'Pesona Alam Blok B No 3', 'NoTlp' => '081298765402', 'TglDaftar' => '2024-02-14'],
            ['NamaPelanggan' => 'Warkop Mas Doni', 'Alamat' => 'Perempatan Depan Pasar Induk', 'NoTlp' => '081298765403', 'TglDaftar' => '2024-03-21'],
            ['NamaPelanggan' => 'Warteg Bahari', 'Alamat' => 'Jl. Raya Utama No 55', 'NoTlp' => '081298765404', 'TglDaftar' => '2024-04-10'],
            ['NamaPelanggan' => 'Bapak Supri', 'Alamat' => 'Gang Melati Ujung', 'NoTlp' => '081298765405', 'TglDaftar' => '2024-05-18'],
            ['NamaPelanggan' => 'Kantin SD Negeri 01', 'Alamat' => 'Komplek Sekolah SD N 01', 'NoTlp' => '081298765406', 'TglDaftar' => '2024-06-25'],
            ['NamaPelanggan' => 'Mbak Fitri (Salon)', 'Alamat' => 'Ruko Indah Blok C No 8', 'NoTlp' => '081298765407', 'TglDaftar' => '2024-07-07'],
            ['NamaPelanggan' => 'Kedai Kopi Pak Eko', 'Alamat' => 'Jl. Stasiun Baru', 'NoTlp' => '081298765408', 'TglDaftar' => '2024-08-15'],
            ['NamaPelanggan' => 'Ibu Hajjah Neneng', 'Alamat' => 'Komplek Belakang Masjid Besar', 'NoTlp' => '081298765409', 'TglDaftar' => '2024-09-09'],
            ['NamaPelanggan' => 'Kost Mahasiswa Ridwan', 'Alamat' => 'Jalan Kampus Lama', 'NoTlp' => '081298765410', 'TglDaftar' => '2024-10-30'],
        ];
        foreach ($pelangganData as $data) Pelanggan::create($data);

        // 4. Produk
        $produkData = [
            ['KategoriProduk' => 'Makanan', 'NamaProduk' => 'Indomie Goreng Spesial', 'Deskripsi' => 'Mie instan goreng favorit nusantara', 'Harga' => 3500, 'Satuan' => 'Pcs'],
            ['KategoriProduk' => 'Minuman', 'NamaProduk' => 'Aqua Air Mineral 600ml', 'Deskripsi' => 'Air mineral botol sedang asli pegunungan', 'Harga' => 3500, 'Satuan' => 'Btl'],
            ['KategoriProduk' => 'Makanan', 'NamaProduk' => 'Biskuit Roma Kelapa', 'Deskripsi' => 'Biskuit kelapa renyah keluarga', 'Harga' => 12500, 'Satuan' => 'Bks'],
            ['KategoriProduk' => 'Kebersihan', 'NamaProduk' => 'Deterjen Rinso Anti Noda 700g', 'Deskripsi' => 'Deterjen bubuk pembersih noda membandel', 'Harga' => 21000, 'Satuan' => 'Pcs'],
            ['KategoriProduk' => 'Minuman', 'NamaProduk' => 'Teh Pucuk Harum 350ml', 'Deskripsi' => 'Minuman olahan ekstrak daun teh alami', 'Harga' => 4500, 'Satuan' => 'Btl'],
            ['KategoriProduk' => 'Dapur', 'NamaProduk' => 'Minyak Goreng Bimoli 2L', 'Deskripsi' => 'Minyak goreng kelapa sawit pouch', 'Harga' => 39500, 'Satuan' => 'Pouch'],
            ['KategoriProduk' => 'Dapur', 'NamaProduk' => 'Gula Pasir Kristal Putih Gulaku 1Kg', 'Deskripsi' => 'Gula pasir tebu asli kemasan premium', 'Harga' => 17500, 'Satuan' => 'Kg'],
            ['KategoriProduk' => 'Minuman', 'NamaProduk' => 'Kopi Kapal Api Mix Renteng', 'Deskripsi' => 'Kopi bubuk instan gula murni per renteng (10 pcs)', 'Harga' => 15000, 'Satuan' => 'Renteng'],
            ['KategoriProduk' => 'Perawatan', 'NamaProduk' => 'Sabun Mandi Cair Lifebuoy Refill 450ml', 'Deskripsi' => 'Sabun cair pelindung kuman kemasan isi ulang', 'Harga' => 24000, 'Satuan' => 'Pouch'],
            ['KategoriProduk' => 'Minuman', 'NamaProduk' => 'Susu Bear Brand Steril 189ml', 'Deskripsi' => 'Susu sapi murni steril cap beruang', 'Harga' => 11000, 'Satuan' => 'Kaleng'],
        ];
        // Harga Beli Gudang yang logis (Margin laba 10-25%)
        $hargaBeliData = [
            3000,   // Indomie (Jual 3500)
            2800,   // Aqua (Jual 3500)
            10500,  // Roma (Jual 12500)
            18500,  // Rinso (Jual 21000)
            3500,   // Teh Pucuk (Jual 4500)
            36500,  // Bimoli 2L (Jual 39500)
            15500,  // Gulaku 1Kg (Jual 17500)
            13000,  // Kapal Api (Jual 15000)
            20500,  // Lifebuoy (Jual 24000)
            9800,   // Bear Brand (Jual 11000)
        ];

        foreach ($produkData as $data) Produk::create($data);

        // 5. Gudang (Stok)
        // Kita hubungkan Produk dengan supplier yang paling masuk akal!
        $supplierMatching = [
            1 => 1, // Indomie -> Indofood
            2 => 5, // Aqua -> Danone
            3 => 3, // Roma -> Mayora
            4 => 4, // Rinso -> Unilever
            5 => 3, // Teh Pucuk -> Mayora
            6 => 1, // Bimoli -> Indofood (Salim Group)
            7 => 1, // Gulaku
            8 => 10, // Kapal Api -> Santos Jaya
            9 => 4, // Lifebuoy -> Unilever
            10 => 9, // Bear Brand -> Nestle
        ];

        for ($i = 0; $i < 10; $i++) {
            $pId = $i + 1; // ID Produk 1 s.d 10
            Gudang::create([
                'pemasok_id' => $supplierMatching[$pId],
                'produk_id' => $pId,
                'Jumlah' => rand(20, 150),
                'Harga' => $hargaBeliData[$i], // Harga beli realistik
            ]);
        }

        // 6. Transaksi & 7. Detail Transaksi
        $karyawanIds = Karyawan::pluck('id')->toArray();
        $pelangganIds = Pelanggan::pluck('id')->toArray();
        
        for ($i = 0; $i < 10; $i++) {
            // Waktu transaksi random 1 bulan terakhir
            $trxWaktu = \Carbon\Carbon::now()->subDays(rand(1, 30))->addHours(rand(8, 20));

            $transaksi = Transaksi::create([
                'karyawan_id' => $karyawanIds[array_rand($karyawanIds)],
                'pelanggan_id' => $pelangganIds[array_rand($pelangganIds)],
                'TglTransaksi' => $trxWaktu,
                'TotalHarga' => 0,
                'MetodePembayaran' => ['Cash', 'Transfer', 'QRIS'][rand(0, 2)],
                'StatusPembayaran' => 'sukses',
                'created_at' => $trxWaktu,
                'updated_at' => $trxWaktu
            ]);

            $total = 0;
            // Tiap transaksi ada 2 sampai 4 item berbeda
            $numItems = rand(2, 4);
            $selectedProducts = (array) array_rand(range(1, 10), $numItems);
            
            foreach ($selectedProducts as $idx) {
                $produkId = $idx + 1;
                $produk = Produk::find($produkId);
                $qty = rand(1, 5); // Beli 1 s.d 5 Pcs
                $sub = $produk->Harga * $qty;
                
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produkId,
                    'jumlah' => $qty,
                    'harga_satuan' => $produk->Harga,
                    'subtotal' => $sub,
                    'created_at' => $trxWaktu,
                    'updated_at' => $trxWaktu
                ]);
                
                // Kurangi stok dari gudang (SIMULASI)
                $gudang = Gudang::where('produk_id', $produkId)->first();
                if($gudang) {
                    $gudang->Jumlah -= $qty;
                    $gudang->save();
                }

                $total += $sub;
            }
            $transaksi->update(['TotalHarga' => $total]);
        }
    }
}
