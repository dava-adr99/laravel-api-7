<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'jenis_kelamin',
        'alamat',
    ];

    protected $hidden = [];

}
