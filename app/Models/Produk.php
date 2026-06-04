<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'KategoriProduk',
        'NamaProduk',
        'Deskripsi',
        'Harga',
        'Satuan',
        'Foto',
    ];


    protected $appends = ['total_stok'];

    public function gudangs()
    {
        return $this->hasMany(Gudang::class, 'produk_id');
    }

    public function getTotalStokAttribute()
    {
        return $this->gudangs()->sum('Jumlah');
    }
}
