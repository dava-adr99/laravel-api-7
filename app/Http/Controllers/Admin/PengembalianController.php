<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pengembalian;
use App\peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $pagename = 'Data Pengembalian';
        $data =  pengembalian::join('peminjaman', 'pengembalian.id_peminjaman', '=', 'peminjaman.id')
               ->get(['pengembalian.*', 'peminjaman.nomor_transaksi']);
        return view('admin.pengembalian.index', compact('data', 'pagename'));
    }

    public function create()
    {
        $pagename  = 'Tambahkan Data Pengembalian';
        //menampung semua data di dalam tabel peminjaman 
        $data_peminjaman = peminjaman::all();
        return view('admin.pengembalian.create', compact('pagename', 'data_peminjaman'));
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
            'id_peminjaman'=>'required',
            'tanggal_pengembalian'=>'required',
            'keterangan'=>'required',
        ]);

        $data_pengembalian = new pengembalian([
            'id_peminjaman'=>$request->get('id_peminjaman'),
            'tanggal_pengembalian'=>$request->get('tanggal_pengembalian'),
            'keterangan'=>$request->get('keterangan'),
        ]);

        $data_pengembalian->save();
        return redirect('admin/pengembalian')->with('success', 'data berhasil di simpan');
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

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagename = 'Update Pengembalian';
        $data = pengembalian::find($id);
        $data_peminjaman = peminjaman::all();
        return view('admin.pengembalian.edit', compact('data', 'pagename', 'data_peminjaman'));
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
            'id_peminjaman'=>'required',
            'tanggal_pengembalian'=>'required',
            'keterangan'=>'required',
        ]);

        $tugas=pengembalian::find($id);

        $tugas->id_peminjaman = $request->get('id_peminjaman');
        $tugas->tanggal_pengembalian = $request->get('tanggal_pengembalian');
        $tugas->keterangan = $request->get('keterangan');

        $tugas->save();
        return redirect('admin/pengembalian')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = pengembalian::find($id);
        $tugas->delete();
        return redirect('admin/pengembalian')->with('success', 'tugas berhasil di hapus');
    }
}
