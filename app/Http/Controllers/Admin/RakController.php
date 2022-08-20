<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rak;

class RakController extends Controller
{
    public function index()
    {
        $pagename = 'Data Rak';
        $data=Rak::all();
        return view('admin.rak.index', compact('data', 'pagename'));
    }

    public function create()
    {
        $pagename  = 'Tambahkan Data';
        return view('admin.rak.create', compact('pagename'));
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
            'judul_buku'=>'required',
            'stok'=>'required',
           
        ]);

        $data_rak = new Rak([
            'judul_buku'=>$request->get('judul_buku'),
            'stok'=>$request->get('stok'),
        ]);

        $data_rak->save();
        return redirect('admin/rak')->with('success', 'berhasil menambahkan rak');
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
        $pagename = 'Update Rak';
        $data = Rak::find($id);
        return view('admin.rak.edit', compact('data', 'pagename'));
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
            'judul_buku'=>'required',
            'stok'=>'required',
        ]);

        $tugas=Rak::find($id);

        $tugas->judul_buku = $request->get('judul_buku');
        $tugas->stok=$request->get('stok');

        $tugas->save();
        return redirect('admin/rak')->with('success', 'berhasil di update rak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Rak::find($id);
        $tugas->delete();
        return redirect('admin/rak')->with('success', 'berhasil di hapus rak');
    }

}
