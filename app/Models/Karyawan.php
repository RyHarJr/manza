<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'NamaKaryawan',
        'Jabatan',
        'NoTlp',
        'TglMasuk',
    ];

    protected $casts = [
        'TglMasuk' => 'date',
    ];


    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'karyawan_id');
    }
}
