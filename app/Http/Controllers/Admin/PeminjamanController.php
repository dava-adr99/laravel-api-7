<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Data Peminjaman';
        $data=peminjaman::all();
        return view('admin.peminjaman.index', compact('data', 'pagename'));
    }

    public function create()
    {
        $pagename  = 'Tambahakan Data Peminjaman';
        return view('admin.peminjaman.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_transaksi'=>'required',
            'nama_peminjam'=>'required',
            'nim'=>'required',
            'nama_petugas'=>'required',
            'kode_petugas'=>'required',
            'judul_buku'=>'required',
            'tanggal_transaksi'=>'required',
        ]);

        $data_peminjaman = new peminjaman([
            'nomor_transaksi'=>$request->get('nomor_transaksi'),
            'nama_peminjam'=>$request->get('nama_peminjam'),
            'nim'=>$request->get('nim'),
            'nama_petugas'=>$request->get('nama_petugas'),
            'kode_petugas'=>$request->get('kode_petugas'),
            'judul_buku'=>$request->get('judul_buku'),
            'tanggal_transaksi'=>$request->get('tanggal_transaksi'),
        ]);

        $data_peminjaman->save();
        return redirect('admin/peminjaman')->with('success', 'tugas berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
