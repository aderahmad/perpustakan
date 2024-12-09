<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;

class BerandaController extends Controller
{
    public function Beranda(){

        $dataPinjam = Pinjam::select('id', 'nama_buku', 'jumlah')->get();
        return view('peminjaman', compact('dataPinjam'));
    }
}
