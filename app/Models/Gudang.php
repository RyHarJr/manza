<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $fillable = [
        'pemasok_id',
        'produk_id',
        'Jumlah',
        'Harga',
    ];


    public function Pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
