<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    //
    protected $table = 'buku';
    protected $fillable = [
        'judul_buku',
        'nama_pengarang',
        'tahun_terbit'
    ];

}


