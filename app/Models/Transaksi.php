<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'karyawan_id',
        'pelanggan_id',
        'TglTransaksi',
        'TotalHarga',
        'MetodePembayaran',
        'StatusPembayaran',
    ];

    protected $casts = [
        'TglTransaksi' => 'date',
        'TotalHarga' => 'decimal:2',
    ];


    public function Karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }


    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
