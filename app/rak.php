<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    //
    protected $table = 'rak';
    protected $fillable = [
        'id_buku',
        'stok'
    ];

}
