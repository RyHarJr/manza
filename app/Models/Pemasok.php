<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $fillable = [
        'NamaPemasok',
        'Alamat',
        'NoTlp',
        'KontakPerson',
    ];


    public function gudangs()
    {
        return $this->hasMany(Gudang::class, 'pemasok_id');
    }
}
