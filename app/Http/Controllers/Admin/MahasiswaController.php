<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Tambahakan Data Mahasiswa';
        $data=Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename  = 'Data Mahasiswa';
        return view('admin.mahasiswa.create', compact('pagename'));
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
            'nama_mahasiswa'=>'required',
            'nim'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
        ]);

        $data_mahasiswa = new Mahasiswa([
            'nama_mahasiswa'=>$request->get('nama_mahasiswa'),
            'nim'=>$request->get('nim')->unique,
            'jenis_kelamin'=>$request->get('jenis_kelamin'),
            'alamat'=>$request->get('alamat'),
        ]);

        $data_mahasiswa->save();
        return redirect('admin/mahasiswa')->with('success', 'tugas berhasil di simpan');
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
        $pagename = 'Update Mahasiswa';
        $data = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', compact('data', 'pagename'));
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
            'nama_mahasiswa'=>'required',
            'nim'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
        ]);

        $tugas=Mahasiswa::find($id);

        $tugas->nama_mahasiswa = $request->get('nama_mahasiswa');
        $tugas->nim=$request->get('nim');
        $tugas->jenis_kelamin=$request->get('jenis_kelamin');
        $tugas->alamat=$request->get('alamat');


        $tugas->save();
        return redirect('admin/mahasiswa')->with('success', 'mahasiswa berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = mahasiswa::find($id);
        $tugas->delete();
        return redirect('admin/mahasiswa')->with('success', 'tugas berhasil di hapus');
    }
}