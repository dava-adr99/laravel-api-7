<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    //
    protected $table = 'rak';
    protected $fillable = [
        'judul_buku',
        'stok'
    ];

}
