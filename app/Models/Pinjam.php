<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tabel = 'pinjam';
    public $timestamps = true;

    protected $fillabel = [
        'nama_buku',
        'jumlah'
    ];
}
