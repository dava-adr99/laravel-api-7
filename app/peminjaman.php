<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $fillable = [
        'nomor_transaksi',
        'nama_peminjam',
        'nim',
        'nama_petugas',
        'kode_petugas',
        'judul_buku',
        'tanggal_transaksi'
    ];
}
