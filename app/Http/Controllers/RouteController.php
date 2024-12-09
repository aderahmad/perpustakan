<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Throwable;


class RouteController extends BaseController
{
    public function pinjam(){

        $dataPinjam = Pinjam::select('id', 'nama_buku', 'jumlah')->get();
        return view('peminjaman', compact('dataPinjam'));
    }

    public function balik(){
        $dataPinjam = Pinjam::select('id', 'nama_buku', 'jumlah')->get();
        return view('pengembalian', compact('dataPinjam'));
    }

    public function simpanBuku (Request $request){
        try{
            $datas = $request->all();
            $teams = new Pinjam;
            $teams -> nama_buku = $datas['nama_buku'];
            $teams -> jumlah = $datas['jumlah'];
            $teams -> save();
            return redirect()->route('route.pinjam')->with('sukses', __('Berhasil membuat list team'));
        } catch (Throwable $th){
            return redirect()->route('route.home')->with('error', __($th -> getMessage()));
        }
    }

    public function deleteData($id)
    {
        try {
            $dataPinjam = Pinjam::where('id', $id)->delete();

            return redirect()->route('route.pinjam')->with('sukses', __('Berhasil Menghapus data'));
        } catch (Throwable $th) {
            return redirect()->route('route.pinjam')->with('error', __($th -> getMessage()));
        }
    }

    public function formEdit($id){
        $dataPinjam = Pinjam::select('id', 'nama_buku', 'jumlah')->where('id', $id)->first();
        return view('form-edit-data', compact('dataPinjam'));
    }

    public function editData(Request $request) {
        try {Pinjam::where('id', $request->id)->update([
            'nama_buku' => $request->nama_buku,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('route.pinjam');
    }
        catch (Throwable $th) {
            return redirect()->route('route.form-edit');
        }
    }

    public function deleteSoft($id){
        try {
            Pinjam::where('id', $id)->delete();

            return redirect()->route('route.balik')->with('sukses', __('Berhasil Memasukan Ke Dalam Draft'));
        } catch (Throwable $th) {
            return redirect()->route('route.balik')->with('error', __($th -> getMessage()));
        }
    }
}
