<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pengembalian;
class PengembalianController extends Controller
{
    public function index()
    {
        $pagename = 'Data Pengembalian';
        $data=pengembalian::all();
        return view('admin.pengembalian.index', compact('data', 'pagename'));
    }

    public function create()
    {
        $pagename  = 'Tambahkan Data Pengembalian';
        return view('admin.pengembalian.create', compact('pagename'));
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
            'tanggal_pengembalian'=>'required',
            'keterangan'=>'required',
        ]);

        $data_pengembalian = new pengembalian([
            'nomor_transaksi'=>$request->get('nomor_transaksi'),
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
        return view('admin.pengembalian.edit', compact('data', 'pagename'));
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
            'nomor_transaksi'=>'required',
            'tanggal_pengembalian'=>'required',
            'keterangan'=>'required',
        ]);

        $tugas=pengembalian::find($id);

        $tugas->nomor_transaksi = $request->get('nomor_transaksi');
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
        return redirect('admin/mahasiswa')->with('success', 'tugas berhasil di hapus');
    }
}
