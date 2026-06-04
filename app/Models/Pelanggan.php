<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'NamaPelanggan',
        'Alamat',
        'NoTlp',
        'TglDaftar',
    ];

    protected $casts = [
        'TglDaftar' => 'date',
    ];


    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'pelanggan_id');
    }
}
