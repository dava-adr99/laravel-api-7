<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    //
    protected $table = 'petugas';
    protected $fillable = [
        'id_petugas',
        'nama_petugas',
        'kode_petugas',
        'jenis_kelamin',
        'address'
    ];

}
