<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Mahasiswa;
use App\petugas;
use App\buku;

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
        // $data=peminjaman::all();
        $data =  peminjaman::join('mahasiswa as a', 'peminjaman.id_mahasiswa', '=', 'a.id')
                ->join('petugas as b', 'peminjaman.id_petugas', '=', 'b.id')
                ->join('buku as c', 'peminjaman.id_buku', '=', 'c.id')
               ->get(['peminjaman.*', 'a.nama_mahasiswa as nama_peminjam', 'a.nim', 'b.nama_petugas', 'b.kode_petugas', 'c.judul_buku']);
        return view('admin.peminjaman.index', compact('data', 'pagename'));
    }

    public function create()
    {
        $pagename  = 'Tambahakan Data Peminjaman';
        $data_mahasiswa = Mahasiswa::all();
        $data_petugas = petugas::all();
        $data_buku = buku::all();
        return view('admin.peminjaman.create', compact('pagename', 'data_mahasiswa', 'data_petugas', 'data_buku'));
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
            'nomor_transaksi'=>'required|unique:peminjaman',
            'id_mahasiswa'=>'required',
            'id_petugas'=>'required',
            'id_buku'=>'required',
            'tanggal_transaksi'=>'required',
        ]);

        $data_peminjaman = new peminjaman([
            'nomor_transaksi'=>$request->get('nomor_transaksi'),
            'id_mahasiswa'=>$request->get('id_mahasiswa'),
            'id_petugas'=>$request->get('id_petugas'),
            'id_buku'=>$request->get('id_buku'),
            'tanggal_transaksi'=>$request->get('tanggal_transaksi'),
        ]);

        // print_r($data_peminjaman);
        // die;

        $data_peminjaman->save();
        return redirect('admin/peminjaman')->with('success', 'transaksi berhasil di simpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagename = 'Update Peminjaman';
        $data = peminjaman::find($id);
        $data_mahasiswa = Mahasiswa::all();
        $data_petugas = petugas::all();
        $data_buku = buku::all();
        return view('admin.peminjaman.edit', compact('data', 'pagename', 'data_mahasiswa', 'data_petugas', 'data_buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mahasiswa'=>'required',
            'id_petugas'=>'required',
            'id_buku'=>'required',
            'tanggal_transaksi'=>'required',
        ]);

        $tugas=peminjaman::find($id);

        $tugas->id_mahasiswa = $request->get('id_mahasiswa');
        $tugas->id_petugas = $request->get('id_petugas');
        $tugas->id_buku = $request->get('id_buku');

        $tugas->save();
        return redirect('admin/peminjaman')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = peminjaman::find($id);
        $tugas->delete();
        return redirect('admin/peminjaman')->with('success', 'tugas berhasil di hapus');
    }
}
