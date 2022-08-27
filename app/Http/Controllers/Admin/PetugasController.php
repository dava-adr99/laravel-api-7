<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    //
    public function index()
    {
        $pagename = 'Data Petugas';
        $data=Petugas::all();
        return view('admin.petugas.index', compact('data', 'pagename'));
    }
    public function create()
    {
        $pagename  = 'Tambahkan Data Petugas';
        return view('admin.petugas.create', compact('pagename'));
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
            'nama_petugas'=>'required',
            'kode_petugas'=>'required|unique:petugas',
            'jenis_kelamin'=>'required',
            
        ]);

        $data_petugas = new Petugas([
            'nama_petugas'=>$request->get('nama_petugas'),
            'kode_petugas'=>$request->get('kode_petugas'),
            'jenis_kelamin'=>$request->get('jenis_kelamin'),
        ]);

        $data_petugas->save();
        return redirect('admin/petugas')->with('success', 'berhasil menambahkan petugas');
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
    public function edit($id)
    {
        $pagename = 'Update Petugas';
        $data = Petugas::find($id);
        return view('admin.petugas.edit', compact('data', 'pagename'));
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
            'nama_petugas'=>'required',
            'kode_petugas'=>'required',
            'jenis_kelamin'=>'required',
            
        ]);

        $tugas=Petugas::find($id);

        $tugas->nama_petugas = $request->get('nama_petugas');
        $tugas->kode_petugas=$request->get('kode_petugas');
        $tugas->jenis_kelamin=$request->get('jenis_kelamin');

        $tugas->save(); 
        return redirect('admin/petugas')->with('success', 'petugas berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Petugas::find($id);
        $tugas->delete();
        return redirect('admin/petugas')->with('success', 'petugas berhasil di hapus');
    }

} 
