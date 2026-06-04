<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];



    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
