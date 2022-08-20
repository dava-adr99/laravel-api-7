<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    //
    protected $table = 'pengembalian';
    protected $fillable = [
        'nomor_transaksi',
        'tanggal_pengembalian',
        'keterangan'
    ];

}
