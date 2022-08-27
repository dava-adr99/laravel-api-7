<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    //
    public function index()
    {
        $pagename = 'Data Buku';
        $data=Buku::all();
        return view('admin.buku.index', compact('data', 'pagename'));
    }
    public function create()
    {
        $pagename  = 'Tambahkan Data';
        return view('admin.buku.create', compact('pagename'));
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
            'judul_buku'=>'required|unique:buku|max:255',
            'nama_pengarang'=>'required',
            'tahun_terbit'=>'required',
            
        ]);

        $data_buku = new Buku([
            'judul_buku'=>$request->get('judul_buku'),
            'nama_pengarang'=>$request->get('nama_pengarang'),
            'tahun_terbit'=>$request->get('tahun_terbit'),
        ]);

        $data_buku->save();
        return redirect('admin/buku')->with('success', 'tugas berhasil di simpan');
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
        $pagename = 'Update Buku';
        $data = Buku::find($id);
        return view('admin.buku.edit', compact('data', 'pagename'));
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
            'nama_pengarang'=>'required',
            'tahun_terbit'=>'required',
        ]);

        $tugas=Buku::find($id);

        $tugas->judul_buku = $request->get('judul_buku');
        $tugas->nama_pengarang=$request->get('nama_pengarang');
        $tugas->tahun_terbit=$request->get('tahun_terbit');

        $tugas->save();
        return redirect('admin/buku')->with('success', 'buku berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Buku::find($id);
        $tugas->delete();
        return redirect('admin/buku')->with('success', 'buku berhasil di hapus');
    }
}

