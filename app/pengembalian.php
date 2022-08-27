<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    //
    protected $table = 'pengembalian';
    protected $fillable = [
        'id_peminjaman',
        'tanggal_pengembalian',
        'keterangan'
    ];

}
