<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $fillable = [
        'nomor_transaksi',
        'id_mahasiswa',
        'id_petugas',
        'id_buku',
        'tanggal_transaksi'
    ];
}
